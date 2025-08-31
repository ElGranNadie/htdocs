<?php 
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
        <div class="login-container" style="max-width: 100%; color: #212529;">
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
                                    <input type="text" style="color: #212529;" id="nombre" name="nombre" 
                                           value="<?= htmlspecialchars($old['nombre'] ?? '') ?>" 
                                           required placeholder="ingrese su nombre">
                                </div>
                                <!-- Campo: Correo -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="correo">correo:</label>
                                    <input type="email" style="color: #212529;" id="correo" name="correo" 
                                           value="<?= htmlspecialchars($old['correo'] ?? '') ?>" 
                                           required placeholder="ingrese un correo electrónico">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo: Usuario -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="usuario">usuario:</label>
                                    <input type="text" style="color: #212529;" id="usuario" name="usuario" 
                                           value="<?= htmlspecialchars($old['usuario'] ?? '') ?>" 
                                           required placeholder="elige un nombre de usuario">
                                </div>
                                <!-- Campo: Edad -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="edad">edad:</label>
                                    <input type="number" style="color: #212529;" id="edad" name="edad" 
                                           value="<?= htmlspecialchars($old['edad'] ?? '') ?>" 
                                           required min="1" max="120" placeholder="ingresa tu edad">
                                </div>
                            </div>

                            <div class="row">    
                                <!-- Campo: Contraseña -->
                                <div class="form-group col-12 col-lg-6">
                                    <label for="pass">contraseña:</label>
                                    <div class="password-container">
                                        <input type="password" style="color: #212529;" id="pass" name="pass" placeholder="contraseña" required>
                                        <button type="button" class="toggle-password" onclick="togglePasswordAll()">
                                            <i class="eye-icon">👁️</i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Campo: Confirmar contraseña -->
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
