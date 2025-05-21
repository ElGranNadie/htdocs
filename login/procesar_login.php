<?php
session_start();
require_once "../registro/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['pass'];

    // Preparar la consulta para prevenir inyección SQL

    //background: linear-gradient(135deg,rgba(255, 0, 0, 0), #333);
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $usuario['pass'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['nombre_us'] = $usuario['nombre_us'];
            
            header("Location: ../login/chat.html");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado";
    }

    if (isset($_SESSION['error'])) {
        header("Location: login.php");
        exit();
    }

    $stmt->close();
} else {
    header("Location: login.php");
}

$conn->close();