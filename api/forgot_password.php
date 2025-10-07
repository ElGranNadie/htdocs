<?php
require_once 'db_config.php';

$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'] ?? '';
$email = $data['email'] ?? '';

$conn = getDbConnection();

function respond($status, $message, $conn) {
    http_response_code($status);
    echo json_encode(['success' => $status < 400, 'message' => $message]);
    $conn->close();
    exit();
}

if (empty($action) || empty($email)) respond(400, "Parámetros incompletos.", $conn);

if ($action === 'request_code') {
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) respond(404, "El correo no está registrado.", $conn);
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
    $stmt->close();

    $code = rand(100000, 999999);
    $expiration = date('Y-m-d H:i:s', strtotime('+15 minutes'));
    $conn->query("DELETE FROM recuperacion_codigos WHERE usuario_id = $user_id");

    $stmt = $conn->prepare("INSERT INTO recuperacion_codigos (usuario_id, codigo, expiracion) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $code, $expiration);
    if ($stmt->execute()) respond(200, "Código enviado al correo.", $conn);
    else respond(500, "Error al generar el código.", $conn);

} elseif ($action === 'verify_code') {
    $code = $data['code'] ?? '';
    if (empty($code)) respond(400, "Falta el código de verificación.", $conn);

    $stmt = $conn->prepare("
        SELECT rc.id 
        FROM recuperacion_codigos rc
        JOIN usuarios u ON rc.usuario_id = u.id
        WHERE u.correo = ? AND rc.codigo = ? AND rc.expiracion > NOW()
    ");
    $stmt->bind_param("si", $email, $code);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) respond(200, "Código verificado.", $conn);
    else respond(401, "Código inválido o expirado.", $conn);

} elseif ($action === 'reset_password') {
    $code = $data['code'] ?? '';
    $new_password = $data['new_password'] ?? '';
    if (empty($code) || empty($new_password)) respond(400, "Faltan datos de contraseña o código.", $conn);

    $stmt = $conn->prepare("
        SELECT u.id 
        FROM recuperacion_codigos rc
        JOIN usuarios u ON rc.usuario_id = u.id
        WHERE u.correo = ? AND rc.codigo = ? AND rc.expiracion > NOW()
    ");
    $stmt->bind_param("si", $email, $code);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) respond(401, "Verificación de código fallida. Intenta de nuevo.", $conn);

    $user = $result->fetch_assoc();
    $user_id = $user['id'];
    $stmt->close();

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET pass = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $user_id);

    if ($stmt->execute()) {
        $conn->query("DELETE FROM recuperacion_codigos WHERE usuario_id = $user_id");
        respond(200, "Contraseña restablecida con éxito.", $conn);
    } else respond(500, "Error al actualizar la contraseña.", $conn);

} else {
    respond(400, "Acción de API no reconocida.", $conn);
}
?>
