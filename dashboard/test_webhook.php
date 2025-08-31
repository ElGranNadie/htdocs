<?php
// Simular un webhook de MercadoPago
$url = "https://nicole.sytes.net/dashboard/webhook.php"; // ✅ tu dominio real

// Ejemplo de payload que envía MercadoPago
$data = [
    "type" => "payment",
    "data" => [
        "id" => rand(100000000, 999999999) // un ID de pago ficticio
    ]
];

$options = [
    "http" => [
        "header"  => "Content-Type: application/json\r\n",
        "method"  => "POST",
        "content" => json_encode($data),
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "❌ Error al enviar el webhook";
} else {
    echo "✅ Webhook enviado correctamente. Respuesta del servidor:\n\n";
    echo $result;
}
?>
