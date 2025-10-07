<?php
require '../libs/PHPMailer/src/PHPMailer.php';
require '../libs/PHPMailer/src/SMTP.php';
require '../libs/PHPMailer/src/Exception.php';
require '../libs/fpdf/fpdf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generarYEnviarFactura($conn, $usuario_id, $amount, $method, $payment_id) {
    // 🔹 Obtener datos del usuario
    $query = $conn->prepare("SELECT nombre_us, correo FROM usuarios WHERE id = ?");
    $query->bind_param("i", $usuario_id);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();
    $query->close();

    if (!$user) {
        return "❌ No se encontró el usuario.";
    }

    $nombre = $user['nombre_us'];
    $correo = $user['correo'];
    $fecha = date("Y-m-d H:i:s");

    // 🔹 Crear el PDF con FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Factura NICOLE Premium', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1);
    $pdf->Cell(0, 10, "Correo: $correo", 0, 1);
    $pdf->Cell(0, 10, "Monto: $" . number_format($amount, 2), 0, 1);
    $pdf->Cell(0, 10, "Metodo de pago: $method", 0, 1);
    $pdf->Cell(0, 10, "ID de pago: $payment_id", 0, 1);
    $pdf->Cell(0, 10, "Fecha: $fecha", 0, 1);

    // 🔹 Guardar el PDF en la carpeta facturas
    $ruta_pdf = "../facturas/factura_$payment_id.pdf";
    $pdf->Output('F', $ruta_pdf);

    // 🔹 Enviar correo con PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nicole.informacion.1@gmail.com'; // cambia esto
        $mail->Password = 'cqlc yrzo xjka kgho'; // clave de aplicación de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nicole.informacion.1@gmail.com', 'NICOLE Premium');
        $mail->addAddress($correo, $nombre);
        $mail->Subject = 'Tu factura NICOLE Premium';
        $mail->Body = "Hola $nombre,\n\nGracias por tu compra en NICOLE Premium.\nAdjuntamos tu factura.\n\nSaludos,\nEquipo NICOLE.";
        $mail->addAttachment($ruta_pdf);

        $mail->send();

        echo "<p>📧 Factura enviada correctamente a <b>$correo</b>.</p>";
        echo "<a href='$ruta_pdf' download>⬇️ Descargar factura PDF</a>";
    } catch (Exception $e) {
        echo "❌ Error al enviar correo: {$mail->ErrorInfo}";
    }
}
?>
