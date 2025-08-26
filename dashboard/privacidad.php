<?php
    require '../varset/varset.php';
?>
<!DOCTYPE html><!-- Declaración del tipo de documento HTML5 -->
<head>
    <title>Términos y Condiciones - Experiencias Culinarias</title><!-- Título que aparece en la pestaña del navegador -->
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>

<body>
    <?php require '../dashboard/header.php'; ?> <!-- Incluye el encabezado de la página -->
    <div class="container mt-5 mb-5"><!-- Contenedor principal con márgenes arriba y abajo -->
        <div class="terminos"><!-- Sección principal de los términos -->
            <div class="row justify-content-center"><!-- Centrado del contenido con Bootstrap -->
                <div class="col-md-8 text-center mb-4"><!-- Columna centrada con título e imagen -->

                <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64"><!-- Logo o ícono representativo -->
                    <h1 class="mb-4">Privacidad de datos</h1><!-- Título principal de la sección -->
                </div>
                <div class="col-md-10"><!-- Columna con el contenido de los términos -->
                    <!-- Sección 1 -->
                    <p>
                        Datos Sensibles y Autorización de Usuarios: NICOLE recopilará datos de alimentación y nutrición, considerados datos sensibles según la Ley 1581 de 2012. Se pedirá consentimiento explícito y bien informado antes de recolectar esta información, permitiendo a los usuarios actualizar o eliminar sus datos en cualquier momento.
                    </p>
                    <p>
                        Confidencialidad y Seguridad de Datos: Los datos de alimentación serán tratados con estricta confidencialidad. Se implementarán sistemas de autenticación y encriptación para proteger la información de los usuarios, evitando accesos no autorizados y garantizando la seguridad.
                    </p>
                </div> <!-- Fin col-md-10 -->
            </div> <!-- Fin row -->
        </div> <!-- Fin terminos -->
    </div> <!-- Fin container -->
    <?php require 'footer.php'; ?> <!-- Incluye el pie de página -->
    <?php require 'scripts.php'; ?> <!-- Enlace a los scripts necesarios -->
</body>
</html>
