<?php

session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_us = $_POST['nombre_us'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $passb = $_POST['passb'];
    $edad = $_POST['edad'];
    $altura = $_POST['altura'];
    $genero_us = $_POST['genero_us'];
    $actividad_fs = $_POST['actividad_fs'];
    $sql = "SELECT correo FROM usuario WHERE correo='$correo'";
    $result = $conn->query($sql);
    if ($pass != $passb) {
        echo "Las contraseñas no coinciden. Intenta de nuevo.";
        exit;
    } elseif ($result->num_rows > 0) {
        echo "El correo ya está registrado. Intenta con otro.";
        exit;
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    } elseif (!is_numeric($edad) || $edad < 0 || $edad > 120) {
        echo "La edad no es válida.";
        exit;
    } elseif (!is_numeric($altura) || $altura < 0 || $altura > 300) {
        echo "La altura no es válida.";
        exit;
    } elseif ($actividad_fs != "Sedentario" && $actividad_fs != "Moderado" && $actividad_fs != "Activo" && $actividad_fs != "Deportista") {
        echo "La actividad física no es válida.";
        exit;
    } else {
        $stmt = $conn->prepare("INSERT INTO usuario (edad, pass, correo, nombre_us, altura, genero_us, actividad_fs) VALUES (?, UNHEX(?), ?, ?, ?, ?, ?)");
        $result = $conn->query($sql);
        if ($stmt === false) {
            die("Error en la preparación: " . $conn->error);
        }
        $stmt->bind_param("isssiss", $edad, $pass, $correo, $nombre_us, $altura, $genero_us, $actividad_fs);
        if ($stmt->execute()) {
            
            header("Location: ../session/login.php");
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    
    // Ejecutar la consulta
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['correo'] = $correo;
        $_SESSION['nombre_us'] = $row['nombre_us'];
    } else {
        echo "correo o pass incorrectos.";
    }
}
?>