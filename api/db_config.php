
<?php
// db_config.php
$host = "gateway01.us-east-1.prod.aws.tidbcloud.com";
$port = 4000;
$username = "3Gw9Xu5nZKmw4hv.root";
$password = "Dv92surgRHtse239";
$database = "test";

// Ruta del certificado (asegúrate de subir el .pem al mismo directorio)
$ssl_cert = __DIR__ . "/isrgrootx1.pem";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_cert, NULL, NULL);

if (!mysqli_real_connect($conn, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die(json_encode(["error" => "Error de conexión: " . mysqli_connect_error()]));
}

$conn->set_charset("utf8mb4");
?>