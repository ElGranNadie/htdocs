<?php
/**
 * @file validaciones.php
 * @brief Módulo encargado de validar los datos ingresados por el usuario, como correos y contraseñas.
 *
 * Este archivo contiene funciones para verificar el formato del correo electrónico y la seguridad
 * de las contraseñas según las políticas establecidas. Forma parte del sistema de autenticación
 * y recuperación de cuentas, garantizando que los datos cumplan con los requisitos mínimos antes
 * de ser procesados o almacenados.
 *
 * @details
 * - Las validaciones se realizan utilizando expresiones regulares y funciones nativas de PHP.
 * - No depende de librerías externas.
 * - Retorna listas de errores detalladas para mostrar al usuario o registrar en logs.
 *
 * @dependencies 
 * - PHP >= 7.4
 * - Extensión `filter` (para la función `filter_var`)
 */

/**
 * @brief Valida el formato de un correo electrónico.
 *
 * Esta función utiliza el filtro nativo `FILTER_VALIDATE_EMAIL` para determinar si
 * el correo ingresado cumple con el formato estándar RFC 822.
 *
 * @param string $correo El correo electrónico a validar.
 * @return array Lista de errores encontrados (vacía si el correo es válido).
 */
function validarCorreo($correo) {
    $errores = [];
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido";
    }
    return $errores;
}

/**
 * @brief Valida la seguridad de una contraseña.
 *
 * Esta función comprueba que la contraseña cumpla con los requisitos mínimos de seguridad:
 * longitud mínima, presencia de letras mayúsculas, números y caracteres especiales.
 *
 * @param string $password La contraseña a validar.
 * @return array Lista de errores encontrados (vacía si la contraseña es segura).
 */
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
