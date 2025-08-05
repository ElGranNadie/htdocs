<?php
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuración de la vista -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Importa Bootstrap CSS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script> <!-- Importa los iconos de Phosphor -->
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el archivo CSS -->
    <title>Chat</title> <!-- Título de la página -->
</head>
<body>
    <div class="body-container row"> 
            <div id="chat-container" class="chat-section col-12" style="background-color: burlywood;"> <!-- Contenedor del chat -->
                <div id="chat-header" class="row"> <!-- Encabezado del chat -->
                        <div class="chat-header col-12">NICOLE</div> 
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
    <script src="../login/scipts.js"></script> <!-- Enlaza el archivo JavaScript, aqui esta la magia del chat-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> <!-- Enlaza el archivo JavaScript de Bootstrap -->
</body>
</html>