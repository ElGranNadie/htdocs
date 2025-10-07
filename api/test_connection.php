<?php
header('Content-Type: application/json');


// Carga tu configuración
require_once "db_config.php";

// Prueba de conexión
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "❌ Error de conexión: " . $conn->connect_error]);
    exit;
}

// Prueba de consulta a la base de datos
$result = $conn->query("SELECT id, username, email FROM usuarios_app LIMIT 5");

if (!$result) {
    echo json_encode(["success" => false, "message" => "⚠️ Error en consulta: " . $conn->error]);
    exit;
}

// Si todo va bien
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode([
    "success" => true,
    "message" => "✅ Conexión y consulta exitosas",
    "data" => $rows
]);
?>
