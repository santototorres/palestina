# Palestina SI - Sistema de Gestión e Iniciativa

Sistema completo basado en **Laravel 11** para reemplazar el antiguo WordPress de *palestinasi.ch*. Este sistema gestiona firmas, envíos de correo, peticiones de voluntarios, mensajería y flujo de shop (WhatsApp).

## Requisitos
- PHP 8.3 (Configurado en el servidor)
- MariaDB 10.6+
- Composer

## Instalación Local

1. Clona el repositorio.
2. Instala dependencias:
   ```bash
   composer install
   npm install
   npm run build
   ```
3. Configura el `.env` (usa `.env.example` como base).
4. Configura la base de datos MySQL (por defecto es SQLite en local para desarrollo rápido, pero el servidor usará MySQL).
5. Corre las migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## Configuración SMTP (Plantilla)

Debes actualizar el archivo `.env` en producción con las credenciales SMTP reales para que el envío de correos funcione:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.tudominio.com
MAIL_PORT=465 # o 587
MAIL_USERNAME=info@palestinasi.ch
MAIL_PASSWORD=tu_contraseña_segura
MAIL_ENCRYPTION=tls # o ssl
MAIL_FROM_ADDRESS="info@palestinasi.ch"
MAIL_FROM_NAME="Palestina SI"
```

## Arquitectura

- **Frontend Público:** Plantillas Blade (`resources/views/public/*`) impulsadas por TailwindCSS v4 y Alpine.js (`resources/js/wizard.js`) para manejar flujos guiados en vez de formularios largos. Todo está contenido en la app monolítica, lo que asegura que carga rápido y no requiere frameworks pesados de JS.
- **Backend Administrativo:** Plantillas Blade (`resources/views/admin/*`) que operan como un dashboard para gestionar datos operativos (sin CMS para contenido).
- **Base de datos:** Modelos bajo `app/Models` fuertemente acoplados con `Enums` (`app/Enums/*`) para integridad de datos (Status de formularios, Roles, Tipos de Documentos).
- **Seguridad en Subidas:** Todos los archivos van al disco `local` (privado, no accesible públicamente por URL). El servicio `FileUploadService` valida MIME, extensión y almacena el hash SHA-256 (OWASP compliant).
- **Multilingüismo:** Middleware `SetLocale.php` intercepta la ruta `/{locale}/` y establece la configuración regional en la app, Carbon y rutas.

## Preparación para Integración AI Futura

La plataforma se ha diseñado con la integración de agentes de AI en mente:
1. **Separación Estricta Datos vs Vista:** Todas las peticiones operativas generan un registro estricto en la BD con metadatos JSON e historiales de estado.
2. **Endpoints API Claros:** Los controladores están diseñados para recibir y responder JSON en los envíos de formulario. 
3. **Roles Modulares:** Se pueden otorgar tokens limitados de un rol (ej. `Reviewer`) a un sistema de AI para que procese colas de trabajo a través del `ProcessIncomingSubmissionJob`.
4. **Almacenamiento Desacoplado:** Al guardar un SHA-256 y metadatos estrictos de archivos, un proceso OCR / AI asíncrono puede analizar de forma segura el directorio `storage/app/submissions` sin riesgo.

## Despliegue en cPanel (Git Version Control)

1. En cPanel, dirígete a **Git Version Control**.
2. Vincula este repositorio.
3. El archivo `.cpanel.yml` ejecutará los pasos de despliegue al directorio `/public_html/new`.
4. **IMPORTANTE:** Edita `.cpanel.yml` para asegurar que el `DEPLOYPATH` coincide con el *username* de tu cPanel: `export DEPLOYPATH=/home/TU_USUARIO_CPANEL/public_html/new`.
5. Desde la interfaz de cPanel podrás hacer un *Pull Deployment*.
