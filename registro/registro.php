<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="styles.css" rel="stylesheet"></link>
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form action="procesar_registro.php" method="POST">
        <h2>Datos de inicio de sesion</h2>
        <input type="text" name="nombre_us" placeholder="nombre_us" id="nombre_us" required><br>
        <input type="text" name="correo" placeholder="correo" id="correo" required><br>
        <input type="password" name="pass" placeholder="pass" id="pass" required><br>
        <input type="password" name="passb" placeholder="passb" id="passb" required><br>
        <br>
        <p><b>-----------------------------------------------------------</b></p>
        <br>
        <h2>Datos personales</h2>
        <input type="number" name="edad" placeholder="edad" id="edad" required><br>
        <input type="number" name="altura" placeholder="altura" id="altura" required><br>
        <select type="select" name="genero_us" id="genero_us" required>
            <option value="Masculino" selected>Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        <br>
        <select type="select" name="actividad_fs" placeholder="actividad_fs" required>
            <option value="Sedentario" selected>Sedentario</option>
            <option value="Moderado">Moderado</option>
            <option value="Activo">Activo</option>
            <option value="Deportista">Deportista</option>
        </select>
        <br>
        <input type="text" name="correo" placeholder="correo" required><br>        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>