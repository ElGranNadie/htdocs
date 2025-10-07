<?php
header("Content-Type: application/json; charset=utf-8");
require_once "db_config.php";

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');

if (!$email || !$password) {
    echo json_encode(["success"=>false,"error"=>"Faltan datos (email/password)"]); exit;
}

$stmt = $conn->prepare("SELECT id, correo, pass, verificado FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();

if (!$row = $res->fetch_assoc()) {
    echo json_encode(["success"=>false,"message"=>"Correo no encontrado"]);
    exit;
}

$stored = $row['pass'];
$is_bcrypt = (strpos($stored, '$2y$') === 0 || strpos($stored, '$2b$') === 0);
$is_sha256 = preg_match('/^[0-9a-f]{64}$/i', $stored);
$is_md5    = preg_match('/^[0-9a-f]{32}$/i', $stored);

$bcrypt_ok = password_verify($password, $stored);
$sha256_ok = (hash('sha256', $password) === $stored);
$md5_ok    = (md5($password) === $stored);
$plain_ok  = ($password === $stored);

echo json_encode([
  "success" => true,
  "stored_preview" => substr($stored,0,40),
  "format" => [
    "bcrypt" => $is_bcrypt ? true : false,
    "sha256" => (bool)$is_sha256,
    "md5" => (bool)$is_md5,
    "plain" => (!$is_bcrypt && !$is_sha256 && !$is_md5) ? true : false
  ],
  "verificado" => $row['verificado'],
  "checks" => [
    "bcrypt_verify" => $bcrypt_ok,
    "sha256_match" => $sha256_ok,
    "md5_match" => $md5_ok,
    "plain_match" => $plain_ok
  ]
], JSON_PRETTY_PRINT);
?>
