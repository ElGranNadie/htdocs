<?php
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el archivo CSS -->
    <title>Chat</title>
</head>
<body>
    <div class="body-container">
        <div class="">

            <div id="chat-container" class="chat-section" style="background-color: burlywood;">
                <div id="chat-header">
                        <div class="chat-header">NICOLE</div>
                </div>
                <div id="chat-messages" class="chat-messages"></div>
                <div id="message-input input-container" class="chat-input">
                    <textarea id="user-message" rows="1" placeholder="Escribe tu mensaje..."></textarea>
                    <button id="microphone-button" class="mic-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
                        <!--i class="ph ph-microphone"></i-->
                    </button>
                    <button id="send-button" class="send-btn">
                        <!--i class="ph ph-arrow-right"></i-->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polyline points="22 2 15 22 11 13 2 13"></polyline></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script> <!-- Enlaza el archivo JavaScript -->
</body>
</html>