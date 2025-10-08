<?php
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pago Pendiente</title>
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #e6b800;
            margin-bottom: 15px;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }
        a {
            display: inline-block;
            padding: 12px 25px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>⏳ Pago pendiente</h1>
        <p>Tu pago está en proceso, espera la confirmación de MercadoPago.</p>
        <a href='/dashboard/chat.php'>Volver al chat</a>
    </div>
</body>
</html>
";
?>
