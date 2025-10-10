<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>¿Quiénes Somos? | N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
<div>
  <?php require 'header.php';?> <!-- Incluye el encabezado de la página -->
  <main> <!-- Contenido principal de la página -->
    <div class="row justify-content-evenly rowdecontenedores">
      <div class="col-md-6 col-12" style="min-height: 75vh; padding-bottom: 1rem;">
        <section class="category-content container contenedordeseccion">
          <span class="alpha">    
            <span class="highlight">¿Quienes somos?
            </span>
          </span>
          <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="alpha">Alpha <span class="highlight">22</span></span>
            <span class="divider">|</span>
            <img src='<?php echo $logo ?>48.png' alt="Logo" style="height:36px;vertical-align:middle;">
          </div>
          <p class="text-justify contenedordesecciontexto">
            En un pequeño cuarto lleno de ideas, sueños y pantallas brillantes nació <b>Alpha 22</b>, una empresa fundada por un grupo de jóvenes visionarios apasionados por la tecnología y el poder transformador del software. Su objetivo era claro: crear <b>herramientas digitales que resolvieran problemas reales de forma simple, intuitiva y eficiente</b>.<br><br>
            Desde sus inicios, Alpha 22 se enfocó en el desarrollo de soluciones tecnológicas con propósito. No se trataba solo de escribir código, sino de construir <b>puentes digitales entre personas, empresas y oportunidades</b>. Cada línea de programación llevaba el desafío de que al uso más noble: hacer del mundo un lugar más conectado y accesible.<br><br>
            Con ese espíritu innovador nació NICOLE, la primera creación emblemática de la empresa. Más que una aplicación o una plataforma, NICOLE es el corazón de Alpha 22: un sistema inteligente, adaptable y humano que refleja todo lo que representa la empresa. El nombre "NICOLE" proviene del deseo de <b>darle rostro humano a la tecnología</b>, de hacer que lo digital se sienta cercano, confiable y siempre dispuesto a ayudar.
          </p>
        </section>
      </div>
      <div class="col-md-6 col-12">
        <div class="col-md-12 col-12" style="max-height: 75vh; padding-bottom: 1rem;">
          <section class="category-content container contenedordeseccion">
            <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3"  bis_skin_checked="1">
              <span class="alpha">
                <span class="highlight" >¿Que es 
                </span>
                  Alpha 22 
                <span class="highlight">?
                </span>
              </span>
            </div>
            <div class="row ">
              <div class="col mb-4">
                <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3 " bis_skin_checked="1">
                  <span class="alpha"><span class="highlight"> Misión </span>
                </div>
                <p class="fw-normal contenedordesecciontexto">
                  Crear conocimiento para que las personas
                  tengan una vida mejor a través de
                  herramientas digitales.
                </p>
              </div>
              <div class="col mb-4">
                <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3" bis_skin_checked="1">
                  <span class="alpha"><span class="highlight"> Vision </span>
                </div>
                <p class="fw-normal contenedordesecciontexto">
                  Ser aquellos que permitan a la sociedad 
                  llegar a un mejor mañana, siendo reconocidos 
                  por la excelencia en calidad, innovación y 
                  sostenibilidad a nivel mundial.
                </p>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-12" style="max-height: 75vh;">
          <section class="category-content container contenedordeseccion">
            <div class="brand-row d-flex align-items-center justify-content-center gap-3 mb-3"  bis_skin_checked="1">
              <span class="alpha"> Miembros del equipo </span>
            </div>
            <div class="row justify-content-center" bis_skin_checked="1">
              <p class="col-6 fw-normal contenedordesecciontexto">
              Cristian Andrés Gómez
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Daniel Chávez Pejendino
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              David Mateo Vega Perdomo
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Jhon Daved Taborda
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Jorge Enrique Romero
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              José Daniel Vanegas Molina
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Juan Esteban Villegas Vélez
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Juan José Victoria
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Manuel stiven cespedes
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Mario Alejandro Ruiz Bedoya
              </p>
              <p class="col-6 fw-normal contenedordesecciontexto">
              Néstor Alexander Martínez Palencia
              </p>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main> <!-- Pie de página, el mismo pie de pagina de toda la vida -->
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</div>
</body>
</html>
