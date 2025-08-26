<?php
    session_start(); 
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<head>
    <title>N.I.C.O.L.E</title>
    <?php include "../dashboard/other.php"; ?>
    <?php include "../dashboard/stylesheet.php"; ?>
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
</head>
<body>
    <?php include "../dashboard/header.php"; ?>
    <div class="app-container">
        <div class="right-section">
            <div class="login-container">
            <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64">
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
                        <button type="button" onclick="window.location.href='../login/login.php'" class="login-btn">volver al inicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "../dashboard/footer.php"; ?>
    <?php include "../dashboard/scripts.php"; ?>
</body>
</html>