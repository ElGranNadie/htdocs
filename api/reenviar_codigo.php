<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

require_once "db_config.php";
require_once "../dashboard/mail.php"; // Usa tu función enviarCodigo()

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email'] ?? '');

if (!$email) {
    echo json_encode(["success" => false, "message" => "Correo faltante"]);
    exit;
}

$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    // Generar nuevo código
    $nuevoCodigo = strval(rand(100000, 999999));
    $nuevaExpiracion = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    // Actualizar en la BD
    $update = $conn->prepare("UPDATE usuarios SET codigo_verificacion = ?, expiracion_codigo = ? WHERE id = ?");
    $update->bind_param("ssi", $nuevoCodigo, $nuevaExpiracion, $user['id']);
    $update->execute();

    // Enviar correo
    if (enviarCodigo($email, $nuevoCodigo)) {
        echo json_encode(["success" => true, "message" => "Se ha enviado un nuevo código a tu correo."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al enviar el correo"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Correo no encontrado"]);
}
?>
