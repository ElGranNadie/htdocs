<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
/**
 * @file index.php
 * @brief Página principal (dashboard inicial) del sistema N.I.C.O.L.E.
 *
 * Este archivo representa la vista principal del sistema. Su responsabilidad es
 * estructurar la página inicial del dashboard, integrando los distintos 
 * componentes modulares a través de @c require.
 *
 * @details
 * - Utiliza variables definidas en @c ../varset/varset.php.
 * - Incluye componentes comunes reutilizables:
 *   - @c other.php → metadatos y enlaces.
 *   - @c stylesheet.php → estilos globales del dashboard.
 *   - @c header.php → cabecera común a todas las páginas.
 *   - @c carrousel.php → carrusel de imágenes.
 *   - @c presentacioncuadro.php → presentación introductoria.
 *   - @c footer.php → pie de página.
 *   - @c scripts.php → dependencias JS (ej. Bootstrap).
 *
 * @note
 * Este archivo no contiene lógica de negocio. Se limita a organizar el layout
 * y cargar los módulos de interfaz de usuario.
 *
 * @section autores Autores
 * - Equipo de desarrollo N.I.C.O.L.E
 */
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
    <style>
  html, body {
    overflow-x: hidden;
    overflow-y: auto;
    width: 100%;
  }
</style>
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
