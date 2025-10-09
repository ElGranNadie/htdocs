<?php 
/**
 * @file registro.php
 * @brief Vista del formulario de registro inicial del sistema N.I.C.O.L.E.
 *
 * Este archivo presenta la primera etapa del registro de usuario, donde se recopilan
 * los datos básicos como nombre, correo, usuario, edad y contraseña. 
 * Envía la información mediante POST hacia @ref procesar_registro.php para su validación
 * y posterior creación del registro temporal en la base de datos.
 *
 * --------------------------------------------------------------
 * @section dependencias Dependencias
 * --------------------------------------------------------------
 * 
 * @code
 * session_start();
 * require '../varset/varset.php';
 * require 'other.php';
 * require 'stylesheet.php';
 * require '../dashboard/header.php';
 * require 'footer.php';
 * require 'scripts.php';
 * @endcode
 *
 * - `session_start()` → permite el uso de variables de sesión, como los errores y datos antiguos.
 * - `../varset/varset.php` → define variables globales compartidas (por ejemplo, el logo institucional `$logo`).
 * - `other.php` → agrega metadatos y configuraciones comunes (charset, viewport, etc.).
 * - `stylesheet.php` → incluye las hojas de estilo base del sistema (colores, tipografías, temas oscuros, etc.).
 * - `../dashboard/header.php` → muestra el encabezado o barra superior común a todo el sistema.
 * - `footer.php` → pie de página con créditos o enlaces institucionales.
 * - `scripts.php` → carga dependencias JavaScript (Bootstrap, funciones auxiliares, etc.).
 *
 * --------------------------------------------------------------
 * @section flujo Flujo general
 * --------------------------------------------------------------
 * 
 * 1. El usuario accede a la vista de registro inicial.
 * 2. Se cargan posibles errores o valores antiguos almacenados en sesión.
 * 3. Se renderiza el formulario con los campos requeridos:
 *    - Nombre  
 *    - Correo  
 *    - Usuario (apodo elegido por el usuario)  
 *    - Edad  
 *    - Contraseña y confirmación  
 *    - Aceptación de términos y condiciones
 * 4. El usuario completa la información y presiona **“siguiente”**.
 * 5. Los datos se envían mediante POST a `procesar_registro.php` (Paso 1 del flujo de registro).
 *
 * --------------------------------------------------------------
 * @section manejo_errores Manejo de errores
 * --------------------------------------------------------------
 * 
 * - Si existen errores en `$_SESSION['error']`, se muestran como una lista visible en color rojo.
 * - Los valores previos del formulario se almacenan en `$_SESSION['old']` para que no se pierdan al recargar.
 * - Después de mostrarse en pantalla, las variables se eliminan:
 * @code
 * unset($_SESSION['error'], $_SESSION['old']);
 * @endcode
 *
 * --------------------------------------------------------------
 * @section campos Campos del formulario
 * --------------------------------------------------------------
 *
 * | Campo | Tipo | Requerido | Descripción |
 * |--------|------|------------|--------------|
 * | **nombre** | texto | ✔ | Nombre real del usuario. |
 * | **correo** | email | ✔ | Correo principal (usado para verificación por código). |
 * | **usuario** | texto | ✔ | Apodo único que el usuario elige dentro del sistema. |
 * | **edad** | número | ✔ | Edad del usuario (rango permitido: 1–120). |
 * | **pass** | contraseña | ✔ | Contraseña del usuario. |
 * | **confirmar_pass** | contraseña | ✔ | Validación de coincidencia con la anterior. |
 * | **privacidad** | checkbox | ✔ | Aceptación de términos y condiciones. |
 *
 * --------------------------------------------------------------
 * @section interfaz Dinámica de la interfaz
 * --------------------------------------------------------------
 *
 * - Las contraseñas pueden alternar visibilidad con el botón 👁️ mediante `togglePasswordAll()`.
 * - El campo de confirmación muestra alertas si las contraseñas no coinciden (`validarContraseñas()`).
 * - El enlace a los términos abre una nueva pestaña (`target="_blank"`).
 * - Los errores se muestran centrados y en rojo, con iconos ⚠️ para resaltar.
 *
 * --------------------------------------------------------------
 * @section variables Variables principales
 * --------------------------------------------------------------
 * 
 * @var array $errores  
 * Lista de mensajes de error cargados desde `$_SESSION['error']`.  
 * Cada elemento representa un mensaje de validación mostrado al usuario.
 *
 * @var array $old  
 * Contiene los valores ingresados por el usuario (`$_SESSION['old']`)  
 * que se vuelven a mostrar en caso de error en el registro.
 *
 * @var string $logo  
 * Variable definida en `../varset/varset.php` que contiene la ruta al logotipo institucional del sistema.
 *
 * --------------------------------------------------------------
 * @note
 * Este formulario utiliza estilos y contenedores flexibles propios del sistema N.I.C.O.L.E.
 * No debe incluir salida HTML antes de `session_start()` para evitar errores de cabecera.
 */
session_start(); 
require '../varset/varset.php';

// Cargamos errores y datos viejos si existen
$errores = $_SESSION['error'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['error'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro en N.I.C.O.L.E</title>
    <?php require 'other.php'; ?>
    <?php require 'stylesheet.php'; ?>
</head>
<body>
    <?php require '../dashboard/header.php'; ?>
    <div class="app-container" style="align-items:normal;">
        <div class="login-container" style="max-width: 100%;">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <img src='<?php echo $logo ?>64.png' alt="Icono" style="width: 64px;">
                    </div>
                    <div class="col-12 col-lg-6">
                        <h3 style="color: var(--bs-body-color);">regístrate ya!!!</h3>
                    </div>
                </div>

                <!-- Mostrar errores -->
                <?php if (!empty($errores)): ?>
                    <div class="error-message" style="color: red; margin-bottom: 1rem; text-align:center; font-weight:bold;">
                        <ul style="list-style: none; padding:0;">
                            <?php if (is_string($errores)) $errores = [$errores]; // Asegurarse de que $errores es un array ?>
                            <?php foreach ($errores as $err): ?>
                                <li>⚠️ <?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <form action="procesar_registro.php" method="POST" style="text-align: left;">
                        <div class="col-12" style="color: var(--bs-body-color);">
                            <input type="hidden" name="paso" value="1">
                            <div class="row">
                                <!-- Campo: Nombre -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="nombre">nombre:</label>
                                    <input type="text" id="nombre" name="nombre" 
                                        value="<?= htmlspecialchars($old['nombre'] ?? '') ?>" 
                                        required placeholder="ingrese su nombre">
                                </div>
                                <!-- Campo: Correo -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="correo">correo asociado (se requiere para la verificacion de contraseña y usuario):</label>
                                    <input type="email" id="correo" name="correo" 
                                        value="<?= htmlspecialchars($old['correo'] ?? '') ?>" 
                                        required placeholder="ingrese un correo electrónico">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo: Usuario -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="usuario">usuario:</label>
                                    <input type="text" id="usuario" name="usuario" 
                                        value="<?= htmlspecialchars($old['usuario'] ?? '') ?>" 
                                        required placeholder="elige un nombre de usuario">
                                </div>
                                <!-- Campo: Edad -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="edad">edad:</label>
                                    <input type="number" id="edad" name="edad" 
                                        value="<?= htmlspecialchars($old['edad'] ?? '') ?>" 
                                        required min="1" max="120" placeholder="ingresa tu edad">
                                </div>
                            </div>

                            <div class="row">    
                                <!-- Campo: Contraseña -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="pass">contraseña:</label>
                                    <div class="password-container">
                                        <input type="password" id="pass" name="pass" placeholder="contraseña" required>
                                        <button type="button" class="toggle-password" onclick="togglePasswordAll()">
                                            <i class="eye-icon">👁️</i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Campo: Confirmar contraseña -->
                                <div class="form-group col-12 col-lg-6">
                                    <label class="col-12 col-lg-6" for="confirmar_pass">confirmar contraseña:</label>
                                    <div class="password-container">
                                        <input type="password" id="confirmar_pass" name="confirmar_pass" required 
                                            oninput="validarContraseñas()" 
                                            placeholder="vuelva a digitar su contraseña">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Aceptación de términos -->
                                <div class="form-group col-12 col-lg-6" style="font-size: 0.8rem;">
                                    <div id="password-match-message" style="font-size: 0.8rem;"></div>
                                    <label class="checkbox-container" style="display: flex; gap: 0.5rem; align-items: center;">
                                        <input type="checkbox" name="privacidad" required style="width: auto; margin: 0;">
                                        <a href="../terminos/terminos.html" target="_blank" style="color: var(--bs-body-color); margin-left: 1rem;">
                                            aceptar los términos y condiciones
                                        </a>
                                    </label>
                                </div>
                                <!-- Botones -->
                                <div class="button-group col-12 col-lg-6" style="display: flex; gap: 1rem; text-align:center;">
                                    <a href="../dashboard/login.php" class="back-btn">regresar</a>
                                    <button type="submit" class="login-btn">siguiente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
    <?php require 'scripts.php'; ?>
</body>
</html>
