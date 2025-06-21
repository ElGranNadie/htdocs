<?php
    require '../varset/varset.php';
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos/base.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>N.I.C.O.L.E</title>
    <script src='<?php echo $mainjs?>'></script> <!-- script main, añadido desde la lista de variables -->
    <style>
        
/*  estilo del carrusel   */
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
            color:  rgb(0, 0, 0);
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
<!--  cuerpo de la pagina -->
<body>
<!--  nombre y carrusel de frases  -->
    <div class="app-container">
        <div class="left-section">
            <h1 class="logo">N.I.C.O.L.E</h1>
            <div class="carousel">
                <div class="carousel-item">hola de nuevo, que <br> cocinaremos hoy?</div>
                <div class="carousel-item">miles de recetas  <br> a la espera</div>
                <div class="carousel-item">estas a nada de cocinar!!!</div>
            </div>
        </div>
        <!--   formulario de inicio de seccion -->
        <div class="right-section">
            <div class="login-container">
            <img src='<?php echo $logo ?>' alt="Icono" class="mb-4" width="100">
            <!-- Mensaje de error si hay un problema con el inicio de sesión -->    
            <h3>iniciar sesion</h3>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="error-message"><?php echo $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
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
                        <a href="../recuperar/recuperar.php">¿olvidaste tu contraseña?</a>
                    </div>
                    <!-- Botones de inicio de sesión y registro -->
                    <div class="button-group">
                        <button type="submit" class="login-btn">iniciar sesion</button>
                        <button type="button" onclick="window.location.href='../registro/registro.php'" class="register-btn">registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
