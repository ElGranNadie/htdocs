<?php
// ==========================
// 🔹 Mostrar errores en pantalla (debug)
// ==========================
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// ==========================
// 🔹 Conexión a TiDB Cloud
// ==========================
$host = "gateway01.us-east-1.prod.aws.tidbcloud.com";
$port = 4000; 
$user = "3Gw9Xu5nZKmw4hv.root"; 
$password = "Dv92surgRHtse239"; 
$dbname = "test";
$ssl_ca = "C:/xampp/mysql/certs/isrgrootx1.pem";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $user, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("<div class='error'>❌ Error de conexión: " . mysqli_connect_error() . "</div>");
}

// ==========================
// 🔹 Validar payment_id
// ==========================
if (!isset($_GET['payment_id'])) {
    die("<div class='error'>❌ No se recibió un payment_id</div>");
}
$payment_id = $_GET['payment_id'];

// ==========================
// 🔹 Cargar librería MercadoPago
// ==========================
require __DIR__ . "/mercadopago.php";
use MercadoPago\MercadoPagoConfig;

// ✅ Usar el AccessToken ya definido en mercadopago.php
$access_token = MercadoPagoConfig::getAccessToken();

// ==========================
// 🔹 Consultar API MercadoPago
// ==========================
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/" . $payment_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $access_token
]);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("<div class='error'>❌ Error cURL: " . curl_error($ch) . "</div>");
}

curl_close($ch);

$data = json_decode($response, true);

// Validar respuesta
if (!isset($data["status"])) {
    die("<div class='error'>❌ No se pudo obtener detalles del pago</div>");
}

// ==========================
// 🔹 Extraer datos
// ==========================
$status = $data["status"];
$amount = $data["transaction_amount"] ?? 0.00;
$method = $data["payment_type_id"] ?? "unknown";
$reference = $data["external_reference"] ?? null; // viene de pago.php con el user_id

// ==========================
// 🔹 Guardar en la tabla pagos
// ==========================
$stmt = $conn->prepare("INSERT INTO pagos (payment_id, status, amount, method, date, reference) 
                        VALUES (?, ?, ?, ?, NOW(), ?)");
$stmt->bind_param("ssdss", $payment_id, $status, $amount, $method, $reference);
$stmt->execute();
$stmt->close();

// ==========================
// 🔹 Si el pago fue aprobado → actualizar usuario a premium
// ==========================
if ($status === "approved" && $reference) {
    $usuario_id = intval($reference);

    // Establecemos premium por 30 días
    $stmt = $conn->prepare("UPDATE usuarios 
                            SET es_premium = 1, 
                                premium_expiracion = DATE_ADD(NOW(), INTERVAL 30 DAY) 
                            WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->close();
}

// ==========================
// 🔹 HTML + CSS
// ==========================
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Pago</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f8fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            padding: 25px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .success {
            color: #2e7d32;
        }
        .error {
            color: #c62828;
        }
        .warning {
            color: #f9a825;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            background: #1976d2;
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0d47a1;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($status === "approved"): ?>
            <h1 class="success">✅ Pago aprobado</h1>
            <p>Tu cuenta ha sido actualizada a <b>Premium</b> 🎉</p>
            <p><b>ID Pago:</b> <?= htmlspecialchars($payment_id) ?></p>
            <p><b>Monto:</b> $<?= number_format($amount, 2) ?></p>
            <p><b>Método:</b> <?= htmlspecialchars($method) ?></p>
            <p>Serás redirigido al chat en <span id="contador">5</span> segundos...</p>
            <script>
                let segundos = 5;
                let intervalo = setInterval(() => {
                    segundos--;
                    document.getElementById('contador').innerText = segundos;
                    if(segundos <= 0){
                        clearInterval(intervalo);
                        window.location.href = '/dashboard/chat.php';
                    }
                }, 1000);
            </script>
            <a href="/dashboard/chat.php" class="btn">Ir al chat ahora</a>
        <?php else: ?>
            <h1 class="warning">⚠️ Pago no aprobado</h1>
            <p>Estado actual: <b><?= htmlspecialchars($status) ?></b></p>
            <a href="/dashboard/" class="btn">Volver al inicio</a>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
