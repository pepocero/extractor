# 🚀 Extractor de Torrents - DonTorrent

<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</div>

<div align="center">
  <h3>🎯 La herramienta definitiva para extraer todos los enlaces de descarga de DonTorrent de una sola vez</h3>
</div>

---

## 📋 Tabla de Contenidos

- [🎯 ¿Qué es?](#-qué-es)
- [❌ El Problema](#-el-problema)
- [✅ Nuestra Solución](#-nuestra-solución)
- [🚀 Características](#-características)
- [⚙️ Instalación](#️-instalación)
- [📖 Uso](#-uso)
- [🔧 Requisitos Técnicos](#-requisitos-técnicos)
- [🏗️ Estructura del Proyecto](#️-estructura-del-proyecto)
- [🤝 Contribuciones](#-contribuciones)
- [📄 Licencia](#-licencia)

---

## 🎯 ¿Qué es?

**Extractor de Torrents** es una herramienta web profesional que automatiza la extracción de enlaces de descarga (.torrent) de páginas de series en DonTorrent. En lugar de hacer clic en cada episodio individualmente, esta aplicación extrae todos los enlaces de una vez y los presenta en un formato listo para copiar y pegar en tu gestor de torrents favorito.

### 🎬 Casos de Uso
- Descargar series completas de DonTorrent
- Extraer múltiples episodios de una temporada
- Obtener enlaces de películas y documentales
- Automatizar la descarga masiva de contenido

---

## ❌ El Problema

Cuando quieres descargar una serie completa de DonTorrent, te encuentras con estos problemas:

### 🔴 Proceso Tradicional
```
📥 Descargar Episodio 1    ← Clic
📥 Descargar Episodio 2    ← Clic  
📥 Descargar Episodio 3    ← Clic
📥 Descargar Episodio 4    ← Clic
📥 Descargar Episodio 5    ← Clic
... y así hasta el episodio 20
```

### 😤 Frustraciones
- ❌ **20 clics** para 20 episodios
- ❌ **Cada clic** abre una nueva ventana/pestaña
- ❌ **Proceso tedioso** y lento
- ❌ **Fácil perderse** o repetir episodios
- ❌ **Tiempo perdido** en clicks innecesarios

---

## ✅ Nuestra Solución

Con nuestro **Extractor de Torrents**, el proceso se vuelve súper simple:

### 🟢 Proceso Optimizado
1. **Pegas** la URL de la serie completa
2. **El sistema extrae** todos los enlaces automáticamente  
3. **Obtienes** una lista completa lista para copiar
4. **Pegas** todos los enlaces en tu gestor de torrents
5. **¡Descarga** toda la serie de una vez!

### 📋 Resultado
```
https://dontorrent.international/torrent/episodio1.torrent
https://dontorrent.international/torrent/episodio2.torrent
https://dontorrent.international/torrent/episodio3.torrent
https://dontorrent.international/torrent/episodio4.torrent
https://dontorrent.international/torrent/episodio5.torrent
...
https://dontorrent.international/torrent/episodio20.torrent
```

✅ **Todos los enlaces en un solo lugar**

---

## 🚀 Características

### ⚡ Rendimiento
- **Ultra rápido**: Extrae todos los enlaces en segundos
- **Eficiente**: Un solo clic para obtener múltiples enlaces
- **Optimizado**: Procesamiento inteligente de URLs

### 🎨 Interfaz
- **Diseño profesional** con gradientes modernos
- **Responsive**: Funciona perfectamente en móviles y tablets
- **Animaciones suaves** y efectos visuales elegantes
- **Notificaciones** informativas y elegantes

### 🔒 Seguridad
- **100% seguro**: No almacenamos datos personales
- **Sin registro**: No requiere crear cuentas
- **Privacidad garantizada**: Procesamiento local
- **Sin cookies**: No rastreamos tu actividad

### 🛠️ Funcionalidades
- **Validación automática** de URLs
- **Manejo inteligente** de errores
- **Copia al portapapeles** mejorada
- **Soporte táctil** para dispositivos móviles
- **Fallbacks** para diferentes navegadores

---


## ⚙️ Instalación

### 📋 Requisitos Previos
- **Servidor web** (Apache, Nginx, etc.)
- **PHP 7.4+** con extensiones:
  - `curl`
  - `libxml`
  - `dom`
- **Acceso a internet** para extraer enlaces

### 🚀 Instalación Rápida

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/extractor-torrents.git
   cd extractor-torrents
   ```

2. **Configura el servidor web**
   - Copia los archivos a tu directorio web
   - Asegúrate de que PHP esté habilitado

3. **Verifica permisos**
   ```bash
   chmod 755 extractor.php
   chmod 755 index.html
   ```

4. **¡Listo!** 
   - Abre `index.html` en tu navegador
   - O accede directamente a `extractor.php`

### 🐳 Instalación con Docker (Opcional)

```dockerfile
FROM php:8.1-apache
COPY . /var/www/html/
RUN docker-php-ext-install curl
EXPOSE 80
```

```bash
docker build -t extractor-torrents .
docker run -p 8080:80 extractor-torrents
```

---

## 📖 Uso

### 🎯 Uso Básico

1. **Accede** a la aplicación web
2. **Copia** la URL de la serie de DonTorrent
3. **Pega** la URL en el campo de entrada
4. **Haz clic** en "Extraer Enlaces"
5. **Copia** todos los enlaces del cuadro de texto
6. **Pega** en tu gestor de torrents favorito

### 🔗 Ejemplo de URL Válida
```
https://dontorrent.international/serie/nombre-de-la-serie/
```

### ⚠️ URLs No Válidas
```
❌ https://otro-sitio.com/serie/
❌ https://dontorrent.international/pelicula/
❌ https://ejemplo.com/
```

### 🎮 Gestores de Torrents Compatibles
- **qBittorrent**
- **Transmission**
- **Deluge**
- **Vuze**
- **uTorrent**
- **Cualquier gestor** que acepte URLs .torrent

---

## 🔧 Requisitos Técnicos

### 💻 Servidor
- **PHP**: 7.4 o superior
- **Memoria**: Mínimo 128MB RAM
- **Espacio**: 10MB de almacenamiento
- **Red**: Conexión a internet estable

### 🌐 Navegadores Soportados
- ✅ **Chrome** 80+
- ✅ **Firefox** 75+
- ✅ **Safari** 13+
- ✅ **Edge** 80+
- ✅ **Opera** 67+

### 📱 Dispositivos
- ✅ **Desktop** (Windows, macOS, Linux)
- ✅ **Tablet** (iPad, Android)
- ✅ **Móvil** (iOS, Android)

---

## 🏗️ Estructura del Proyecto

```
extractor-torrents/
├── 📄 index.html              # Página de presentación
├── 🔧 extractor.php          # Aplicación principal
├── 🍪 cookies.txt            # Archivo de cookies (auto-generado)
├── 📖 README.md              # Este archivo
└── 📁 assets/                # Recursos adicionales (opcional)
    ├── 🖼️ images/
    └── 🎨 css/
```

### 📋 Descripción de Archivos

| Archivo | Descripción |
|---------|-------------|
| `index.html` | Página de presentación con explicación del proyecto |
| `extractor.php` | Aplicación principal con lógica de extracción |
| `cookies.txt` | Archivo temporal para manejo de cookies (auto-generado) |
| `README.md` | Documentación completa del proyecto |

---

## 🛠️ Desarrollo

### 🔧 Configuración de Desarrollo

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/extractor-torrents.git
   ```

2. **Configura tu entorno local**
   ```bash
   # Con XAMPP/WAMP
   cp -r extractor-torrents/ C:/xampp/htdocs/
   
   # Con servidor PHP integrado
   php -S localhost:8000
   ```

3. **Abre en el navegador**
   ```
   http://localhost/extractor-torrents/
   ```

### 🧪 Testing

```bash
# Test básico de funcionalidad
curl -X POST http://localhost/extractor.php \
  -d "url=https://dontorrent.international/serie/ejemplo/"
```

### 📝 Logs y Debugging

Los errores se muestran directamente en la interfaz:
- **Errores de conexión**: HTTP status codes
- **URLs inválidas**: Validación de formato
- **Sin resultados**: Mensajes informativos

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! 🎉

### 🚀 Cómo Contribuir

1. **Fork** el proyecto
2. **Crea** una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. **Commit** tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. **Push** a la rama (`git push origin feature/AmazingFeature`)
5. **Abre** un Pull Request

### 🐛 Reportar Bugs

Si encuentras un bug, por favor:

1. **Verifica** que no esté ya reportado
2. **Crea** un nuevo issue con:
   - Descripción detallada del problema
   - Pasos para reproducir
   - Captura de pantalla (si aplica)
   - Información del navegador/sistema

### 💡 Sugerencias

¿Tienes una idea para mejorar el proyecto?

1. **Abre** un issue con la etiqueta `enhancement`
2. **Describe** tu idea detalladamente
3. **Explica** cómo beneficiaría a los usuarios

---

## 📊 Estadísticas del Proyecto

<div align="center">
  <img src="https://img.shields.io/github/stars/tu-usuario/extractor-torrents?style=social" alt="Stars">
  <img src="https://img.shields.io/github/forks/tu-usuario/extractor-torrents?style=social" alt="Forks">
  <img src="https://img.shields.io/github/watchers/tu-usuario/extractor-torrents?style=social" alt="Watchers">
</div>

### 📈 Métricas
- **⭐ Stars**: [![GitHub stars](https://img.shields.io/github/stars/tu-usuario/extractor-torrents)](https://github.com/tu-usuario/extractor-torrents/stargazers)
- **🍴 Forks**: [![GitHub forks](https://img.shields.io/github/forks/tu-usuario/extractor-torrents)](https://github.com/tu-usuario/extractor-torrents/network)
- **🐛 Issues**: [![GitHub issues](https://img.shields.io/github/issues/tu-usuario/extractor-torrents)](https://github.com/tu-usuario/extractor-torrents/issues)
- **📝 License**: [![GitHub license](https://img.shields.io/github/license/tu-usuario/extractor-torrents)](https://github.com/tu-usuario/extractor-torrents/blob/main/LICENSE)

---

## 🆘 Soporte

### 📞 Contacto
- **GitHub Issues**: [Reportar problemas](https://github.com/tu-usuario/extractor-torrents/issues)
- **Email**: tu-email@ejemplo.com
- **Discord**: [Servidor de la comunidad](https://discord.gg/tu-servidor)

### ❓ Preguntas Frecuentes

**Q: ¿Es seguro usar esta herramienta?**
A: Sí, es completamente seguro. No almacenamos datos personales ni requerimos registro.

**Q: ¿Funciona con otros sitios además de DonTorrent?**
A: Actualmente está optimizado para DonTorrent, pero puede funcionar con sitios similares.

**Q: ¿Puedo usar esto comercialmente?**
A: Consulta la licencia del proyecto para detalles específicos.

**Q: ¿Qué pasa si no encuentra enlaces?**
A: La aplicación mostrará un mensaje informativo y sugerencias para solucionarlo.

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

```
MIT License

Copyright (c) 2024 Extractor de Torrents

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 🙏 Agradecimientos

- **DonTorrent** por proporcionar el contenido
- **Comunidad PHP** por las librerías utilizadas
- **Contribuidores** que han mejorado el proyecto
- **Usuarios** que han reportado bugs y sugerido mejoras

---

<div align="center">
  <h3>⭐ Si te gusta este proyecto, ¡dale una estrella!</h3>
  <p>Hecho con ❤️ para la comunidad</p>
</div>

---

<div align="center">
  <img src="https://img.shields.io/badge/Made%20with-PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="Made with PHP">
  <img src="https://img.shields.io/badge/Made%20with-Love-red?style=for-the-badge&logo=heart&logoColor=white" alt="Made with Love">
</div>
