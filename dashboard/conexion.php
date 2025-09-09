<?php
$host = "gateway01.us-east-1.prod.aws.tidbcloud.com"; // tu host
$port = 4000; 
$user = "3Gw9Xu5nZKmw4hv.root"; 
$password = "Dv92surgRHtse239"; 
$dbname = "test";

// Ruta absoluta al certificado CA
$ssl_ca = "C:/xampp/mysql/certs/isrgrootx1.pem";

$conn = mysqli_init();

// Configurar SSL
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);

// Conectar con SSL
if (!mysqli_real_connect($conn, $host, $user, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

//echo "✅ Conectado correctamente a TiDB con SSL";
?>

