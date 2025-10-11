//const apiUrl = 'http://192.168.1.10/v1/chat/completions'; // Proxy inverso configurado en el servidor local
//const apiUrl = 'http://nicole.servehttp.com/v1/chat/completions'; // Otra opción de proxy que estuvimos probando
//const apiUrl = 'http://nicoleia.servehttp.com:90/v1/chat/completions'; // URL activa de la API (proxy inverso) puerto 90
const apiUrl = "https://nicoleia.servehttp.com/api/chat";
// Clave de autorización para acceder a la API, tipo "Bearer"
const apiKey = 'lm-studio';
// Referencias a elementos del DOM (interfaz)
const chatMessages = document.getElementById('chat-messages'); // Contenedor donde aparecen los mensajes del chat
const userMessageInput = document.getElementById('user-message'); // Campo de entrada de texto del usuario
const sendButton = document.getElementById('send-button'); // Botón para enviar mensaje
const microphoneButton = document.getElementById('microphone-button'); // Botón para grabar por voz
// --PROBANDO---
// Variables para almacenar el resumen de la conversación y el estado del chat
let resumen = "Conversación vacía hasta ahora.";

// -------------------- FUNCIÓN: Agrega un mensaje al chat --------------------

function appendMessage(content, className) {
    const messageElement = document.createElement('div'); // Crea un nuevo <div> para el mensaje
    messageElement.textContent = content; // Establece el texto del mensaje
    messageElement.className = `message ${className}`; // Aplica clases CSS para estilo
    chatMessages.appendChild(messageElement); // Inserta el nuevo mensaje en el contenedor
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto scroll hacia el final del chat
}
// -------------------- FUNCIÓN: Agrega una imagen al chat (aun no sirve bien :v)--------------------

function appendMessageImg(content, className, image) {
    const messageElementImg = document.createElement('div'); // Crea un nuevo <div> para el mensaje
    const img = document.createElement('img');
    img.src = `../../../imagenes/imgrecetas/${image}rec.jpg`;
    img.alt = 'Imagen de comida'; // Texto alternativo para la imagen
    img.className = `col-11`; // Clase CSS para la imagen (puedes definir
    messageElementImg.appendChild(img); // Establece el texto del mensaje
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
    //$_SESSION['usuario_nombre']
    const nombre_usuario = document.createElement('div');
    let nombre = document.getElementById('nav-unused').dataset.nombre;
    console.log(nombre);
    nombre_usuario.textContent = nombre
    nombre_usuario.className = 'message nombre_usuario align-self-end';
    chatMessages.appendChild(nombre_usuario);
    appendMessage(userMessage, 'user align-self-end'); // Muestra el mensaje del usuario en el chat, la idea es que se muestre con un estilo diferente
    userMessageInput.value = ''; // Limpia el campo de entrada

    // Mostrar indicador temporal mientras responde
    appendMessage("⏳ NICOLE está pensando...", "ant align-self-start");

    // OK AQUI HAY QUE ESTAR ALERTAS, porque si no se pone el modelo correcto, la API no funciona
    // Aquí se arma el objeto que se enviará a la API
    // Contiene el modelo, mensajes y parámetros de la solicitud
    // Es complicado, pero es así como funciona la API de OpenAI y similares
    // Estudienselo lo mas posible, porque es la base de todo lo que vamos a hacer
    const payload = { // Un payload ss el conjunto de datos transmitidos útiles, por eso ese nombre
        //model: "openai/gpt-oss-20b", // Modelo a utilizar en el backend
        model: "meta-llama-3.1-8b-instruct", // Modelo a utilizar en el backend
        // --PROBANDO---
        mensaje: [
            {
                "role": "system",
                "content": `Resumen de la conversación hasta ahora: ${resumen}, ahora, Responde en un tono neutro y
                 en español, tu nombre es NICOLE, una gata cocinera cuya IA esta diseñada en gran parte por ALPHA
                 22 una compañida de programacion. toma en cuenta las necesidades de nuestro usuario para realizar
                 recomendaciones viables para su alimentacion, no puedes desviarte a temas que no esten
                 relacionados con comida. Intenta, si te es solicitado, escoger entre una lista de resetas
                 predeterminada, en caso de tener que diseñar una propia, indica que no puedes procurar la seguridad
                 del usuario`
            },
            { 
                "role": "user", 
                "content": userMessage 
            }
        ],
        temperature: 0.3, // Controla la creatividad de la respuesta (0: determinista, 1: más aleatorio)
        max_tokens: 300 // Límite máximo de tokens (palabras aproximadamente) en la respuesta
    };

    // Aquí se envía la solicitud a la API que tenemos configurada de antes
    // Se puede liar si no se pone bien la URL o la clave de API
    try {
        // Envío de la solicitud a la API usando POST
        const response = await fetch(apiUrl, { // una funcion asíncrona que espera la respuesta de la API
            method: 'POST', // Método HTTP POST para enviar datos
            headers: { 
                "Content-Type": "application/json", // Indica que el cuerpo es JSON
                "Authorization": `Bearer ${apiKey}` // Token de autenticación, esto es la validacion para acceder a la API
            },
            // IMPORTANTE: usamos el formato que sí funciona con tu servidor
            body: JSON.stringify({ mensaje: userMessage, resumen: resumen })
        });

        if (!response.ok) {
            const errorText = await response.text(); // Lee el texto del error
            console.error(`Error ${response.status}: ${errorText}`); 
            throw new Error(`HTTP ${response.status}: ${errorText}`); 
        }

        // Parsear la respuesta del servidor
        const data = await response.json();
        console.log("📦 Respuesta del servidor:", data); // Para debug

        // ✅ Ajustado: tu backend devuelve { respuesta: "...", alimento: "...", resumen: "..." }
        const generatedText = data.respuesta || "❌ Sin respuesta del servidor.";
        const imagenselected = data.alimento || null;
        const nuevoResumen = data.resumen || resumen;

        // Limpia el mensaje "pensando..."
        chatMessages.removeChild(chatMessages.lastChild);

        // Muestra la respuesta en el chat
        const division = document.createElement('div');
        const imagen = "../imagenes/logo4-48.png"; // Img en variable para enviar lo que desees
        division.className = `icono-mensaje`; // Aplica clases CSS para estilo
        division.insertAdjacentHTML("beforeend", `<img src=${imagen} alt=${imagen}>`);
        chatMessages.appendChild(division);
        appendMessage(generatedText, 'ant align-self-start'); 

        // Si hay imagen asociada, mostrarla
        if (imagenselected && imagenselected !== 'null') {
            appendMessageImg(generatedText, 'imagenchat align-self-start', imagenselected);
        }

        // Actualiza el resumen de la conversación si el backend lo envía
        resumen = nuevoResumen;

    } catch (error) {
        console.error('Error enviando mensaje:', error); // Muestra error en consola
        appendMessage(`⚠️ No se pudo conectar con el servidor.`, 'ant align-self-start'); // Mensaje de error visible
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

// -------------------- RECONOCIMIENTO DE VOZ ESTA MADRE NO FUNCIONA ... AUN --------------------

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
        appendMessage('Error en reconocimiento de voz. Intenta de nuevo.', 'ant align-self-start');
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
    appendMessage('Tu navegador no soporta reconocimiento de voz.', 'ant align-self-start');
    microphoneButton.disabled = true;
}
