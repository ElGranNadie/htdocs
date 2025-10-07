<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método no soportado."]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'] ?? null;
$peso = $data['peso'] ?? null;
$altura = $data['altura'] ?? null;
$sabores = $data['sabores_preferidos'] ?? null;
$alergias = $data['alergias'] ?? null;

if (empty($user_id)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "ID de usuario es obligatorio."]);
    exit();
}

$conn = getDbConnection();
$sql = "UPDATE preferencias_culinarias SET fecha_actualizacion = NOW()";
$types = '';
$params = [];

if ($peso !== null) { $sql .= ", peso = ?"; $types .= 'd'; $params[] = $peso; }
if ($altura !== null) { $sql .= ", altura = ?"; $types .= 'd'; $params[] = $altura; }
if ($sabores !== null) { $sql .= ", sabores_preferidos = ?"; $types .= 's'; $params[] = $sabores; }
if ($alergias !== null) { $sql .= ", alergias = ?"; $types .= 's'; $params[] = $alergias; }

$sql .= " WHERE usuario_id = ?";
$types .= 'i';
$params[] = $user_id;

$sql = str_replace("SET ,", "SET", $sql);

if (count($params) > 1) {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["success" => true, "message" => "Preferencias actualizadas con éxito."]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Error al actualizar las preferencias.", "error" => $conn->error]);
    }
    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "No se proporcionaron datos para actualizar."]);
}

$conn->close();
?>
