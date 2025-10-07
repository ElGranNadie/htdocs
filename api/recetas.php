<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método no soportado."]);
    exit();
}

$conn = getDbConnection();

try {
    $result = $conn->query("SELECT idreceta, nombre_re, descripcion_re, categoria, tiempo FROM receta LIMIT 10");
    $recetas = [];
    while ($row = $result->fetch_assoc()) $recetas[] = $row;

    http_response_code(200);
    echo json_encode(["success" => true, "recetas" => $recetas]);

} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Error interno al obtener recetas.", "error" => $e->getMessage()]);
} finally {
    $conn->close();
}
?>
