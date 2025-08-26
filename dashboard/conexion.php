<?php
$conn = new mysqli(
    "localhost", 
    "root",
    "", 
    "nicole");
//conexión a la base de datos
// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
