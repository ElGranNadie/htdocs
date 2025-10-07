<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

require_once "db_config.php";

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email'] ?? '');
$codigo = trim($data['codigo'] ?? '');

if (!$email || !$codigo) {
    echo json_encode(["success" => false, "message" => "Faltan datos"]);
    exit;
}

$stmt = $conn->prepare("SELECT id, codigo_verificacion, expiracion_codigo, verificado FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    // Ya verificado
    if ($user['verificado'] == 1) {
        echo json_encode(["success" => false, "message" => "Tu cuenta ya fue verificada"]);
        exit;
    }

    // Expirado
    if (strtotime($user['expiracion_codigo']) < time()) {
        echo json_encode(["success" => false, "message" => "El código ha expirado. Solicita uno nuevo."]);
        exit;
    }

    // Correcto
    if ($user['codigo_verificacion'] === $codigo) {
        $update = $conn->prepare("UPDATE usuarios SET verificado = 1 WHERE id = ?");
        $update->bind_param("i", $user['id']);
        $update->execute();

        echo json_encode(["success" => true, "message" => "✅ Verificación exitosa. Ya puedes iniciar sesión."]);
    } else {
        echo json_encode(["success" => false, "message" => "Código incorrecto"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Correo no encontrado"]);
}
?>
