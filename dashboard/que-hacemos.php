<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¿Qué Hacemos? | N.I.C.O.L.E</title> <!-- Título de la página -->
  <link rel="stylesheet" href='<?php echo $estilosdashboard?>'> <!-- Enlace al archivo de estilos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <li class="nav-item active" data-category="what"><a href='<?php echo $quehacemos ?>'>¿Qué Hacemos?</a></li>
        <li class="nav-item" data-category="contact"><a href='<?php echo $contactanos ?>'>Contáctanos</a></li>
        <li class="nav-item" data-category="chat"><a href='<?php echo $login?>'>iniciar sesion</a></li>
      </ul>
    </nav>
  </header>
  <main> <!-- Contenido principal de la página -->
    <section class="category-content container mt-5"> <!-- Sección de contenido principal -->
      <h2 class="mb-3">¿Qué Hacemos?</h2> <!-- Título de bienvenida -->
      <div class="desc">Creamos soluciones digitales para la cocina y más allá. Nuestro objetivo es facilitar la vida de las personas a través de la tecnología, brindando herramientas inteligentes, intuitivas y eficientes para el día a día.</div>
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
        <span class="fw-bold" style="color:#000;"><a style="text-decoration: none; color:#000;" href='<?php echo $terycon?>'>terminos y condiciones</a></span>
      </span>
    </div>
  </footer>
</body>
</html>
