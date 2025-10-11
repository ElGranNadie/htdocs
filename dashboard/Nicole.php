<?php 
/**
 * @file index.php
 * @brief Página principal del dashboard N.I.C.O.L.E.
 *
 * Este archivo actúa como la entrada principal al dashboard del sistema.
 * Se estructura en módulos reutilizables (header, footer, scripts, etc.) 
 * para facilitar el mantenimiento y escalabilidad del proyecto.
 *
 * @details
 * - Carga variables globales desde `varset.php`.
 * - Incluye los metadatos y estilos comunes del dashboard.
 * - Divide el contenido principal en secciones narrativas:
 *   - ¿Qué hace NICOLE?
 *   - Cómo funciona
 *   - A futuro
 *
 * @section autores
 * - Equipo de desarrollo N.I.C.O.L.E
 */
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Nicole | N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
</head>
<body>
<div>
  <?php require 'header.php';?> 
  <main> <!-- Contenido principal de la página --> 
    <div class="row justify-content-left rowdecontenedores" style="margin-top:1rem; margin-left: 0px; margin-right: 0px; max-height: 75vh;">
      <div class="col-md-6 col-12" style="max-height: 75vh; padding-bottom: 1rem;">
        <section class="category-content container contenedordeseccion" style="min-width: 100vh;"> <!-- Sección de contenido principal -->
        <span class="alpha contenedordesecciontexto">¿Qué Hace NICOLE?</span>
          <div class="contenedordesecciontexto fw-normal">
            Hasta el momento, nuestra primera creacion, N.I.C.O.l.E. Funciona como una plataforma que guia 
            a las personas en su dieta, encontrando recetas sanas y locales, puede enseñarte sobre los 
            ingredientes que la componen y lo saludable que pueden llegar a ser</div>
          <div class="contenedordesecciontexto fw-normal"></div>
        </section>
      </div>
      <div class="col-md-6 col-12" style="max-height: 75vh; padding-bottom: 1rem;">
        <section class="category-content container contenedordeseccion"> <!-- Sección de contenido principal -->
        <span class="alpha contenedordesecciontexto">Como funciona</span>
          <div class="contenedordesecciontexto fw-normal">
            Al iniciar sesion en nuestra pagina despues de tener una cuenta registrada, se te permitira el 
            acceso a nuestra Inteligencia artificial cuya funcion es ayudarte a balancear tu dieta para 
            mantener un balance entre la cantidad de vitaminas y proteinas que debes consumir al dia.</div>
          <div class="contenedordesecciontexto fw-normal">
            Tendremos en cuenta tus alergias y rutinas, asi como tomaremos en cuenta verduras, carnes, 
            vegetales y todo lo que sea necesario para compensar las perdidas en tu dia a dia</div>
          <div class="contenedordesecciontexto fw-normal"></div>
        </section>
      </div>
      <div class="col-md-6 col-12" style="max-height: 75vh; padding-bottom: 1rem;">
        <section class="category-content container contenedordeseccion"> <!-- Sección de contenido principal -->
        <span class="alpha contenedordesecciontexto">A futuro</span>
          <div class="contenedordesecciontexto fw-normal">
            Como nos planteamos inicialmente, podremos conseguirte los mejores precios y lugares para 
            conseguir los alimentos e ingredientes que necesites, desde centros comerciales como 
            mercados moviles para conseguir la mejor economia</div>
          <div class="contenedordesecciontexto fw-normal"></div>
        </section>
      </div>
    </div>
  </main>
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</div>
</body>
</html>
