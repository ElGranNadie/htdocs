<?php

session_start();
include "../session/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $pass = md5($_POST['pass']); // Encriptado simple (usa bcrypt en producción)
    $pass2 = hex2bin($pass);
    $sql = "SELECT * FROM usuario WHERE correo='$correo' AND pass='$pass2'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['correo'] = $correo;
        $_SESSION['nombre_us'] = $row['nombre_us'];
        //echo "correo y pass correctos. $pass2";
        header("Location: ../login/chat.html");
    } else {
        echo "correo o pass incorrectos.";
    }
}
?>