<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>N.I.C.O.L.E</title> <!-- Título de la página -->
  <link rel="stylesheet" href='<?php echo $estilosdashboard?>'>  <!-- Enlace al archivo de estilos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Enlace a Bootstrap CSS -->
</head>
<body>
  <header>
    <div class="logo-container"> <!-- Contenedor del logo y nombre de la marca -->
      <img src='<?php echo $logo ?>' alt="Logo" class="logo">
      <span class="brand">N.I.C.O.L.E</span>
    </div>
    <nav>
      <ul> <!-- Menú de navegación, los links de php se refieren al seteo de variables -->
        <li class="nav-item active" data-category="intro"><a href='<?php echo $index ?>'>Introducción</a></li>
        <li class="nav-item" data-category="about"><a href='<?php echo $quienessomos ?>'>¿Quiénes Somos?</a></li>
        <li class="nav-item" data-category="what"><a href='<?php echo $quehacemos ?>'>¿Qué Hacemos?</a></li>
        <li class="nav-item" data-category="contact"><a href='<?php echo $contactanos ?>'>Contáctanos</a></li>
        <li class="nav-item" data-category="chat"><a href='<?php echo $login?>'>iniciar sesion</a></li>
      </ul>
    </nav>
  </header>
  <main> <!-- Contenido principal de la página -->
    <section class="intro-section category-content container mt-5"> <!-- Sección de introducción -->
        <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
          <span class="alpha"><span class="highlight">Bienvenido a 
          </span> N.I.C.O.L.E</span>
          <img src='<?php echo $logo ?>' alt="Logo" style="height:36px;vertical-align:middle;">
        </div>
      <h1 class="fw-bold mb-3">una IA con la capacidad de un chef<br>profesional</h1> <!-- Título principal -->
      <div class="img-center mb-4">
        <div class="carousel d-flex align-items-center justify-content-center"> <!-- Contenedor del carrusel de imágenes -->
          <button class="carousel-btn left btn btn-outline-danger me-2 rounded-circle"><i class="bi bi-arrow-left"></i></button> <!-- Botón para ir a la imagen anterior -->
          <img src='<?php echo $imagenportada ?>' alt="Comida" class="carousel-img img-fluid rounded" style="max-width: 100%; height: auto;"> <!-- Imagenes del carrusel, la imagen que esta alli de base funciona para evitar fallos en cargas y que no se muestre nada -->
          <button class="carousel-btn right btn btn-outline-danger ms-2 rounded-circle"><i class="bi bi-arrow-right"></i></button> <!-- Botón para ir a la imagen posterior -->
        </div>
      </div>
    </section>
    <section class="intro-section category-content container mt-5">
        <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
          <span class="alpha"><span class="highlight">¿Que es 
          </span> N.I.C.O.L.E <span class="highlight">?</span></span>
          <img src='<?php echo $logo ?>' alt="Logo" style="height:36px;vertical-align:middle;">
        </div>
      <h2 class="fw-bold mb-3">NICOLE es una IA diseñada para ayudarte a cocinar de manera fácil y rápida</h2> <!-- Descripción de NICOLE -->
      <div class="row">
        <div class="col mb-4">
          <h2 class="fw-bold mb-3">
            Es un felino con el conocimiento para que las personas tengan una vida mejor a través de <br>
            herramientas digitales. <br> <br>
            Un proyecto que busca ayudar a las personas a mejorar sus hábitos alimenticios, <br>
            informando, enseñando y mostrando como es que se puede salir adelante con <br>
            una buena alimentación.
          </h2>
        </div>
        <div class="col mb-4">
          <img src='<?php echo $logo ?>' alt="Logo" style="height:256px;vertical-align:middle;">
        </div>
      </div>
    </section>
  </main> 
  <!-- Pie de página, el mismo pie de pagina de toda la vida -->
  <footer class="footer py-4" style="background: #d36b5a; border-bottom-left-radius:32px; border-bottom-right-radius:32px; margin-top:32px;">
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      <span class="d-flex align-items-center" style="font-size:1.3rem;">
        <img src='<?php echo $logo ?>' alt="Logo" style="height:32px;" class="me-2">
        <span class="brand fw-bold" style="color:#fff;">N.I.C.O.L.E</span>
        <span class="mx-3" style="color:#fff;font-size:1.5rem;">|</span>
        <span class="fw-bold" style="color:#fff;">Alpha 22</span>
      </span>
    </div> <!-- terminos y condiciones -->
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      <span class="d-flex align-items-center" style="font-size:1.3rem;"> 
        <span class="fw-bold" style="color:#000;"><a style="text-decoration: none; color:#000;" href='<?php echo $terycon?>'>terminos y condiciones</a></span> <!-- Enlace a los términos y condiciones -->
      </span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Enlace a Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.js"></script> <!-- Enlace a los iconos de Bootstrap -->
  <script>
    fetch('footer.html').then(r=>r.text()).then(html=>document.getElementById('footer-include').innerHTML=html);
  </script>
  <script src="../js/dashboardscript.js"></script>
</body>
</html>
