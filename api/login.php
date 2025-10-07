<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

require_once "db_config.php";

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');

if (!$email || !$password) {
    echo json_encode(["success" => false, "message" => "Faltan datos"]);
    exit;
}

// Buscar usuario por correo
$stmt = $conn->prepare("SELECT id, nombre_us, correo, pass, usuario, verificado, es_premium FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {

    // ⚠️ Primero: verificar si el usuario ha confirmado su correo
    if ($user['verificado'] == 0) {
        echo json_encode([
            "success" => false,
            "message" => "Tu cuenta aún no ha sido verificada. Revisa tu correo e ingresa el código de verificación."
        ]);
        exit;
    }

    // ✅ Verificar contraseña (bcrypt)
    if (password_verify($password, $user['pass'])) {
        echo json_encode([
            "success" => true,
            "message" => "Inicio de sesión exitoso",
            "user" => [
                "id" => $user['id'],
                "nombre" => $user['nombre_us'],
                "correo" => $user['correo'],
                "usuario" => $user['usuario'],
                "es_premium" => $user['es_premium']
            ]
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Contraseña incorrecta"]);
    }

} else {
    echo json_encode(["success" => false, "message" => "Correo no encontrado"]);
}
?>
