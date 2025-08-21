<?php
session_start();// Inicia o retoma la sesión existente
session_destroy();// Destruye todos los datos asociados a la sesión actual
header("Location: login.php");// Redirige al usuario al formulario de inicio de sesión (login)
?>
