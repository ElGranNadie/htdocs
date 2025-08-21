<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>¿Qué Hacemos? | N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
<div>
  <?php require 'header.php';?> 
  <main> <!-- Contenido principal de la página --> 
    <div class="row justify-content-evenly rowdecontenedores" style="margin-top:1rem; margin-left: 0px; margin-right: 0px; max-height: 75vh;">
      <div class="col-11" style="max-height: 75vh;">
        <section class="category-content container contenedordeseccion"> <!-- Sección de contenido principal -->
        <span class="alpha contenedordesecciontexto">¿Qué Hacemos como compañia?</span>
          <div class="contenedordesecciontexto fw-normal">Creamos soluciones digitales para la cocina y más allá. Nuestro objetivo es facilitar la vida de las personas a través de la tecnología, brindando herramientas inteligentes, intuitivas y eficientes para el día a día.</div>
        </section>
      </div>
    </div>
  </main>
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</div>
</body>
</html>
