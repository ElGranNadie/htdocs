<?php
// beneficios_premium.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Beneficios Nicole Premium</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 30px;
            background: #f9c5d1;
        }
        .contenedor {
            max-width: 1000px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        .plan {
            background: white;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
            padding: 25px;
            text-align: center;
            transition: 0.3s;
        }
        .plan:hover {
            transform: scale(1.05);
        }
        .plan h2 {
            margin-bottom: 15px;
            font-size: 22px;
        }
        .plan ul {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-bottom: 20px;
        }
        .plan ul li {
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }
        .plan ul li::before {
            content: "✔";
            color: #f9c5d1;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        .boton {
            display: inline-block;
            padding: 12px 25px;
            background: #f9c5d1;
            color: white;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            margin: 5px;
        }
        .boton:hover {
            background: #ff99b8;
        }
        .premium {
            border: 2px solid #ff00aa;
        }
        .premium h2 {
            color: #ff00aa;
        }
        .acciones {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <h1>Comparación de Planes Nicole</h1>
    <p>Elige el plan que mejor se adapte a ti</p>
</header>

<div class="contenedor">
    <!-- Plan Normal -->
    <div class="plan">
        <h2>Nicole Normal</h2>
        <ul>
            <li>Acceso básico a funciones</li>
            <li>Uso limitado del chat</li>
            <li>Publicidad dentro de la plataforma</li>
            <li>Sin beneficios exclusivos</li>
        </ul>
        <p><strong>Precio:</strong> Gratis</p>
    </div>

    <!-- Plan Premium -->
    <div class="plan premium">
        <h2>Nicole Premium</h2>
        <ul>
            <li>Acceso ilimitado a todas las funciones</li>
            <li>Soporte prioritario 24/7</li>
            <li>Experiencia sin anuncios</li>
            <li>Contenido y beneficios exclusivos</li>
            <li>Actualizaciones anticipadas</li>
        </ul>
        <p><strong>Precio:</strong> $10.000 / mes</p>
        <a href="../pago.php" class="boton">¡Hazte Premium!</a>
    </div>
</div>

<!-- Botón para volver al chat -->
<div class="acciones">
    <a href="chat.php" class="boton">⬅ Volver al Chat</a>
</div>

</body>
</html>
