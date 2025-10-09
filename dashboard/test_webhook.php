<?php
/**
 * @file simular_webhook.php
 * @brief Script para simular un webhook de Mercado Pago en entorno local o de pruebas.
 * 
 * Este archivo permite enviar manualmente una notificación POST a la URL del webhook 
 * configurado en el servidor (por ejemplo, `dashboard/webhook.php`), 
 * imitando la estructura real de un evento enviado por Mercado Pago.
 * 
 * Es útil para probar que tu endpoint de webhook recibe y procesa correctamente 
 * las notificaciones de pago (por ejemplo, cuando un usuario realiza una compra).
 * 
 * @details 
 * - Envía una solicitud POST con formato JSON.
 * - El cuerpo incluye un tipo (`type`) y un objeto `data` con un `id` simulado de pago.
 * - Utiliza `file_get_contents` y un contexto HTTP para realizar la solicitud.
 * - Imprime la respuesta devuelta por el servidor webhook.
 * 
 * @note Este script no requiere autenticación ni conexión directa con la API de Mercado Pago. 
 * Es solo para pruebas internas del endpoint receptor.
 *  
 */
// Simular un webhook de MercadoPago
$url = "https://nicole.sytes.net/dashboard/webhook.php"; // ✅ tu dominio real

/**
 * @var array $data
 * Simula la estructura JSON enviada por Mercado Pago.
 * Incluye un tipo de evento ("payment") y un ID de pago aleatorio.
 */
$data = [
    "type" => "payment",
    "data" => [
        "id" => rand(100000000, 999999999) // un ID de pago ficticio
    ]
];

/**
 * @var array $options
 * Configura los encabezados y el cuerpo de la solicitud HTTP.
 * Se define como JSON y se envía mediante método POST.
 */
$options = [
    "http" => [
        "header"  => "Content-Type: application/json\r\n",
        "method"  => "POST",
        "content" => json_encode($data),
    ],
];

/**
 * @var resource $context
 * Contexto de la solicitud HTTP (creado a partir de $options).
 */
$context  = stream_context_create($options);

/**
 * @var string|false $result
 * Resultado devuelto por el webhook receptor (puede ser texto o JSON).
 * Si falla la conexión, devuelve `false`.
 */
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "❌ Error al enviar el webhook";
} else {
    echo "✅ Webhook enviado correctamente. Respuesta del servidor:\n\n";
    echo $result;
}
?>
