<?php
    session_start(); 
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos/base.css" rel="stylesheet">
    <title>N.I.C.O.L.E</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
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

        .form-group input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        .button-group button {
            padding: 12px 20px;
            font-weight: 500;
        }
        .button-group button:hover {
            transform: translateY(-2px);
        }
    </style>
    <script src='<?php echo $mainjs?>'></script>
    
</head>
<body>
    <div class="app-container">
        <div class="left-section">
            <h1 class="logo">N.I.C.O.L.E</h1>
            
            <div class="carousel">
                <div class="carousel-item">¿olvidaste tu<br>contraseña?</div>
                <div class="carousel-item">a nada de volver<br>a la cocina</div>
                <div class="carousel-item">tengo una receta<br>perfecta para ti</div>
            </div>
        </div>
        <div class="right-section">
            <div class="login-container">
            <img src='<?php echo $logo ?>' alt="Icono" class="mb-4" width="100">
                <h3>recuperar tu contraseña</h3>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error-message"><?php echo $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="procesar_recuperacion.php" method="POST">
                    <div class="form-group">
                        <input type="email" name="correo" placeholder="correo" required>
                    </div>
                    <p class="info-text">a continuación enviamos un código de verificación para que puedas recuperar tu contraseña</p>
                    <div class="form-group">
                        <input type="text" name="codigo" placeholder="código" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Nueva contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="pass" name="pass" placeholder="contraseña" required>
                            <button type="button" class="toggle-password" onclick="togglePasswordAll()"><i class="eye-icon">👁️</i></button>

                        </div>

                        <div class="form-group">
                            <label for="confirmar_pass">confirmar nueva contraseña:</label>
                            <div class="password-container">
                                <input type="password" id="confirmar_pass" name="confirmar_pass" required oninput="validarContraseñas()" placeholder="vuelva a digitar su contraseña para estar seguro">
                            </div>
                            <div id="password-match-message" class="input-help" style="font-size: 0.8rem; margin-top: 0.5rem;"></div>
                        </div>
                    </div>
                    <div id="password-match-message"></div>
                    <div class="button-group">
                        <button type="submit" class="login-btn">recuperar contraseña</button>
                        <button type="button" onclick="window.location.href='../login/login.php'" class="register-btn">volver al inicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>