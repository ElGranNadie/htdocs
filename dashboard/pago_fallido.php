<?php
echo '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pago fallido</title>
  <style>
    body {
      background-color: #f8f9fa;
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
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
    h1 {
      color: #e63946;
      font-size: 26px;
      margin-bottom: 15px;
    }
    p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
    }
    a {
      display: inline-block;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      border-radius: 8px;
      transition: background 0.3s ease;
    }
    a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>❌ Pago fallido</h1>
    <p>Hubo un error al procesar tu pago. Intenta de nuevo.</p>
    <a href="/dashboard/chat.php">Volver al chat</a>
  </div>
</body>
</html>';
