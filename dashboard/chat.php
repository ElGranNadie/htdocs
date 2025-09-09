<?php 
require '../varset/varset.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Usuario logueado
$user_id = $_SESSION['user_id'] ?? null;
$nombre_usuario = $_SESSION['usuario_nombre'] ?? "Invitado";

require 'conexion.php';
$es_premium = false;
if ($user_id) {
    $sql = "SELECT nombre_us AS nombre, es_premium, premium_expiracion 
            FROM usuarios 
            WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $nombre_usuario = $row['nombre'] ?? $nombre_usuario;
            $_SESSION['usuario_nombre'] = $nombre_usuario;

            if ($row['es_premium'] == 1 && !empty($row['premium_expiracion']) && strtotime($row['premium_expiracion']) > time()) {
                $es_premium = true;
                $_SESSION['usuario_premium'] = 1;
            } else {
                $_SESSION['usuario_premium'] = 0;
            }
        }
        $stmt->close();
    }
}

$current_page = basename(__FILE__);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Chat</title> <!-- Título de la página -->
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
    <?php require '../dashboard/header.php'; ?> <!-- Incluye el encabezado de la página -->
    <div class="body-container row" style="padding:0;margin: 0px;"> 
        <div id="chat-container" class="chat-section col-12" style="padding:0;margin: 0px;"> <!-- Contenedor del chat -->
            <div id="chat-header" class="row"> <!-- Encabezado del chat -->
                <div class="chat-header col-12">
                    <?php if ($user_id): ?>
                        <a class="nav-unused ">👤 <?php echo htmlspecialchars($nombre_usuario); ?></a>
                    <?php endif; ?></div> 
            </div>
            <div id="chat-messages" class="chat-messages row"></div> <!-- Contenedor de mensajes del chat -->
            <div id="message-input input-container" class="chat-input row"> <!-- Contenedor de entrada de mensajes -->
                <textarea id="user-message" class="col-10" rows="1" placeholder="Escribe tu mensaje..."></textarea> <!-- Área de texto para escribir mensajes -->
                <button id="microphone-button" class="mic-btn col-1"> <!-- Botón de micrófono que aun no funciona por cierto-->
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
                    <!--i class="ph ph-microphone"></i-->
                </button>
                <button id="send-button" class="send-btn col-1"> <!-- Botón de enviar mensaje -->
                    <!--i class="ph ph-arrow-right"></i-->
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polyline points="22 2 15 22 11 13 2 13"></polyline></svg>
                </button>
            </div>
        </div>
    </div>
    <?php require '../dashboard/footer.php'; ?> <!-- Incluye el pie de página -->
    <?php require '../dashboard/scripts.php'; ?> <!-- Incluye los términos y condiciones -->
</body>
</html>