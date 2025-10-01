<?php

/**
 * @file webhook.php
 * @brief Endpoint para recibir notificaciones de MercadoPago.
 *
 * Este archivo actúa como un **webhook**: MercadoPago envía peticiones HTTP POST
 * con información de eventos (ej. pagos) a este script.
 *
 * Flujo principal:
 * 1. Recibir el JSON crudo enviado por MercadoPago.
 * 2. Decodificarlo a un arreglo PHP con `json_decode()`.
 * 3. Validar que la estructura contenga un evento válido.
 * 4. Consultar la API de MercadoPago con el ID de pago recibido.
 * 5. Guardar/actualizar la información en la base de datos.
 * 6. Responder con el código HTTP apropiado (200 = OK, 400/500 = error).
 *
 * @note Línea clave del endpoint:
 * ```php
 * $data = json_decode($input, true);
 * ```
 * Convierte el JSON recibido en un **array asociativo**, lo que permite acceder a
 * elementos como `$data["type"]` o `$data["data"]["id"]`.
 *
 * @return void Este archivo no retorna valores; responde directamente a MercadoPago.
 * 
 * @require conexion.php
 * Archivo que inicializa la conexión a la base de datos TiDB.
 *
 * Es indispensable para:
 * - Insertar registros en la tabla `pagos`.
 * - Actualizar el estado premium de los usuarios.
 *
 * @note Si la conexión falla, el webhook no podrá registrar los pagos.
 
 */

require 'conexion.php';

// ==========================
// 🔹 Recibir el contenido del webhook
// ==========================
/**
 * @var string $input
 * Contenido crudo recibido en el cuerpo del request (`php://input`).
 * 
 * Este valor es un JSON enviado por MercadoPago en cada notificación.
 * Ejemplo de contenido:
 * ```json
 * { "type": "payment", "data": { "id": 123456789 } }
 * ```
 */
$input = file_get_contents("php://input");

/**
 * @var array $data
 * Representación en arreglo asociativo del JSON recibido en `$input`.
 * 
 * Permite acceder de forma estructurada a la información:
 * - `$data["type"]` → Tipo de evento (ej. `payment`)
 * - `$data["data"]["id"]` → ID del pago generado en MercadoPago
 */
$data = json_decode($input, true);

// Guardar log para depuración
file_put_contents("webhook_log.txt", date("Y-m-d H:i:s") . " - " . $input . PHP_EOL, FILE_APPEND);

// Validar que llega info
if (!$data) {
    http_response_code(400);
    echo "❌ No se recibió JSON válido";
    exit;
}

// ==========================
// 🔹 Procesar solo eventos de pago
// ==========================
if (isset($data["type"]) && $data["type"] === "payment") {

    $payment_id = $data["data"]["id"];

    // ✅ Usar access token desde mercadopago.php si lo tienes centralizado
    $access_token = "APP_USR-2420974097835435-082501-fe73a9231de6ac5a5c13ee527e9724a9-2649569840";
    $url = "https://api.mercadopago.com/v1/payments/" . $payment_id;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $payment = json_decode($response, true);

    if (isset($payment["id"])) {
        // ==========================
        // 🔹 Extraer datos
        // ==========================
        $id_pago    = $payment["id"];
        $estado     = $payment["status"];
        $monto      = $payment["transaction_amount"] ?? 0.00;
        $metodo     = $payment["payment_type_id"] ?? "desconocido";
        $fecha      = $payment["date_created"] ?? date("Y-m-d H:i:s");
        $referencia = $payment["external_reference"] ?? null; // user_id que mandamos desde pago.php

        // ==========================
        // 🔹 Insertar en la tabla pagos (si no existe ya)
        // ==========================
        

        
        $stmt = $conn->prepare("INSERT IGNORE INTO pagos (payment_id, status, amount, method, date, reference) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdsss", $id_pago, $estado, $monto, $metodo, $fecha, $referencia);

        if ($stmt->execute()) {
            // ==========================
            // 🔹 Si el pago fue aprobado → actualizar usuario a premium
            // ==========================
            if ($estado === "approved" && $referencia) {
                $usuario_id = intval($referencia);
                
                /**
                * Inserta el pago en la base de datos si aún no existe.
                 *
                 * Se usa `INSERT IGNORE` para prevenir registros duplicados en caso de que 
                 * MercadoPago envíe la notificación varias veces (lo cual es común en webhooks).
                 *
                 * Tabla: `pagos`
                 * Campos guardados:
                 * - payment_id → ID único del pago en MercadoPago.
                 * - status     → Estado del pago (`approved`, `pending`, `rejected`).
                 * - amount     → Monto de la transacción.
                 * - method     → Método de pago (tarjeta, boleto, etc.).
                 * - date       → Fecha de creación del pago.
                 * - reference  → Identificador interno (ej. user_id).
                */
                $stmt2 = $conn->prepare("UPDATE usuarios 
                                         SET es_premium = 1, 
                                             premium_expiracion = DATE_ADD(NOW(), INTERVAL 30 DAY) 
                                         WHERE id = ?");
                $stmt2->bind_param("i", $usuario_id);
                $stmt2->execute();
                $stmt2->close();
            }

            http_response_code(200);
            echo "✅ Pago procesado correctamente";
        } else {
            http_response_code(500);
            echo "❌ Error al guardar en BD: " . $stmt->error;
        }

        $stmt->close();
    } else {
        http_response_code(500);
        echo "❌ No se pudo obtener detalles del pago";
    }

} else {
    http_response_code(200);
    echo "ℹ️ Evento ignorado";
}

$conn->close();
?>
