<?php session_start(); 
    require '../varset/varset.php';
?>
<!DOCTYPE html><!-- Declaración de documento HTML5 -->
<html lang="es"><!-- Establece el idioma del contenido como español -->

<head>
    <meta charset="UTF-8"><!-- Configuración de caracteres para admitir acentos y símbolos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Hace que la vista se adapte a dispositivos móviles -->

    <!-- Inclusión de Bootstrap desde CDN para estilos responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">

    <title>Registro - Experiencias Culinarias</title>    <!-- Título mostrado en la pestaña del navegador -->
    <link rel="stylesheet" href="../estilos/base.css"><!-- Hoja de estilos personalizada -->

    <!-- Fuentes de Google para mejorar la estética del texto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .carousel {
            position: relative;
            margin-top: 2rem;
            width: 100%;
            max-width: 500px;
            height: 220px;
            overflow: visible;
            background: rgba(0, 0, 0, 0);
            border-radius: 10px;
            padding: 20px;
        }

        .carousel-item {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size: 2.8rem;
            font-family: 'Quicksand', sans-serif;
            color: rgb(0, 0, 0);
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
    </style>
</head>
<!-- Scripts necesarios para funcionalidad de Bootstrap y JS personalizados -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src='<?php echo $mainjs?>'></script>

<body>
    <!-- Sección izquierda con logo y frases animadas -->
    <div class="app-container">
        <div class="left-section">
            <div class="logo">CULINARY</div>

            <div class="carousel">
                <div class="carousel-item">un mundo de nuevas<br>experiencias culinarias</div>
                <div class="carousel-item">regístrate y<br>cocinemos juntos</div>
                <div class="carousel-item">¿habías oído hablar<br>de nicole?</div>
            </div>
        </div>

        <!-- Sección derecha con formulario de registro -->
        <div class="right-section">
            <div class="login-container">
                <img src="../imagenes/icono.jpg" alt="Icono" style="width: 60px; margin-bottom: 1rem;"><!-- Logo de la marca -->
                <h3>regístrate ya!!!</h3>

                <!-- Muestra mensajes de error si existen en la sesión -->
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error-message" style="color: red; margin-bottom: 1rem; text-align:center; font-weight:bold;">
                        <?php echo $_SESSION['error']; ?>
                        <?php unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulario de registro paso 1 -->
                <form action="procesar_registro.php" method="POST" style="text-align: left;">
                    <input type="hidden" name="paso" value="1">
                    
                    <!-- Campo: Nombre -->
                    <div class="form-group">
                        <label for="nombre">nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="ingrese su nombre">
                    </div>

                    <!-- Campo: Correo electrónico -->
                    <div class="form-group">
                        <label for="correo">correo:</label>
                        <input type="email" id="correo" name="correo" required placeholder="ingrese un correo electrónico">
                    </div>

                    <!-- Campo: Usuario -->
                    <div class="form-group">
                        <label for="usuario">usuario:</label>
                        <input type="text" id="usuario" name="usuario" required placeholder="elige un nombre de usuario">
                    </div>

                    <!-- Campo: Edad -->
                    <div class="form-group">
                        <label for="edad">edad:</label>
                        <input type="number" id="edad" name="edad" required min="1" max="120" placeholder="ingresa tu edad">
                    </div>

                    <!-- Campo: Contraseña con botón para mostrar/ocultar -->
                    <div class="form-group">
                        <label for="pass">contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="pass" name="pass" placeholder="contraseña" required>
                            <button type="button" class="toggle-password" onclick="togglePasswordAll()">
                                <i class="eye-icon">👁️</i>
                            </button>
                        </div>
                    </div>

                    <!-- Campo: Confirmar contraseña con validación en vivo -->
                    <div class="form-group">
                        <label for="confirmar_pass">confirmar contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="confirmar_pass" name="confirmar_pass" required 
                                oninput="validarContraseñas()" 
                                placeholder="vuelva a digitar su contraseña">
                        </div>
                        <div id="password-match-message" class="input-help" style="font-size: 0.8rem; margin-top: 0.5rem;"></div>
                    </div>

                    <!-- Aceptación de términos y condiciones -->
                    <div class="form-footer" style="margin: 1.5rem 0; font-size: 0.8rem;">
                        <label class="checkbox-container" style="display: flex; gap: 0.5rem; align-items: center;">
                            <input type="checkbox" name="privacidad" required style="width: auto; margin: 0;">
                            <a href="../terminos/terminos.html" target="_blank" style="color: #666; margin-left: 1rem;">
                                aceptar los términos y condiciones
                            </a>
                        </label>
                    </div>

                    <!-- Botones para regresar al login o continuar -->
                    <div class="button-group" style="display: flex; gap: 1rem; text-align:center;">
                        <a href="../login/login.php" class="back-btn" style="flex: 1; padding: 0.8rem; text-align: center; background: #6c757d; color: white; text-decoration: none; border-radius: 20px;">
                            regresar
                        </a>
                        <button type="submit" class="login-btn" style="flex: 1; padding: 0.8rem; text-align:center; border-radius: 20px;">
                            siguiente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>