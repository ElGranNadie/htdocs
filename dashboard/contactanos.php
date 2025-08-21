<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Contáctanos | N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
<div>
  <?php require 'header.php';?> 
  <main> <!-- Contenido principal de la página --> 
    <div class="row justify-content-evenly rowdecontenedores" style="margin-top:1rem; margin-left: 0px; margin-right: 0px; max-height: 75vh;">
      <div class="col-11" style="max-height: 75vh;">
        <section class="category-content container contenedordeseccion">
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="alpha">Alpha <span class="highlight">22</span></span> <!-- Nombre de la compañia desarrolladora -->
            <span class="divider">|</span>
            <img src='<?php echo $logo ?>48.png' alt="Logo" style="height:36px;vertical-align:middle;">
            <span class="brand">N.I.C.O.L.E</span> <!-- Nombre de la aplicacion -->
          </div>
          <div class="contenedordesecciontexto">Si necesitas más ayuda o más información puedes comunicarte con nosotros por los siguientes canales:</div> <!-- Descripción de la sección -->
          <div class="contenedordesecciontexto">Asuntos relacionados a Nicole:  </div>
          <span class="alpha">Correo electronico: <span class="highlight">nicole.informacion.1@gmail.com</span></span> <!-- Correo electrónico de contacto -->
          <div class="contenedordesecciontexto">Asuntos relacionados a la compañia:  </div>
          <span class="alpha">Correo electronico: <span class="highlight">alpha22.desarrollo@gmail.com</span></span> <!-- Correo electrónico de contacto -->
          <div style="height:80px;"></div>
        </section>
      </div>
    </div>
  </main>
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>
