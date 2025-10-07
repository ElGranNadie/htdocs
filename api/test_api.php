<?php
header("Content-Type: application/json; charset=utf-8");

// Incluir tu configuración
require_once "db_config.php";

// (Opcional) incluir tu función de correo
require_once "../dashboard/mail.php";

$response = [];

try {
    // Verificar conexión a la base de datos
    if ($conn->connect_error) {
        throw new Exception("❌ Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Probar una consulta básica
    $result = $conn->query("SELECT id, nombre_us, correo, verificado FROM usuarios LIMIT 3");

    if ($result && $result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $response["db_status"] = "✅ Conexión a TiDB exitosa";
        $response["sample_data"] = $users;
    } else {
        $response["db_status"] = "⚠️ Conectado, pero no se encontraron usuarios en la tabla";
    }

    // (Opcional) prueba de correo
    $testEmail = "keithvictoria227@gmail.com"; // cámbialo a tu correo personal
    $testCode = rand(100000, 999999);
    if (function_exists('enviarCodigo')) {
        $enviado = enviarCodigo($testEmail, $testCode);
        $response["mail_status"] = $enviado ? "✅ Correo enviado correctamente" : "❌ Error al enviar el correo";
    } else {
        $response["mail_status"] = "⚠️ mail.php no cargado o función no encontrada";
    }

} catch (Exception $e) {
    $response["error"] = $e->getMessage();
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
