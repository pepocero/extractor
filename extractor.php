<?php
function extraer_torrents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com/');
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__.'/cookies.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__.'/cookies.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $html = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (!$html || $httpcode !== 200) {
        return ["error" => "No se pudo acceder a la página (HTTP $httpcode)"];
    }

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $links = $dom->getElementsByTagName('a');

    $resultados = [];
    foreach ($links as $a) {
        $href = $a->getAttribute('href');
        if (preg_match('/\.torrent$/i', $href)) {
            if (strpos($href, '//') === 0) {
                $href = 'https:' . $href;
            } elseif (strpos($href, 'http') !== 0) {
                $parsed = parse_url($url);
                $href = $parsed['scheme'] . '://' . $parsed['host'] . '/' . ltrim($href, '/');
            }
            $resultados[] = $href;
        }
    }

    return array_unique($resultados);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = trim($_POST['url'] ?? '');
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $error = "URL no válida.";
    } else {
        $resultado = extraer_torrents($url);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Extractor de Torrents Pro - DonTorrent</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .main-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      padding: 40px;
      max-width: 900px;
      width: 100%;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header {
      text-align: center;
      margin-bottom: 40px;
    }

    .logo {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .logo i {
      font-size: 2.5rem;
      color: white;
    }

    h1 {
      color: #2d3748;
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 10px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .subtitle {
      color: #718096;
      font-size: 1.1rem;
      font-weight: 400;
    }

    .form-container {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .input-group {
      position: relative;
      margin-bottom: 25px;
    }

    .input-group label {
      display: block;
      color: #4a5568;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }

    input[type="text"] {
      width: 100%;
      padding: 15px 20px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #f8fafc;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #667eea;
      background: white;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    button {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    button:active {
      transform: translateY(0);
    }

    button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    button:hover::before {
      left: 100%;
    }

    .btn-secondary {
      background: linear-gradient(135deg, #f093fb, #f5576c);
      box-shadow: 0 10px 25px rgba(245, 87, 108, 0.3);
      margin-top: 15px;
    }

    .btn-secondary:hover {
      box-shadow: 0 15px 35px rgba(245, 87, 108, 0.4);
    }

    .btn-back {
      position: fixed;
      top: 20px;
      left: 20px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      text-decoration: none;
      padding: 12px 20px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
      z-index: 1000;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-back:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 15px 35px rgba(102, 126, 234, 0.5);
      text-decoration: none;
      color: white;
    }

    .btn-back i {
      font-size: 0.9rem;
    }

    .results {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
      animation: slideUp 0.5s ease;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .results h3 {
      color: #2d3748;
      margin-bottom: 20px;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .results h3 i {
      color: #667eea;
    }

    textarea {
      width: 100%;
      padding: 20px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-family: 'Courier New', monospace;
      font-size: 0.9rem;
      resize: vertical;
      min-height: 200px;
      background: #f8fafc;
      transition: all 0.3s ease;
    }

    textarea:focus {
      outline: none;
      border-color: #667eea;
      background: white;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .error, .warning {
      background: #fed7d7;
      color: #c53030;
      padding: 15px 20px;
      border-radius: 12px;
      margin: 20px 0;
      border-left: 4px solid #f56565;
    }

    .warning {
      background: #fefcbf;
      color: #d69e2e;
      border-left-color: #f6e05e;
    }

    .success {
      background: #c6f6d5;
      color: #2f855a;
      padding: 15px 20px;
      border-radius: 12px;
      margin: 20px 0;
      border-left: 4px solid #68d391;
    }

    .stats {
      margin-bottom: 20px;
    }

    .container {
      max-width: 100%;
      margin: 0;
    }

    @media (max-width: 768px) {
      .main-container {
        padding: 20px;
        margin: 10px;
      }
      
      h1 {
        font-size: 2rem;
      }
      
      .form-container, .results {
        padding: 20px;
      }

      .btn-back {
        top: 15px;
        left: 15px;
        padding: 10px 16px;
        font-size: 0.85rem;
        gap: 6px;
      }

      .btn-back i {
        font-size: 0.8rem;
      }
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Botón flotante "Volver al Inicio" -->
  <a href="https://candeivid.com/utilidades.php" class="btn-back">
    <i class="fas fa-external-link-alt"></i> Volver al Inicio
  </a>

  <div class="main-container">
    <div class="header">
      <div class="logo">
        <i class="fas fa-download"></i>
      </div>
      <h1>Extractor de Torrents Pro</h1>
      <p class="subtitle">Extrae enlaces de descarga de forma rápida y segura</p>
    </div>

    <div class="form-container">
      <form method="post" id="formulario">
        <div class="input-group">
          <label for="urlInput">
            <i class="fas fa-link"></i> URL de DonTorrent
          </label>
          <input type="text" name="url" id="urlInput" placeholder="https://dontorrent.international/serie/..." required value="<?= htmlspecialchars($_POST['url'] ?? '') ?>">
        </div>
        <button type="submit">
          <i class="fas fa-search"></i> Extraer Enlaces
        </button>
      </form>
    </div>




    <?php if (!empty($error)): ?>
      <div class="error">
        <i class="fas fa-exclamation-triangle"></i> <?= $error ?>
      </div>
    <?php elseif (!empty($resultado)): ?>
      <?php if (isset($resultado['error'])): ?>
        <div class="error">
          <i class="fas fa-exclamation-triangle"></i> <?= $resultado['error'] ?>
        </div>
      <?php elseif (empty($resultado)): ?>
        <div class="warning">
          <i class="fas fa-search"></i> No se encontraron enlaces .torrent en esta página.
        </div>
      <?php else: ?>
        <div class="results" id="resultados">
          <h3>
            <i class="fas fa-check-circle"></i>
            Enlaces encontrados (<?= count($resultado) ?>)
          </h3>
          <div class="success">
            <i class="fas fa-info-circle"></i>
            Se encontraron <?= count($resultado) ?> enlaces de descarga. Puedes copiarlos todos a la vez.
          </div>
          <textarea id="resultado" placeholder="Los enlaces aparecerán aquí..."><?= implode("\n", $resultado) ?></textarea>
          <button onclick="copiar()">
            <i class="fas fa-copy"></i> Copiar al Portapapeles
          </button>
          <button onclick="nuevaBusqueda()" class="btn-secondary">
            <i class="fas fa-plus"></i> Nueva Búsqueda
          </button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <script>
    function copiar() {
      const t = document.getElementById('resultado');
      t.select();
      t.setSelectionRange(0, 99999); // Para dispositivos móviles
      
      try {
        document.execCommand('copy');
        showNotification('¡Enlaces copiados al portapapeles!', 'success');
      } catch (err) {
        // Fallback para navegadores modernos
        navigator.clipboard.writeText(t.value).then(function() {
          showNotification('¡Enlaces copiados al portapapeles!', 'success');
        }).catch(function() {
          showNotification('Error al copiar. Selecciona manualmente el texto.', 'error');
        });
      }
    }

    function nuevaBusqueda() {
      event.preventDefault();
      document.getElementById('urlInput').value = '';
      document.getElementById('urlInput').focus();
      
      // Ocultar resultados con animación
      const resultados = document.getElementById('resultados');
      if (resultados) {
        resultados.style.opacity = '0';
        setTimeout(() => {
          resultados.style.display = 'none';
        }, 300);
      }
    }

    function showNotification(message, type = 'info') {
      // Crear elemento de notificación
      const notification = document.createElement('div');
      notification.className = `notification ${type}`;
      notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
        ${message}
      `;
      
      // Estilos para la notificación
      notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#c6f6d5' : '#fed7d7'};
        color: ${type === 'success' ? '#2f855a' : '#c53030'};
        padding: 15px 20px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 1000;
        animation: slideInRight 0.3s ease;
        border-left: 4px solid ${type === 'success' ? '#68d391' : '#f56565'};
        max-width: 300px;
      `;
      
      document.body.appendChild(notification);
      
      // Remover después de 3 segundos
      setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => {
          document.body.removeChild(notification);
        }, 300);
      }, 3000);
    }

    // Añadir estilos de animación para notificaciones
    const style = document.createElement('style');
    style.textContent = `
      @keyframes slideInRight {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }
      
      @keyframes slideOutRight {
        from {
          transform: translateX(0);
          opacity: 1;
        }
        to {
          transform: translateX(100%);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);

    // Soporte para eventos táctiles en móviles
    document.addEventListener('touchstart', function() {}, {passive: true});
  </script>
</body>
</html>
