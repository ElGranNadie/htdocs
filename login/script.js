//const apiUrl = 'http://192.168.1.10/v1/chat/completions'; // Proxy inverso configurado
const apiUrl = 'http://nicoleia.servehttp.com:90/v1/chat/completions'; // URL activa de la API (proxy inverso)
//const apiUrl = 'http://nicole.servehttp.com/v1/chat/completions'; // Otra opción de proxy

// Clave de autorización para acceder a la API, tipo "Bearer"
const apiKey = 'lm-studio';

// Referencias a elementos del DOM (interfaz)
const chatMessages = document.getElementById('chat-messages'); // Contenedor donde aparecen los mensajes del chat
const userMessageInput = document.getElementById('user-message'); // Campo de entrada de texto del usuario
const sendButton = document.getElementById('send-button'); // Botón para enviar mensaje
const microphoneButton = document.getElementById('microphone-button'); // Botón para grabar por voz

// -------------------- FUNCIÓN: Agrega un mensaje al chat --------------------

function appendMessage(content, className) {
    const messageElement = document.createElement('div'); // Crea un nuevo <div> para el mensaje
    messageElement.textContent = content; // Establece el texto del mensaje
    messageElement.className = `message ${className}`; // Aplica clases CSS para estilo (por ejemplo: "message user")
    chatMessages.appendChild(messageElement); // Inserta el nuevo mensaje en el contenedor
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto scroll hacia el final del chat
}
function appendMessageImg(content, className, image) {
    const messageElementImg = document.createElement('div'); // Crea un nuevo <div> para el mensaje
    messageElementImg.appendChild = document.createElement(`img src="../../../imagenes/imgcomidas${image}img.jpg"`); // Establece el texto del mensaje
    messageElementImg.className = `message ${className}`; // Aplica clases CSS para estilo (por ejemplo: "message user")
    chatMessages.appendChild(messageElementImg); // Inserta el nuevo mensaje en el contenedor
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto scroll hacia el final del chat
}

// -------------------- FUNCIÓN: Enviar mensaje --------------------

async function sendMessage() {
    const userMessage = userMessageInput.value.trim(); // Obtiene el mensaje y elimina espacios al inicio/fin
    if (!userMessage) {
        alert("Por favor, escribe un mensaje."); // Valida que haya texto
        return;
    }

    appendMessage(userMessage, 'user'); // Muestra el mensaje del usuario en el chat
    userMessageInput.value = ''; // Limpia el campo de entrada

    const payload = {
        model: "meta-llama-3.1-8b-instruct", // Modelo a utilizar en el backend
        messages: [
            { "role": "system", "content": "Responde en un tono neutro por favor y en español" },
            { "role": "user", "content": userMessage }
        ],
        temperature: 0.3, // Controla la creatividad de la respuesta (0: determinista, 1: más aleatorio)
        max_tokens: 300 // Límite máximo de tokens (palabras aproximadamente) en la respuesta
    };

    try {
        // Envío de la solicitud a la API usando POST
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json", // Indica que el cuerpo es JSON
                "Authorization": `Bearer ${apiKey}` // Token de autenticación
            },
            body: JSON.stringify(payload) // Convierte el objeto payload a JSON string
        });

        if (!response.ok) {
            // Si hubo error en la respuesta (por ejemplo, 500, 403, etc.)
            const errorText = await response.text(); // Lee el texto del error
            console.error(`Error ${response.status}: ${errorText}`);
            throw new Error(`HTTP ${response.status}: ${errorText}`); // Lanza una excepción con detalle
        }

        const data = await response.json(); // Convierte la respuesta a objeto JSON
        const generatedText = data.choices[0].message.content; // Extrae la respuesta generada (asume formato específico)
        const imagenselected = data.choices[0].message.content.alimento; // Extrae la imagen seleccionada
        appendMessage(generatedText, 'ant'); // Muestra la respuesta en el chat
        if (imagenselected) {
            appendMessageImg(generatedText, 'ant', imagenselected); // Muestra la imagen si existe
        }

    } catch (error) {
        console.error('Error enviando mensaje:', error); // Muestra error en consola
        appendMessage(`Error: ${error.message}`, 'ant'); // Informa del error al usuario en el chat
    }
}

// -------------------- EVENTOS --------------------

// Clic en botón "Enviar"
sendButton.addEventListener('click', sendMessage);

// Presionar Enter (sin Shift) también envía el mensaje
userMessageInput.addEventListener('keypress', (event) => {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault(); // Evita salto de línea
        sendMessage(); // Envía el mensaje
    }
});

// -------------------- RECONOCIMIENTO DE VOZ --------------------

// Verifica si el navegador soporta la API de reconocimiento de voz de Chrome
if ('webkitSpeechRecognition' in window) {
    const recognition = new webkitSpeechRecognition(); // Crea instancia del reconocimiento
    recognition.lang = 'es-ES'; // Idioma español
    recognition.continuous = false; // Solo una frase por vez
    recognition.interimResults = false; // No mostrar resultados parciales

    // Evento: Resultado del reconocimiento
    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript; // Texto reconocido por voz

        // Elimina el punto final si lo tiene
        const cleanedTranscript = transcript.endsWith('.') ? transcript.slice(0, -1) : transcript;

        // Agrega el texto reconocido al input del usuario, concatenando si ya había algo
        const currentText = userMessageInput.value.trim();
        userMessageInput.value = currentText ? `${currentText} ${cleanedTranscript}` : cleanedTranscript;
    };

    // Evento: Error en reconocimiento
    recognition.onerror = (event) => {
        console.error('Error en reconocimiento de voz:', event.error);
        appendMessage('Error en reconocimiento de voz. Intenta de nuevo.', 'ant');
    };

    // Grabación por ratón: iniciar al presionar
    microphoneButton.addEventListener('mousedown', () => {
        recognition.start(); // Comienza a escuchar
    });

    // Detener grabación al soltar el botón
    microphoneButton.addEventListener('mouseup', () => {
        recognition.stop(); // Deja de escuchar
    });

    // Compatibilidad con pantallas táctiles: inicio
    microphoneButton.addEventListener('touchstart', (event) => {
        event.preventDefault(); // Evita el menú contextual
        recognition.start();
    });

    // Finalización en dispositivos móviles
    microphoneButton.addEventListener('touchend', () => {
        recognition.stop();
    });
} else {
    // Si no hay soporte, muestra mensaje e inactiva el botón
    appendMessage('Tu navegador no soporta reconocimiento de voz.', 'ant');
    microphoneButton.disabled = true;
}
