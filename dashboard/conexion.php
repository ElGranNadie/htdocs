<?php
$conn = new mysqli("gateway01.us-east-1.prod.aws.tidbcloud.com", "3Gw9Xu5nZKmw4hv.root", "Dv92surgRHtse239", "test");
//conexión a la base de datos
// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
