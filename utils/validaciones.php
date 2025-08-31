<?php
// Validar correo electrónico (devuelve array con errores)
function validarCorreo($correo) {
    $errores = [];
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido";
    }
    return $errores;
}

// Validar contraseña (devuelve array con todos los errores encontrados)
function validarPassword($password) {
    $errores = [];

    if (strlen($password) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errores[] = "La contraseña debe contener al menos una letra mayúscula";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errores[] = "La contraseña debe contener al menos un número";
    }
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errores[] = "La contraseña debe contener al menos un carácter especial";
    }

    return $errores;
}
?>
