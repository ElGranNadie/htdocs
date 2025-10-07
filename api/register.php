<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
require_once "db_config.php";

$data = json_decode(file_get_contents("php://input"), true);

// Campos recibidos desde Flutter
$nombre = trim($data['nombre'] ?? '');
$correo = trim($data['correo'] ?? '');
$password = trim($data['password'] ?? '');
$confirmPassword = trim($data['confirmPassword'] ?? '');

if (!$nombre || !$correo || !$password || !$confirmPassword) {
    echo json_encode(["success" => false, "message" => "Faltan datos"]);
    exit;
}

// Validar contraseñas iguales
if ($password !== $confirmPassword) {
    echo json_encode(["success" => false, "message" => "Las contraseñas no coinciden"]);
    exit;
}

// Verificar si el correo ya existe
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Este correo ya está registrado"]);
    exit;
}

// Cifrar contraseña con bcrypt
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la tabla `usuarios`
$stmt = $conn->prepare("INSERT INTO usuarios (nombre_us, correo, pass, edad, usuario, verificado, es_premium) VALUES (?, ?, ?, ?, ?, 0, 0)");
$usuario = strtolower(explode(' ', $nombre)[0]); // Ejemplo: "Nicole Torres" → "nicole"
$edad = 18; // Valor por defecto
$stmt->bind_param("sssis", $nombre, $correo, $hashed_password, $edad, $usuario);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Usuario registrado exitosamente"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al registrar usuario"]);
}
?>
