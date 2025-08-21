<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
<div>
  <?php require 'header.php';?> <!-- Incluye el encabezado de la página -->
  <main> <!-- Contenido principal de la página -->
      <div class="row justify-content-evenly rowdecontenedores" style="margin-top:1rem; margin-left: 0px; margin-right: 0px; max-height: 75vh;">
          <div class="col-md-5 col-11" style="max-height: 75vh;">
            <?php require 'carrousel.php';?> <!-- Incluye el carrusel de imágenes -->  
          </div>
          <div class="col-md-5 col-11" style="max-height: 75vh;">
            <?php require 'presentacioncuadro.php';?> <!-- Incluye la presentación del cuadro -->
          </div>
      </div>
  </main> 
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</div>
</body>
</html>
