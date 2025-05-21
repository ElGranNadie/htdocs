<?php
session_start();
$_SESSION['prueba'] = "Sesión activa";
echo "Sesión guardada: " . $_SESSION['prueba'];
?>