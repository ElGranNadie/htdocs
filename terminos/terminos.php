<?php
    require '../varset/varset.php';
?>
<!DOCTYPE html><!-- Declaración del tipo de documento HTML5 -->
<html lang="es"><!-- Establece el idioma del documento como español -->
<head>
    <meta charset="UTF-8"><!-- Definición de codificación de caracteres para compatibilidad con caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Habilita el diseño responsivo en dispositivos móviles -->
    <title>Términos y Condiciones - Experiencias Culinarias</title><!-- Título que aparece en la pestaña del navegador -->
    <link href="/estilos/base.css" rel="stylesheet"><!-- Enlace al archivo de estilos -->

    <!-- Inclusión de la librería Bootstrap para estilos y diseño responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5"><!-- Contenedor principal con márgenes arriba y abajo -->
        <div class="terminos"><!-- Sección principal de los términos -->
            <div class="row justify-content-center"><!-- Centrado del contenido con Bootstrap -->
                <div class="col-md-8 text-center mb-4"><!-- Columna centrada con título e imagen -->

                <img src='<?php echo $logo ?>' alt="Icono" class="mb-4" width="100"><!-- Logo o ícono representativo -->
                    <h1 class="mb-4">Términos y Condiciones</h1><!-- Título principal de la sección -->
                </div>
                <div class="col-md-10"><!-- Columna con el contenido de los términos -->

                    <!-- Sección 1 -->
                    <h2>1. Aceptación de los Términos</h2>
                    <p>
                        Al acceder y utilizar esta plataforma de experiencias culinarias, usted acepta estar sujeto a estos términos 
                        y condiciones de uso. Si no está de acuerdo con alguno de estos términos, le recomendamos que no utilice nuestros servicios.
                    </p>

                    <!-- Sección 2 -->
                    <h2>2. Uso del Servicio</h2>
                    <p>Nuestro servicio está diseñado para compartir y descubrir experiencias culinarias. Usted se compromete a:</p>
                    <ul>
                        <li>Proporcionar información precisa y verdadera</li>
                        <li>Mantener la confidencialidad de su cuenta</li>
                        <li>No usar el servicio para fines ilegales o no autorizados</li>
                        <li>No interferir con el funcionamiento del servicio</li>
                    </ul>

                    <!-- Sección 3 -->
                    <h2>3. Contenido del Usuario</h2>
                    <p>
                        Al compartir contenido en nuestra plataforma, usted mantiene sus derechos de propiedad intelectual, 
                        pero nos otorga una licencia para usar, modificar, mostrar y distribuir dicho contenido en nuestra plataforma.
                    </p>

                    <!-- Sección 4 -->
                    <h2>4. Privacidad</h2>
                    <p>
                        Su privacidad es importante para nosotros. Recopilamos y procesamos su información personal de acuerdo con nuestra Política de Privacidad.
                    </p>

                    <!-- Sección 5 -->
                    <h2>5. Modificaciones del Servicio</h2>
                    <p>
                        Nos reservamos el derecho de modificar o discontinuar el servicio en cualquier momento, con o sin previo aviso.
                    </p>

                    <!-- Sección 6 -->
                    <h2>6. Limitación de Responsabilidad</h2>
                    <p>
                        No nos hacemos responsables por daños directos, indirectos, incidentales o consecuentes que resulten del uso o la imposibilidad de usar nuestros servicios.
                    </p>

                    <!-- Sección 7 -->
                    <h2>7. Ley Aplicable</h2>
                    <p>
                        Estos términos se regirán e interpretarán de acuerdo con las leyes locales aplicables.
                    </p>

                    <!-- Sección 8 -->
                    <h2>8. Contacto</h2>
                    <p>
                        Si tiene alguna pregunta sobre estos términos, puede contactarnos a través de nuestros canales oficiales de comunicación.
                    </p>

                </div> <!-- Fin col-md-10 -->
            </div> <!-- Fin row -->
        </div> <!-- Fin terminos -->
    </div> <!-- Fin container -->

</body>
</html>
