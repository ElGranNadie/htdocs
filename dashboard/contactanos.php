<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contáctanos | N.I.C.O.L.E</title> <!-- Título de la página -->
  <link rel="stylesheet" href='<?php echo $estilosdashboard?>'> <!-- Enlace al archivo de estilos -->
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
        <li class="nav-item" data-category="intro"><a href='<?php echo $index ?>'>Introducción</a></li>
        <li class="nav-item" data-category="about"><a href='<?php echo $quienessomos ?>'>¿Quiénes Somos?</a></li>
        <li class="nav-item" data-category="what"><a href='<?php echo $quehacemos ?>'>¿Qué Hacemos?</a></li>
        <li class="nav-item active" data-category="contact"><a href='<?php echo $contactanos ?>'>Contáctanos</a></li>
        <li class="nav-item" data-category="chat"><a href='<?php echo $login?>'>iniciar sesion</a></li>
      </ul>
    </nav>
  </header>
  <main> <!-- Contenido principal de la página esta algo en blanco debido a que ... no tenemos contactos oficiales :V mas que un par de cosas -->
    <section class="category-content container mt-5">
      <div class="subtitle mb-2">¿Necesitas ayuda?</div> <!-- Subtítulo de la sección -->
      <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
        <span class="alpha">Alpha <span class="highlight">22</span></span> <!-- Nombre de la compañia desarrolladora -->
        <span class="divider">|</span>
        <img src='<?php echo $logo ?>' alt="Logo" style="height:36px;vertical-align:middle;">
        <span class="brand">N.I.C.O.L.E</span> <!-- Nombre de la aplicacion -->
      </div>
      <div class="desc">Si necesitas más ayuda o más información puedes comunicarte con nosotros por los siguientes canales:</div> <!-- Descripción de la sección -->
      <div class="desc">Asuntos relacionados a Nicole:  </div>
      <span class="alpha">Correo electronico: <span class="highlight">nicole.informacion.1@gmail.com</span></span> <!-- Correo electrónico de contacto -->
      <div class="desc">Asuntos relacionados a la compañia:  </div>
      <span class="alpha">Correo electronico: <span class="highlight">alpha22.desarrollo@gmail.com</span></span> <!-- Correo electrónico de contacto -->
      <div style="height:80px;"></div>
    </section>
  </main>
  <!-- Pie de página -->
  <footer class="footer py-4" style="background: #d36b5a; border-bottom-left-radius:32px; border-bottom-right-radius:32px; margin-top:32px;"> <!-- Estilos del pie de página -->
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-3"> <!-- Contenedor del pie de página -->
      <span class="d-flex align-items-center" style="font-size:1.3rem;"> 
        <img src='<?php echo $logo ?>' alt="Logo" style="height:32px;" class="me-2"> <!-- Logo de la aplicación -->
        <span class="brand fw-bold" style="color:#fff;">N.I.C.O.L.E</span> <!-- Nombre de la aplicación -->
        <span class="mx-3" style="color:#fff;font-size:1.5rem;">|</span> <!-- Separador -->
        <span class="fw-bold" style="color:#fff;">Alpha 22</span> <!-- Nombre de la compañía desarrolladora -->
      </span>
    </div> <!-- terminos y condiciones -->
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
      <span class="d-flex align-items-center" style="font-size:1.3rem;">
        <span class="fw-bold" style="color:#000;"><a style="text-decoration: none; color:#000;" href='<?php echo $terycon?>'>terminos y condiciones</a></span>
      </span>
    </div>
  </footer>
</body>
</html>
