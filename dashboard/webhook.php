<?php
// ==========================
// 🔹 Incluir conexión a TiDB
// ==========================
require 'conexion.php';

// ==========================
// 🔹 Recibir el contenido del webhook
// ==========================
$input = file_get_contents("php://input");
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
