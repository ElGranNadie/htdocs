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
      <div class="col-md-6 col-12" style="max-height: 75vh;">
        <section class="category-content container contenedordeseccion">
          <div style="height:1rem;"></div>
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="alpha">Alpha <span class="highlight">22</span></span> <!-- Nombre de la compañia desarrolladora -->
          </div>
          <div class="contenedordesecciontexto">Si necesitas más ayuda o más información puedes comunicarte con nosotros por los siguientes canales:</div> <!-- Descripción de la sección -->
          <div class="contenedordesecciontexto">por el cual podrás contactarnos para iniciar nuevos proyectos o preguntar sobre alguno de nuestros otros trabajos:  </div>
          <span class="alpha">Correo electronico: <span class="highlight">alpha22.desarrollo@gmail.com</span></span> <!-- Correo electrónico de contacto -->
          <div style="height:1rem;"></div>
        </section>
      </div>
      <div class="col-md-6 col-12" style="max-height: 75vh;">
        <section class="category-content container contenedordeseccion">
          <div style="height:1rem;"></div>
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
            <img src='<?php echo $logo ?>48.png' alt="Logo" style="height:36px;vertical-align:middle;">
            <span class="alpha"><span class="highlight">N.I.C.O.L.E</span> </span><!-- Nombre de la aplicacion -->
          </div>
          <div class="contenedordesecciontexto">Si necesitas más ayuda o más información puedes comunicarte con nosotros por los siguientes canales:</div> <!-- Descripción de la sección -->
          <div class="contenedordesecciontexto">resolver problemas o recibir soporte de la aplicación:  </div>
          <span class="alpha">Correo electronico: <span class="highlight">nicole.informacion.1@gmail.com</span></span> <!-- Correo electrónico de contacto -->
          <div style="height:3rem;">
            <span class="alpha">Instagram: </span>
            <a class="text-body-secondary alpha" href="https://www.instagram.com/n.i.c.o.l.e.2025" aria-label="Instagram">
              <svg class="bi" width="24" height="24" aria-hidden="true">
                  <use xlink:href="#instagram"></use>
              </svg>
              n.i.c.o.l.e.2025
            </a>
          </div>
          <div style="height:3rem;">
            <span class="alpha">Facebook: </span>
            <a class="text-body-secondary alpha" href="https://www.facebook.com/profile.php?id=61579706241974&notif_id=1755891940951528&notif_t=page_user_activity&ref=notif" aria-label="Facebook">
              <svg class="bi" width="24" height="24">
                  <use xlink:href="#facebook"></use>
              </svg>
              Nicole by Alpha 22
            </a>
          </div>
          <div style="height:1rem;"></div>
        </section>
      </div>
    </div>
  </main>
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>
