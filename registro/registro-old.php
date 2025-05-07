<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro - Experiencias Culinarias</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <script src="../js/theme.js"></script>
    <style>
        .left-section {
            background-color: rgba(255, 192, 203, 0.2);
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 2rem;
        }

        .logo {
            font-family: 'Pacifico', cursive;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .welcome-message h2 {
            font-family: 'Quicksand', sans-serif;
            font-size: 2rem;
            color: black;
            margin-bottom: 0.5rem;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 2rem;
            width: 90%;
            max-width: 400px;
        }

        .login-container h3 {
            font-family: 'Quicksand', sans-serif;
            font-size: 1.8rem;
            color: black;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        input {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 0.8rem 1rem;
            font-family: 'Quicksand', sans-serif;
        }

        .login-btn {
            background-color: #92c24c;
            color: white;
            border-radius: 20px;
            padding: 0.8rem 2rem;
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background-color: #7ba93d;
        }
    </style>
</head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        function validarContraseñas() {
            const pass = document.getElementById('pass').value;
            const confirmarPass = document.getElementById('confirmar_pass').value;
            const mensaje = document.getElementById('password-match-message');
            
            if (confirmarPass === '') {
                mensaje.textContent = '';
                mensaje.style.color = '';
            } else if (pass === confirmarPass) {
                mensaje.textContent = 'Las contraseñas coinciden';
                mensaje.style.color = 'green';
            } else {
                mensaje.textContent = 'Las contraseñas no coinciden';
                mensaje.style.color = 'red';
            }
        }
    </script>
<body>
    <div class="app-container">
        <div class="left-section">
            <div class="logo">CULINARY</div>
            
            <!-- Primer Carousel -->
            <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="welcome-message">
                            <h2>Un mundo de nuevas experiencias culinarias te espera</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="welcome-message">
                            <h2>Regístrate y cocinemos juntos</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="welcome-message">
                            <h2>¿Habías oído hablar de Nicole?</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segundo Carousel -->
            <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="welcome-message">
                            <p class="subtitle">Regístrate ahora y empieza a conocer nuevas recetas</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="welcome-message">
                            <p class="subtitle">Una puerta a miles de ideas deliciosas</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="welcome-message">
                            <p class="subtitle">Una IA que puede ayudarte a cocinar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-section">

            <div class="login-container">
                <img src="../icono.jpg" alt="Icono" style="width: 60px; margin-bottom: 1rem;">
                <h3>regístrate ya!!!</h3>
                
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error-message"><?php echo htmlspecialchars($_SESSION['error']); ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form action="procesar_registro.php" method="POST" style="text-align: left;">
                    <input type="hidden" name="paso" value="1">
                    
                    <div class="form-group">
                        <label for="nombre">nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="ingrese su nombre">
                    </div>

                    <div class="form-group">
                        <label for="correo">correo:</label>
                        <input type="email" id="correo" name="correo" required placeholder="ingrese un correo electrónico">
                    </div>

                    <div class="form-group">
                        <label for="pass">contraseña:</label>
                        <input type="password" id="pass" name="pass" required placeholder="ingrese una contraseña">
                    </div>

                    <div class="form-group">
                        <label for="confirmar_pass">confirmar contraseña:</label>
                        <input type="password" id="confirmar_pass" name="confirmar_pass" required oninput="validarContraseñas()" placeholder="vuelva a digitar su contraseña para estar seguro">
                        <div id="password-match-message" class="input-help" style="font-size: 0.8rem; margin-top: 0.5rem;"></div>
                    </div>

                    <div class="form-footer" style="margin: 1.5rem 0; font-size: 0.8rem;">
                        <label class="checkbox-container" style="display: flex; gap: 0.5rem; align-items: center;">
                            <input type="checkbox" name="privacidad" required style="width: auto; margin: 0;">
                            <span style="color: #666;">privacidad</span>
                            <a href="../terminos.html" target="_blank" style="color: #666; margin-left: 1rem;">términos y condiciones</a>
                        </label>
                    </div>

                    <div class="button-group" style="display: flex; gap: 1rem;">
                        <a href="../login.php" class="back-btn" style="flex: 1; padding: 0.8rem; text-align: center; background: #6c757d; color: white; text-decoration: none; border-radius: 20px;">regresar</a>
                        <button type="submit" class="login-btn" style="flex: 1;">siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>