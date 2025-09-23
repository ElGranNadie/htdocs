<?php
session_start();
require_once '../dashboard/conexion.php';
require_once '../utils/validaciones.php';
require_once '../dashboard/mail.php'; // PHPMailer configurado
require_once '../dashboard/credenciales.php'; // EMAIL_USER y EMAIL_PASS

function generarCodigo(){
    return strval(rand(100000, 999999));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['paso']) && $_POST['paso'] === '1') {
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $password = $_POST['pass'];
        $edad = intval($_POST['edad']);
        $usuario = trim($_POST['usuario']);

        $errores = [];

        // Validar correo
        $errores = array_merge($errores, validarCorreo($correo));

        // Validar contraseña
        $errores = array_merge($errores, validarPassword($password));

        // Guardar datos para que se mantengan
        $_SESSION['old'] = [
            'nombre' => $nombre,
            'correo' => $correo,
            'edad' => $edad,
            'usuario' => $usuario
        ];

        if (!empty($errores)) {
            $_SESSION['error'] = $errores;
            header("Location: registro.php");
            exit();
        }

        // Verificar si el correo ya existe
        $check_email = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
        $check_email->bind_param("s", $correo);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = ["Este correo ya está registrado"];
            header("Location: registro.php");
            exit();
        }

        // Verificar si el nombre de usuario ya existe
        $check_user = $conn->prepare("SELECT nombre_us FROM usuarios WHERE nombre_us = ?");
        $check_user->bind_param("s", $usuario);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = ["Este nombre de usuario ya está en uso"];
            header("Location: registro.php");
            exit();
        }

        // Guardar datos temporalmente en la sesión
        $_SESSION['temp_user_data'] = [
            'nombre'   => $nombre,
            'correo'   => $correo,
            'password' => $password,
            'edad'     => $edad,
            'usuario'  => $usuario
        ];

        header("Location: preferencias.php");
        exit();
    }

    elseif (isset($_POST['finalizar_registro'])) {
        if (!isset($_SESSION['temp_user_data'])) {
            header("Location: registro.php");
            exit();
        }


        $userData = $_SESSION['temp_user_data'];
        $hashed_password = password_hash($userData['password'], PASSWORD_DEFAULT);

        //Generar codigo de verificacion y vencimiento
        $codigo = generarCodigo();
        $expira = date ('Y-m-d H:i:s', strtotime('+10 minutes'));

        $conn -> begin_transaction();

        try {
            $conn->begin_transaction();

            $stmt = $conn->prepare("INSERT INTO usuarios (nombre_us, correo, pass, edad, usuario, codigo_verificacion, expiracion_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssisss",
                $userData['nombre'],
                $userData['correo'],
                $hashed_password,
                $userData['edad'],
                $userData['usuario'],
                $codigo,
                $expira
            );
            $stmt->execute();
            $usuario_id = $conn->insert_id;
            //insertar preferencias
            $stmt = $conn->prepare("INSERT INTO preferencias_culinarias (usuario_id, sabores_preferidos, alergias, peso, altura) VALUES (?, ?, ?, ?, ?)");
            $sabores = $_POST['sabores'] ?? '';
            $alergias = $_POST['alergias'] ?? '';
            $peso = $_POST['peso'] ?? '';
            $altura = ($_POST['altura'] ?? '') ? ($_POST['altura'] / 100) : '';

            $stmt->bind_param("issss", $usuario_id, $sabores, $alergias, $peso, $altura);
            $stmt->execute();

            //Usar la funcion de enviarCodigo
            if(enviarCodigo($userData['correo'], $codigo)){
                $conn->commit();

                unset($_SESSION['temp_user_data']);
                $_SESSION['correo_verificar'] = $userData['correo'];

                $_SESSION['success'] = "Registro completado exitosamente. Se ha enviado un codigo de verficación.";
                header("Location: ../dashboard/verificar.php");
                exit();
            }else{
                throw new Exception("No se pudo enviar el correo de verificación.");
            }
        } catch (Exception $e) {
            $conn->rollback();
            $_SESSION['error'] = ["Error al completar el registro: " . $e->getMessage()];
            header("Location: preferencias.php");
            exit();
        }   
    } else {
        header("Location: registro.php");
        exit();
    }
} else {
    header("Location: registro.php");
    exit();
}

$conn->close();
?>
