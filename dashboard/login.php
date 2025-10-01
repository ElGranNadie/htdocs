<?php session_start(); 
/**
 * @file login.php
 * @brief Vista del formulario de inicio de sesión del sistema N.I.C.O.L.E.
 *
 * Este archivo implementa la interfaz gráfica de inicio de sesión para el usuario. 
 * Forma parte del flujo de autenticación y redirige las credenciales ingresadas 
 * hacia el archivo @ref procesar_login.php, donde se realiza la validación contra la base de datos.
 *
 * @details
 * - Utiliza sesiones PHP para manejar mensajes de error en caso de credenciales inválidas.
 * - Integra componentes compartidos mediante @c require: 
 *   - @c ../varset/varset.php → variables globales como el logo.
 *   - @c other.php → metadatos y enlaces comunes.
 *   - @c stylesheet.php → estilos del dashboard.
 *   - @c ../dashboard/header.php → cabecera de la página.
 *   - @c footer.php → pie de página.
 *   - @c scripts.php → dependencias JS (ej. Bootstrap).
 *
 * @note El estilo del carrusel está definido de forma interna en este archivo, 
 * ya que no es compartido con el resto del sistema.
 *
 * @section flujo Flujo general
 * 1. El usuario accede al formulario de inicio de sesión.
 * 2. Se renderiza un carrusel motivacional y el formulario de login.
 * 3. Si existen errores previos en la sesión (ej. credenciales inválidas), se muestran al usuario.
 * 4. Al enviar el formulario, se envían las credenciales mediante POST hacia @ref procesar_login.php.
 * 5. El sistema procesa y responde en consecuencia (redirección o error).
 *
 * @section seguridad Consideraciones de seguridad
 * - Uso de HTTPS recomendado para proteger la transmisión de credenciales.
 * - Validación de entradas en @ref procesar_login.php para evitar inyecciones SQL.
 * - Manejo seguro de contraseñas (hashing en el servidor).
 *
 */

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>N.I.C.O.L.E</title>
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
    <style>
        /*  estilo del carrusel  (no es el mismo que el del login, por lo que no los podemos juntar a lo mejor y lo quitamos) */
        .carousel {
            position: relative;
            margin-top: 2rem;
            width: 100%;
            max-width: 500px;
            height: 180px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0);
            border-radius: 10px;
            padding: 30px;
        }
        .carousel-item {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size: 2.8rem;
            color:  var(--bs-body-color);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
            display: none;
        }
        @keyframes carouselFade {
            0% { opacity: 0; transform: translateY(20px); }
            5% { opacity: 1; transform: translateY(0); }
            35% { opacity: 1; transform: translateY(0); }
            40% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 0; transform: translateY(-20px); }
        }
        .carousel-item {
            animation: carouselFade 15s infinite;
            display: block;
        }
        .carousel-item:nth-child(1) { animation-delay: 0s; }
        .carousel-item:nth-child(2) { animation-delay: 5s; }
        .carousel-item:nth-child(3) { animation-delay: 10s; }
        .error-message {
            color: red; 
            margin-bottom: 1rem; 
            text-align:center; 
            font-weight:bold;
        }
    </style>
</head>
<!--  cuerpo de la pagina -->
<body>
<!--  nombre y carrusel de frases  -->
    <?php require '../dashboard/header.php'; ?> <!-- Incluye el encabezado de la página -->
    <div class="row">
        <div class="offset-lg-0 col-lg-6 left-section">
            <div class="carousel">
                <div class="carousel-item">hola de nuevo, que cocinaremos hoy?</div>
                <div class="carousel-item">miles de recetas a la espera</div>
                <div class="carousel-item">estas a nada de cocinar!!!</div>
            </div>
        </div>
            <!--   formulario de inicio de seccion -->
        <div class="col-xs-11 col-lg-6">
            <div class="right-section">
                <div class="login-container">
                <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64px" height="64px">
                <!-- Mensaje de error si hay un problema con el inicio de sesión -->    
                    <h3>iniciar sesión</h3>

                    <!-- Mostrar errores -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="error-message">
                            <ul style="list-style:none; padding:0;">
                                <?php 
                                if (is_array($_SESSION['error'])) {
                                    foreach ($_SESSION['error'] as $err) {
                                        echo "<li>⚠️ $err</li>";
                                    }
                                } else {
                                    echo "<li>⚠️ " . $_SESSION['error'] . "</li>";
                                }
                                unset($_SESSION['error']);
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <!-- Formulario de inicio de sesión -->
                    <form action="procesar_login.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="correo" placeholder="correo" required>
                        </div>
                        <div class="form-group">
                            <div class="password-container">
                                <input type="password" id="pass" name="pass" placeholder="contraseña" required>
                                <!-- boton de icono para mostrar o ocultar contraseña  -->
                                <button type="button" class="toggle-password" onclick="togglePassword('pass')"><i class="eye-icon">👁️</i></button>
                            </div>
                        </div>
                        <!-- Enlace para recuperar contraseña -->
                        <div class="forgot-password">
                            <a href="../dashboard/recuperar.php">¿olvidaste tu contraseña?</a>
                        </div>
                        <!-- Botones de inicio de sesión y registro -->
                        <div class="button-group">
                            <button type="submit" class="login-btn">iniciar sesion</button>
                            <button type="button" onclick="window.location.href='../dashboard/registro.php'" class="login-btn">registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer de la página -->
    <?php require 'footer.php';?><!-- Incluye el pie de página -->
    <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>
