<?php
session_start();
if (!isset($_SESSION['nombre_us'])) {
    header("Location: login.php");
    exit();
}
?>
    <link href="styles.css" rel="stylesheet"></link>
<h2>Bienvenido, <?php echo $_SESSION['nombre_us']; ?>!</h2>
<a href="logout.php">Cerrar sesión</a>
