<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/credenciales.php';

/**
 * @file mail.php
 * @brief Módulo responsable del envío de correos electrónicos con códigos de verificación.
 *
 * Este archivo utiliza la librería PHPMailer para enviar correos electrónicos a los usuarios
 * con un código de verificación, utilizado generalmente para procesos de recuperación de contraseña
 * o validación de cuenta. La función principal `enviarCodigo()` recibe el correo destino y el
 * código generado, y gestiona todo el proceso de configuración y envío mediante SMTP.
 *
 * @details 
 * - Implementa autenticación segura a través del servidor SMTP de Gmail.
 * - Maneja errores mediante excepciones y registros en el log del servidor.
 * - El mensaje se envía en formato HTML e incluye el código de verificación y su tiempo de validez.
 */

/**
 * Envía un correo con un código de verificación al correo indicado
 *
 * @param string $correoDestino El correo del usuario
 * @param string $codigo El código de verificación a enviar
 * @return bool true si se envió correctamente, false si falló
 */
function enviarCodigo($correoDestino, $codigo) {
    // Crea una nueva instancia de PHPMailer con excepciones habilitadas
    $mail = new PHPMailer(true);

    try {
        /** SMTP Configuration para el envío de correos */
        $mail->isSMTP();
        
        /** Establece el servidor SMTP de Gmail */
        $mail->Host = 'smtp.gmail.com';

        /** Habilita la autenticación SMTP */
        $mail->SMTPAuth = true;
        /** Nombre de usuario para autenticarse (correo del remitente) */
        $mail->Username = EMAIL_USER;
        /** Contraseña del correo del remitente */
        $mail->Password = EMAIL_PASS;
        /** Tipo de cifrado (TLS) */
        $mail->SMTPSecure = 'tls';
        /** Puerto del servidor SMTP (587 para TLS) */
        $mail->Port = 587;

        /** Configura el juego de caracteres a UTF-8 */
        $mail->CharSet = 'UTF-8';

        /** Establece el remitente del correo */
        $mail->setFrom(EMAIL_USER, 'Verificación App');
        /** Añade el destinatario del correo */
        $mail->addAddress($correoDestino);
        /** Indica que el contenido del correo estará en formato HTML */
        $mail->isHTML(true);
        /** Asunto del correo */
        $mail->Subject = 'Código de verificación para recuperar tu contrasena';
        /** Cuerpo del correo (mensaje HTML con el código de verificación) */
        $mail->Body = "<p>Hola, tu código de verificación es: <strong>$codigo</strong></p><p>Este código expirará en 10 minutos.</p>";

        /** Intenta enviar el correo */
        $mail->send();
        // Retorna true si el correo fue enviado exitosamente
        return true;
    } catch (Exception $e) {
        // Si ocurre un error, lo registra en el log del servidor
        error_log("No se pudo enviar el correo: {$mail->ErrorInfo}");
        // Retorna false indicando que el envío falló
        return false;
    }
}

?>
