# Proyecto N.I.C.O.L.E Versión Web

Este proyecto es una plataforma web de mensajería con inteligencia artificial (IA) diseñada para ayudar a los usuarios a generar recetas ágiles, prácticas y balanceadas.

La aplicación utiliza información nutricional basada en lineamientos del ICBF (Instituto Colombiano de Bienestar Familiar), promoviendo hábitos de alimentación saludables y accesibles.  
El sistema combina la asistencia de IA con herramientas de interacción simples, apoyando el bienestar y la salud de las personas mediante recomendaciones personalizadas.

---

## 🎯 Objetivo del Proyecto

El objetivo principal de **N.I.C.O.L.E** es ofrecer una experiencia digital que ayude a los usuarios a planificar su alimentación de forma práctica y consciente.  
Mediante el uso de inteligencia artificial, el sistema analiza preferencias y necesidades del usuario, generando recetas y menús equilibrados que fomentan una mejor calidad de vida.

---

## ⚙️ Tecnologías Utilizadas

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap  
- **Backend:** PHP 8+  
- **Base de Datos:** MySQL  
- **Integraciones:**  
  - Mercado Pago (pasarela de pagos)  
  - PHPMailer (envío de correos de verificación)  
- **IA y Procesamiento:** LM Studio (modelo local de lenguaje para chat inteligente)  
- **Control de dependencias:** Composer  
- **Documentación:** Doxygen  
- **Servidor local:** XAMPP / Apache  

---

## 📁 Estructura del Proyecto

📂 **htdocs/** → Carpeta raíz de la aplicación.  

### Archivos de negocio y lógica principal  
Contienen la autenticación, control de usuarios, integración con Mercado Pago, manejo de sesiones y el módulo de mensajería con IA.

### Páginas informativas

- **contactanos.php** → Página de contacto.  
- **quienes-somos.php** → Información de la organización/proyecto.  
- **terminos.php** → Términos y condiciones.  
- **privacidad.php** → Políticas de privacidad.  
- **beneficios_premium.php** → Ventajas de cuentas premium.  

### Módulo de mensajería con IA  
- **Nicole.php** y **chat.php** → Páginas dedicadas al chat inteligente.  

### Documentación y utilidades

📂 **doxygen_doc/** → Documentación generada automáticamente.  
📂 **session/** → Manejo de sesiones de usuario.  
📂 **utils/** → Funciones auxiliares.  
📂 **varset/** → Variables y configuraciones globales.  
📂 **vendor/** → Dependencias externas instaladas con Composer.  

### Archivos principales

- **index.php** → Página principal.  
- **pago.php** → Inicio del flujo de pago.  
- **composer.json / composer.lock** → Gestión de dependencias.  
- **doxygen_config.txt** → Configuración de documentación.  

---

## 🚀 Funcionalidades Principales

### Autenticación de Usuarios  
Registro, login, logout y recuperación de contraseñas.  

### Pagos con Mercado Pago  
Integración con pasarela de pagos.  
Incluye estados diferenciados: exitoso, fallido, pendiente.  
Recepción de notificaciones mediante webhook.

### Gestión de Sesiones y Roles  
Control de sesiones activas y privilegios.  

### Mensajería con IA  
Chat interactivo que genera recetas y recomendaciones personalizadas.

### Contenido informativo  
Secciones de contacto, misión, términos y políticas.

---
🚀 Cómo ejecutar el proyecto en un servidor local

Clona o descarga el repositorio en tu equipo:

git clone https://github.com/usuario/ejemplo-nicole-web.git


Ubica el proyecto dentro del directorio raíz de tu servidor local XAMPP:

C:\xampp\htdocs\


Inicia los servicios necesarios desde el panel de control de XAMPP:

✅ Apache

✅ MySQL

Configura la base de datos:

La base de datos principal se aloja en TiDB Cloud.

Verifica que las variables de conexión (host, usuario, contraseña y nombre de la base de datos) estén correctamente definidas en el archivo conexion.php.

Accede al proyecto desde tu navegador:

http://nicole.stytes.net/

💡 Nota: Actualmente el proyecto se encuentra alojado en un entorno local operado por un miembro del equipo ALPHA 22, por lo que las integraciones externas están activas únicamente en ese entorno de desarrollo.

---
## 👥 Equipo Desarrollador

**Equipo:** ALPHA 22  

