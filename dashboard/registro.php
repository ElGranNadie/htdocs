<?php session_start(); 
    require '../varset/varset.php';
?>
<!DOCTYPE html><!-- Declaración de documento HTML5 -->
<html lang="es"><!-- Establece el idioma del contenido como español -->
<head>
    <title>Registro en N.I.C.O.L.E</title>
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
    <?php require '../dashboard/header.php'; ?> <!-- Incluye el encabezado de la página -->
    <div class="app-container" style="align-items:normal;">
    <div class="login-container" style="max-width: 100%; color: #212529;">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src='<?php echo $logo ?>64.png' alt="Icono" style="width: 64px;"><!-- Logo de la marca -->
                </div>
                <div class="col-12 col-lg-6">
                    <h3 style="color: var(--bs-body-color);">regístrate ya!!!</h3>
                </div>
            </div>
            <div class="row">
                <form action="procesar_registro.php" method="POST" style="text-align: left;">
                    <div class="col-12" style="color: var(--bs-body-color);">
                        <input type="hidden" name="paso" value="1">
                        <div class="row">
                        <!-- Campo: Nombre -->
                            <div class="form-group col-12 col-lg-6">
                                <label for="nombre">nombre:</label>
                                <input type="text" style="color: #212529;" id="nombre" name="nombre" required placeholder="ingrese su nombre">
                            </div>
                            <!-- Campo: Correo electrónico -->
                            <div class="form-group col-12 col-lg-6">
                                <label for="correo">correo:</label>
                                <input type="email" style="color: #212529;" id="correo" name="correo" required placeholder="ingrese un correo electrónico">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Campo: Usuario -->
                            <div class="form-group col-12 col-lg-6">
                                <label for="usuario">usuario:</label>
                                <input type="text" style="color: #212529;" id="usuario" name="usuario" required placeholder="elige un nombre de usuario">
                            </div>
                            <!-- Campo: Edad -->
                            <div class="form-group col-12 col-lg-6">
                                <label for="edad">edad:</label>
                                <input type="number" style="color: #212529;" id="edad" name="edad" required min="1" max="120" placeholder="ingresa tu edad">
                            </div>
                        </div>
                        <div class="row">    
                            <!-- Campo: Contraseña con botón para mostrar/ocultar -->
                            <div class="form-group col-12 col-lg-6">
                                <label for="pass">contraseña:</label>
                                <div class="password-container">
                                    <input type="password" style="color: #212529;" id="pass" name="pass" placeholder="contraseña" required>
                                    <button type="button" class="toggle-password" onclick="togglePasswordAll()">
                                        <i class="eye-icon">👁️</i>
                                    </button>
                                </div>
                            </div>
                            <!-- Campo: Confirmar contraseña con idación en vivo -->
                            <div class="form-group col-12 col-lg-6">
                                <label class="col-12 col-lg-6" for="confirmar_pass">confirmar contraseña:</label>
                                <div class="password-container">
                                    <input type="password" style="color: #212529;" id="confirmar_pass" name="confirmar_pass" required 
                                        oninput="validarContraseñas()" 
                                        placeholder="vuelva a digitar su contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <!-- Aceptación de términos y condiciones -->
                            <div class="form-group col-12 col-lg-6" style="font-size: 0.8rem;">
                                <div class="col-12 col-lg-6" id="password-match-message" class="input-help" style="font-size: 0.8rem;"></div>
                                <label class="checkbox-container" style="display: flex; gap: 0.5rem; align-items: center;">
                                    <input type="checkbox" name="privacidad" required style="width: auto; margin: 0;">
                                    <a href="../terminos/terminos.html" target="_blank" style="color: var(--bs-body-color); margin-left: 1rem;">
                                        aceptar los términos y condiciones
                                    </a>
                                </label>
                            </div>
                            <!-- Botones para regresar al login o continuar -->
                            <div class="button-group col-12 col-lg-6" style="display: flex; gap: 1rem; text-align:center;">
                                <a href="../dashboard/login.php" class="back-btn">
                                    regresar
                                </a>
                                <button type="submit" class="login-btn">
                                    siguiente
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Muestra mensajes de error si existen en la sesión -->
    <?php if(isset($_SESSION['error'])): ?>
        <div class="error-message" style="color: red; margin-bottom: 1rem; text-align:center; font-weight:bold;">
            <?php echo $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <!-- Formulario de registro paso 1 -->
    <?php require 'footer.php';?><!-- Incluye el pie de página -->
    <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>