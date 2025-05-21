const apiUrl = 'http://nicole.servehttp.com/v1/chat/completions'; // Proxy inverso configurado
const apiKey = 'lm-studio'; // Clave de autorización

const chatMessages = document.getElementById('chat-messages');
const userMessageInput = document.getElementById('user-message');
const sendButton = document.getElementById('send-button');
const microphoneButton = document.getElementById('microphone-button');

// Función para añadir mensajes al chat
function appendMessage(content, className) {
    const messageElement = document.createElement('div');
    messageElement.textContent = content;
    messageElement.className = `message ${className}`;
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Desplaza hacia el final
}

// Función para enviar mensajes
async function sendMessage() {
    const userMessage = userMessageInput.value.trim();
    if (!userMessage) {
        alert("Por favor, escribe un mensaje.");
        return;
    }

    // Añade el mensaje del usuario al chat
    appendMessage(userMessage, 'user');
    userMessageInput.value = '';

    const payload = {
        model: "meta-llama-3.1-8b-instruct",
        messages: [
            { "role": "system", "content": "Responde en un tono neutro por favor y en español" },
            { "role": "user", "content": userMessage }
        ], // Campo 'messages' requerido
        temperature: 0.7,
        max_tokens: 300 // Define cuántos tokens se generarán en la respuesta
    };

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${apiKey}`
            },
            body: JSON.stringify(payload)
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.error(`Error ${response.status}: ${errorText}`);
            throw new Error(`HTTP ${response.status}: ${errorText}`);
        }

        const data = await response.json();
        const generatedText = data.choices[0].message.content;

        // Añade la respuesta del servidor al chat
        appendMessage(generatedText, 'ant');

    } catch (error) {
        console.error('Error enviando mensaje:', error);
        appendMessage(`Error: ${error.message}`, 'ant');
    }
}

// Enviar mensaje al hacer clic en el botón
sendButton.addEventListener('click', sendMessage);

// Enviar mensaje al presionar Enter
userMessageInput.addEventListener('keypress', (event) => {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
});

// Reconocimiento de voz
if ('webkitSpeechRecognition' in window) {
    const recognition = new webkitSpeechRecognition();
    recognition.lang = 'es-ES';
    recognition.continuous = false;
    recognition.interimResults = false;

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript;

        // Elimina el punto final si existe
        const cleanedTranscript = transcript.endsWith('.') ? transcript.slice(0, -1) : transcript;

        // Concatena el nuevo texto con el existente
        const currentText = userMessageInput.value.trim();
        userMessageInput.value = currentText ? `${currentText} ${cleanedTranscript}` : cleanedTranscript;
    };

    recognition.onerror = (event) => {
        console.error('Error en reconocimiento de voz:', event.error);
        appendMessage('Error en reconocimiento de voz. Intenta de nuevo.', 'ant');
    };

    // Iniciar grabación al presionar el botón
    microphoneButton.addEventListener('mousedown', () => {
        recognition.start();
    });

    // Detener grabación al soltar el botón
    microphoneButton.addEventListener('mouseup', () => {
        recognition.stop();
    });

    // Compatibilidad con pantallas táctiles
    microphoneButton.addEventListener('touchstart', (event) => {
        event.preventDefault();
        recognition.start();
    });

    microphoneButton.addEventListener('touchend', () => {
        recognition.stop();
    });
} else {
    appendMessage('Tu navegador no soporta reconocimiento de voz.', 'ant');
    microphoneButton.disabled = true;
}