<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="styles.css" rel="stylesheet"></link>
    <title>Login</title>
</head>
<body>
    
    <form action="procesar_login.php" method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="text" name="correo" placeholder="correo" required>
        <input type="password" name="pass" placeholder="pass" required>
        <button type="submit">Entrar</button>
    </form>
    <button formaction="/registro/registro.php">Registro</button>

</body>
</html>
