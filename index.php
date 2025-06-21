<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require 'varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
</head>
<!-- Contenido visible para el usuario -->
<!--Redirección del lado del servidor a la ruta de login-->
<body>
    <?php
    //header("Location: ../login/login.php");
    header("Location: ../dashboard/index.php"); // Redirige al dashboard
    exit(); // Asegura que no se ejecute más código después de la redirección
    ?>
</body>
</html>