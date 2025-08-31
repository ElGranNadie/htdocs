<?php
session_start();
require_once "../dashboard/conexion.php"; 
require_once "../utils/validaciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['pass']);
    $errores = [];

    if (empty($correo) || empty($password)) {
        $errores[] = "Por favor ingrese correo y contraseña";
    }

    // Validar correo antes de la consulta
    $validCorreo = validarCorreo($correo);
    if (!empty($validCorreo)) {
        $errores = array_merge($errores, $validCorreo);
    }

    if (empty($errores)) {
        if ($stmt = $conn->prepare("SELECT id, correo, nombre_us, pass FROM usuarios WHERE correo = ?")) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();

                if (password_verify($password, $usuario['pass'])) {
                    // Guardamos variables de sesión consistentes
                    $_SESSION['user_id'] = $usuario['id'];
                    $_SESSION['correo'] = $usuario['correo'];
                    $_SESSION['usuario_nombre'] = $usuario['nombre_us'];

                    header("Location: ../dashboard/chat.php");
                    exit();
                } else {
                    $errores[] = "Contraseña incorrecta";
                }
            } else {
                $errores[] = "Usuario no encontrado";
            }

            $stmt->close();
        } else {
            $errores[] = "Error en la consulta a la base de datos";
        }
    }

    if (!empty($errores)) {
        $_SESSION['error'] = $errores;
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
