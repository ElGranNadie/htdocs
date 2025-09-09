<?php
    session_start(); 
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<head>
    <title>N.I.C.O.L.E</title>
    <?php include "../dashboard/other.php"; ?>
    <?php include "../dashboard/stylesheet.php"; ?>
</head>
<body>
    <?php include "../dashboard/header.php"; ?>
    <div class="app-container" >
        <div class="right-section">
            <div class="login-container" style="max-width: 95vw;">
                <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64">
                <h3>recuperar tu contraseña</h3>
                <div class="row" style="width: 100%; margin: 0; padding: 1rem;">
                    <div class="col-md-6 col-12">
                        <p class="info-text">Ingresa aqui el correo electronico asociado a tu cuenta, enviaremos un codigo para que puedas 
                            recuperar tu contraseña, así confirmaremos que si tienes posesión de dicho correo.
                        </p>
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="error-message"><?php echo $_SESSION['error']; ?></div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                        <form action="procesar_recuperacion.php" method="POST">
                            <div class="form-group">
                                <input type="email" name="correo" placeholder="correo" required>
                            </div>
                            <div class="row justify-content-end align-items-center" style="margin: 0;">
                                <p class="info-text col-10" style="text-align :right;">Presiona el boton para recibir el codigo: </p>
                                <button type="submit col-2" class="login-btn" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;">enviar código</button>
                            </div>
                        </form>
                        <form action="procesar_recuperacion2.php" method="POST">
                            <p class="info-text">Una vez recibido el codigo en tu correo, ingresalo aqui para validarte como propietario.</p>
                            <div class="form-group">
                                <input type="email" name="correo" placeholder="codigo" required>
                            </div>
                            <div class="row justify-content-end align-items-center" style="margin: 0;">
                                <p class="info-text col-10" style="text-align :right;">Presiona el boton para validar el codigo: </p>
                                <button type="submit col-2" class="login-btn" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;">validar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="info-text">Al terminar el proceso de validacion, por favor ingresa tu nueva contraseña, ademas, 
                            validala ingresandola de nuevo en el recuadro inferior</p>
                        <form action="procesar_recuperacion3.php" method="POST">
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
                            <button type="submit" class="login-btn col-12">recuperar contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../dashboard/footer.php"; ?>
    <?php include "../dashboard/scripts.php"; ?>
</body>
</html>