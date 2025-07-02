<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¿Quiénes Somos? | N.I.C.O.L.E</title> <!-- Título de la página -->
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
        <li class="nav-item active" data-category="about"><a href='<?php echo $quienessomos ?>'>¿Quiénes Somos?</a></li>
        <li class="nav-item" data-category="what"><a href='<?php echo $quehacemos ?>'>¿Qué Hacemos?</a></li>
        <li class="nav-item" data-category="contact"><a href='<?php echo $contactanos ?>'>Contáctanos</a></li>
        <li class="nav-item" data-category="chat"><a href='<?php echo $login?>'>iniciar sesion</a></li>
      </ul>
    </nav>
  </header>
  <main> <!-- Contenido principal de la página -->
    <section class="category-content container mt-5">
      <div class="subtitle mb-2">¿Quiénes somos?</div>
      <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
        <span class="alpha">Alpha <span class="highlight">22</span></span>
        <span class="divider">|</span>
        <img src='<?php echo $logo ?>' alt="Logo" style="height:36px;vertical-align:middle;">
        <span class="brand">N.I.C.O.L.E</span>
      </div>
      <div class="desc text-justify">
        En un pequeño cuarto lleno de ideas, sueños y pantallas brillantes nació <b>Alpha 22</b>, una empresa fundada por un grupo de jóvenes visionarios apasionados por la tecnología y el poder transformador del software. Su objetivo era claro: crear <b>herramientas digitales que resolvieran problemas reales de forma simple, intuitiva y eficiente</b>.<br><br>
        Desde sus inicios, Alpha 22 se enfocó en el desarrollo de soluciones tecnológicas con propósito. No se trataba solo de escribir código, sino de construir <b>puentes digitales entre personas, empresas y oportunidades</b>. Cada línea de programación llevaba el desafío de que al uso más noble: hacer del mundo un lugar más conectado y accesible.<br><br>
        Con ese espíritu innovador nació NICOLE, la primera creación emblemática de la empresa. Más que una aplicación o una plataforma, NICOLE es el corazón de Alpha 22: un sistema inteligente, adaptable y humano que refleja todo lo que representa la empresa. El nombre "NICOLE" proviene del deseo de <b>darle rostro humano a la tecnología</b>, de hacer que lo digital se sienta cercano, confiable y siempre dispuesto a ayudar.
      </div>
    </section>
    <section class="intro-section category-content container mt-5">
      <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
        <span class="alpha"><span class="highlight">¿Que es 
        </span> Alpha 22 <span class="highlight">?</span></span>
      </div>
      <div class="row">
        <div class="col mb-4">
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
            <span class="alpha"><span class="highlight"> Misión </span>
          </div>
          <h2 class="fw-bold mb-3">
            Crear conocimiento para que las personas <br>
            tengan una vida mejor a través de <br>
            herramientas digitales.
          </h2>
        </div>
        <div class="col mb-4">
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
            <span class="alpha"><span class="highlight"> Vision </span>
          </div>
          <h2 class="fw-bold mb-3">
            Ser aquellos que permitan a la sociedad <br>
            llegar a un mejor mañana, siendo reconocidos <br>
            por la excelencia en calidad, innovación y <br>
            sostenibilidad a nivel mundial.
          </h2>
        </div>
      </div>
    </section>
  </main> <!-- Pie de página, el mismo pie de pagina de toda la vida -->
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
