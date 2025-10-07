<?php
session_start();

// Verificar si el usuario inició sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión, lo mando al login dentro de dashboard
    header("Location: /dashboard/login.php");
    exit;
}

require __DIR__ . '/dashboard/mercadopago.php';
use MercadoPago\Client\Preference\PreferenceClient;

$client = new PreferenceClient();

// Crear preferencia de pago
$preference = $client->create([
    "items" => [
        [
            "title" => "Nicole Premium",
            "quantity" => 1,
            "currency_id" => "COP",
            "unit_price" => 10000.00
        ]
    ],
    "back_urls" => [
        "success" => "https://nicole.sytes.net/dashboard/pago_exitoso.php",
        "failure" => "https://nicole.sytes.net/dashboard/pago_fallido.php",
        "pending" => "https://nicole.sytes.net/dashboard/pago_pendiente.php"
    ],
    "auto_return" => "approved",
    "notification_url" => "https://nicole.sytes.net/dashboard/webhook.php",

    // 🔹 Aquí pasamos el ID del usuario logueado
    "external_reference" => (string)$_SESSION['user_id']
]);

// Redirigir automáticamente al checkout de MercadoPago
if (isset($preference->init_point)) {
    header("Location: " . $preference->init_point);
    exit;
} else {
    // Si algo falla, enviamos al usuario a una página de error en dashboard
    header("Location: /dashboard/error_pago.php");
    exit;
}