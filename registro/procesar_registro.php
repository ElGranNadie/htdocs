<?php
session_start();
require_once '../session/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Paso 1: Registro inicial
    if (isset($_POST['paso']) && $_POST['paso'] === '1') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['pass'];
        $edad = $_POST['edad'];
        $usuario = $_POST['usuario'];

        // Validar longitud de contraseña
        if (strlen($password) < 6) {
            $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres";
            header("Location: registro.php");
            exit();
        }

        // Verificar si el correo ya existe
        $check_email = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
        $check_email->bind_param("s", $correo);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Este correo ya está registrado";
            header("Location: registro.php");
            exit();
        }

        // Verificar si el nombre de usuario ya existe
        $check_user = $conn->prepare("SELECT nombre_us FROM usuarios WHERE nombre_us = ?");
        $check_user->bind_param("s", $usuario);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Este nombre de usuario ya está en uso";
            header("Location: registro.php");
            exit();
        }

        // Almacenar datos temporalmente en la sesión
        $_SESSION['temp_user_data'] = [
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $password,
            'edad' => $edad,
            'usuario' => $usuario
        ];

        header("Location: preferencias.php");
        exit();
    }
    // Paso 2: Finalizar registro con preferencias
    elseif (isset($_POST['finalizar_registro'])) {
        if (!isset($_SESSION['temp_user_data'])) {
            header("Location: registro.php");
            exit();
        }

        $userData = $_SESSION['temp_user_data'];
        $hashed_password = password_hash($userData['password'], PASSWORD_DEFAULT);

        // Iniciar transacción
        $conn->begin_transaction();

        try {
            // Insertar usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre_us, correo, pass, edad, usuario) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssis",
                $userData['nombre'],    // nombre_us
                $userData['correo'],    // correo
                $hashed_password,       // pass
                $userData['edad'],      // edad
                $userData['usuario']    // usuario
            );
            $stmt->execute();
            $usuario_id = $conn->insert_id;

            // Insertar preferencias
            $stmt = $conn->prepare("INSERT INTO preferencias_culinarias (usuario_id, sabores_preferidos, alergias, peso, altura) VALUES (?, ?, ?, ?, ?)");
            $sabores = $_POST['sabores'] ?? '';
            $alergias = $_POST['alergias'] ?? '';
            $peso = $_POST['peso'] ?? '';
            $altura = ($_POST['altura'] ?? '') ? ($_POST['altura'] / 100) : ''; // Convertir centímetros a metros

            $stmt->bind_param("issss", $usuario_id, $sabores, $alergias, $peso, $altura);
            $stmt->execute();

            $conn->commit();
            unset($_SESSION['temp_user_data']);
            $_SESSION['success'] = "Registro completado exitosamente. Por favor, inicia sesión";
            header("Location: ../login/login.php");
        } catch (Exception $e) {
            $conn->rollback();
            $_SESSION['error'] = "Error al completar el registro: " . $e->getMessage();
            header("Location: preferencias.php");
        }
    } else {
        header("Location: registro.php");
    }
} else {
    header("Location: registro.php");
}

$conn->close();