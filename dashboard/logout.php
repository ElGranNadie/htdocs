<?php
/**
 * @file logout.php
 * @brief Cierre de sesión en el sistema N.I.C.O.L.E.
 *
 * Este archivo destruye la sesión activa y redirige al formulario de login.
 *
 * @details
 * - Inicia la sesión con @c session_start().
 * - Elimina todos los datos de sesión mediante @c session_destroy().
 * - Redirige al archivo @ref login.php para que el usuario pueda autenticarse nuevamente.
 *
 * @section flujo Flujo
 * 1. El usuario selecciona la opción de cerrar sesión.
 * 2. Se ejecuta este archivo.
 * 3. Se destruye la sesión activa.
 * 4. El usuario es redirigido al formulario de login.
 */

session_start();// Inicia o retoma la sesión existente
session_destroy();// Destruye todos los datos asociados a la sesión actual
header("Location: login.php");// Redirige al usuario al formulario de inicio de sesión (login)
?>
