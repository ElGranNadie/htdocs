<?php
session_start();
require '../varset/varset.php';
require_once '../dashboard/conexion.php';
// ✅ Verifica si hay un correo guardado en sesión
if (!isset($_SESSION['correo_verificar'])) {
    $_SESSION['error'] = "Sesión no válida. Inicia el proceso de registro nuevamente.";
    header("Location: ../registro/registro.php");
    exit();
}
$correo = $_SESSION['correo_verificar'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';

    if (empty($codigo)) {
        $_SESSION['error'] = "Debes ingresar el código de verificación.";
        header("Location: verificar.php");
        exit();
    }

    // Consultar el código de verificación
    $stmt = $conn->prepare("SELECT codigo_verificacion, expiracion_codigo FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: verificar.php");
        exit();
    }

    $usuario = $result->fetch_assoc();
    $ahora = date('Y-m-d H:i:s');

    if ($usuario['codigo_verificacion'] !== $codigo) {
        $_SESSION['error'] = "El código ingresado es incorrecto.";
        header("Location: verificar.php");
        exit();
    }

    if ($usuario['expiracion_codigo'] < $ahora) {
        $_SESSION['error'] = "El código ha expirado. Solicita uno nuevo.";
        header("Location: verificar.php");
        exit();
    }

    // ✅ Verificación exitosa
    $stmt = $conn->prepare("UPDATE usuarios SET verificado = 1, codigo_verificacion = NULL, expiracion_codigo = NULL WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    unset($_SESSION['correo_verificar']);

    $_SESSION['success'] = "¡Correo verificado correctamente! Ya puedes iniciar sesión.";
    header("Location: ../login/login.php");
    exit();
}
?>
<!-- HTML del formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar correo</title>
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
    <style>
        form {
            background-color: var();
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            max-width: 400px;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <?php include '../dashboard/header.php'; ?>
    <main>
        <div class="row justify-content-evenly rowdecontenedores">
            <section class="intro-section contenedordeseccion category-content" style="padding: 1rem;">
                <span class="alpha">
                    <span class="highlight">
                        Verificación de Correo Electrónico
                    </span>
                </span>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="message error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="message success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                <form method="POST" action="verificar.php" style="padding:1rem; margin:1rem;">
                    <input type="text" name="codigo" placeholder="Código de verificación" required>
                    <div class="nav-item">
                        <button type="submit" class="nav-link">Verificar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <?php include '../dashboard/footer.php'; ?>
    <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>




