<?php
/**
 * @file pago.php
 * @brief Genera una preferencia de pago en MercadoPago para adquirir NICOLE Premium.
 *
 * Este script crea una **preferencia de pago** utilizando el SDK oficial de MercadoPago.
 * El flujo está diseñado para usuarios autenticados dentro del panel (`/dashboard`).
 * 
 * Una vez creada la preferencia, el usuario es redirigido automáticamente al **checkout**
 * de MercadoPago para completar la transacción.  
 *
 * @details
 * Flujo completo del proceso:
 * 1. Verifica si el usuario tiene sesión activa (`$_SESSION['user_id']`).
 * 2. Carga el SDK de MercadoPago y crea una preferencia de pago con los datos del producto.
 * 3. Define las URL de retorno (`success`, `failure`, `pending`).
 * 4. Envía notificaciones automáticas (webhook) a `dashboard/webhook.php`.
 * 5. Redirige al usuario al enlace seguro del checkout (`$preference->init_point`).
 * 
 * @note
 * - Si la sesión no existe, se redirige al formulario de inicio de sesión (`/dashboard/login.php`).
 * - En caso de error al generar la preferencia, se envía al usuario a `/dashboard/error_pago.php`.
 *
 * @dependencies
 * - `dashboard/mercadopago.php`: Configura el SDK con las credenciales del vendedor.
 * - `webhook.php`: Recibe las notificaciones automáticas de MercadoPago tras el pago.
 * - Extensión `session`: usada para obtener el ID del usuario autenticado.
 *
 * @see webhook.php para el procesamiento posterior del pago.
 */
session_start();


/**
 * @brief Verifica la sesión activa del usuario.
 *
 * Si no existe `$_SESSION['user_id']`, se redirige al login dentro del dashboard.
 */
// Verificar si el usuario inició sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión, lo mando al login dentro de dashboard
    header("Location: /dashboard/login.php");
    exit;
}

// ==========================
// 🔹 Cargar SDK de MercadoPago
// ==========================
require __DIR__ . '/dashboard/mercadopago.php';
use MercadoPago\Client\Preference\PreferenceClient;


// Crear cliente de preferencia
$client = new PreferenceClient();

/**
 * @brief Crea una preferencia de pago en MercadoPago.
 *
 * Esta preferencia define los productos, los montos, las URL de retorno y el webhook.
 * Además, se asocia con el ID del usuario autenticado mediante `external_reference`.
 */
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
