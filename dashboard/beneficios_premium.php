<?php
require '../varset/varset.php'; // rutas y variables globales
// beneficios_premium.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Beneficios Nicole Premium</title>
    <?php require 'other.php'; ?>
    <?php require 'stylesheet.php'; ?>
</head>
<body>
<?php require 'header.php'; ?>
    <div class="row justify-content-evenly rowdecontenedores">
        <div class="col-md-6 col-12" style="min-height: 60vh; padding-bottom: 1rem;">
            <section class="category-content container contenedordeseccion">
                <span class="alpha">    
                    <span class="highlight">Nicole Normal
                    </span>
                </span>    
                <ul class="text-justify contenedordesecciontexto">
                    <li>Acceso básico a funciones</li>
                    <li>Uso limitado del chat</li>
                    <li>Publicidad dentro de la plataforma</li>
                    <li>Sin beneficios exclusivos</li>
                </ul>
                <p><strong>Precio:</strong> Gratis</p>
            </section>
        </div>
        <div class="col-md-6 col-12">
            <div class="col-md-12 col-12" style="max-height: 60vh; padding-bottom: 1rem;">
            <section class="category-content container contenedordeseccion">
                <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3"  bis_skin_checked="1">
                <span class="alpha">
                    <span class="highlight" >Nicole Premium
                    </span>
                </span>
                </div>
                <ul class="text-justify contenedordesecciontexto">
                    <li>Acceso ilimitado a todas las funciones</li>
                    <li>Soporte prioritario 24/7</li>
                    <li>Experiencia sin anuncios</li>
                    <li>Contenido y beneficios exclusivos</li>
                    <li>Actualizaciones anticipadas</li>
                </ul>
                <p><strong>Precio:</strong> $10.000 / mes</p>
                <div class="nav-item" style="margin-bottom: 1rem;">
                    <a href="../pago.php" class="nav-link">✨¡Hazte Premium!</a>
                </div>
            </section>
            </div>
        </div>
        <div class="col-md-3 nav-item" style="margin-bottom: 1rem;">
            <section class="category-content container contenedordeseccion">
                <a href="chat.php" class="boton nav-link">⬅ Volver al Chat</a>
            <section class="category-content container contenedordeseccion">
        </div>
    </div>
    <!-- Botón para volver al chat -->
    <?php require 'footer.php'; ?>
    <?php require 'scripts.php'; ?>
</body>
</html>
