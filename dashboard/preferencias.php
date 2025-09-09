<?php 
    session_start();
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<head> <!-- Metadatos esenciales para visualización correcta -->
    <!-- Fuentes decorativas desde Google Fonts -->
    <title>N.I.C.O.L.E - Preferencias</title><!-- Título de la pestaña del navegador -->
    <?php include "../dashboard/other.php"; ?>
    <?php include "../dashboard/stylesheet.php"; ?>
    <!-- Estilos internos para animaciones del carrusel -->
</head>
<body>
    <?php include "../dashboard/header.php"; ?>
    <div class="app-container" >
        <div class="right-section">
            <div class="login-container" style="max-width: 95vw;">
                <form action="procesar_registro.php" method="POST">
                <input type="hidden" name="finalizar_registro" value="1">
                <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64">
                <h3>ayúdanos a conocer más de ti</h3>
                <div class="row" style="width: 100%; margin: 0; padding: 1rem;">
                    <div class="col-md-6 col-12">
                        <p class="info-text">eres alérgico a algún como una fruta o comida?
                            o si sufres de alguna enfermedad que afecte tu dieta, por favor 
                            indícanoslo para tenerlo en cuenta al sugerirte platillos.
                        </p>
                        <div class="div">
                            <div class="row">
                            <select id="alergiasDropdown" class="col-9" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem; ">
                                <option value="Leche"                                            >Leche</option>
                                <option value="Huevo"                                            >Huevo</option>
                                <option value="Cacahuetes"                                       >Cacahuetes</option>
                                <option value="Frutos secos (almendras, nueces, avellanas, etc.)">Frutos secos (almendras, nueces, avellanas, etc.)</option>
                                <option value="Pescado"                                          >Pescado</option>
                                <option value="Mariscos (camarón, langosta, cangrejo, etc.)"     >Mariscos (camarón, langosta, cangrejo, etc.)</option>
                                <option value="Trigo / Gluten"                                   >Trigo / Gluten</option>
                                <option value="Soja"                                             >Soja</option>
                                <option value="Sésamo"                                           >Sésamo</option>
                                <option value="Mostaza"                                          >Mostaza</option>
                                <option value="Altramuces (lupin)"                               >Altramuces (lupin)</option>
                                <option value="Maíz"                                             >Maíz</option>
                                <option value="Chocolate / Cacao"                                >Chocolate / Cacao</option>
                                <option value="Fresas"                                           >Fresas</option>
                                <option value="Plátano"                                          >Plátano</option>
                                <option value="Tomate"                                           >Tomate</option>
                                <option value="Kiwi"                                             >Kiwi</option>
                                <option value="Durazno / Melocotón"                              >Durazno / Melocotón</option>
                                <option value="Manzana"                                          >Manzana</option>
                                <option value="Aditivos (sulfitos, colorantes, conservantes)"    >Aditivos (sulfitos, colorantes, conservantes)</option>

                            </select>
                            <button onclick="agregarDesdeDropdown(event)" class="login-btn col-3 active" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem; ">Añadir</button>
                            </div>
                            <p for="info-text">Si tu alergia no se encuentra en la lista, añadela anotandola en el cuadro de texto:</p>
                            <div class="row">
                            <input type="text" id="nuevaAlergia" placeholder="Escribe aquí..." class="col-9" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem; ">
                            <button onclick="agregarDesdeInput(event)" class="login-btn col-3 active" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem; ">Añadir</button>
                            </div>
                            <h3>Lista de alergias añadidas:</h3>
                            <ul id="listaAlergias"></ul>
                        </div>
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="error-message"><?php echo $_SESSION['error']; ?></div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-12">
                        <!-- sección de gustos personales -->
                        <p class="info-text">Activa tus sabores preferidos, para que seleccionemos tus alimentos favoritos.</p>
                        <div class="taste-buttons row justify-content-evenly">
                            <!-- Botones con valores que se asignan dinámicamente -->
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="amargo">amargo</button>
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="umami">umami (carne)</button>
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="salado">salado</button>
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="dulce">dulce</button>
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="acido">ácido</button>
                            <button type="button" class="taste-btn col-3" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem;" data-value="picante">picante</button>
                            <!-- Campo oculto donde se guarda la selección de sabores -->
                            <input type="hidden" name="sabores" id="sabores-seleccionados">
                        </div>
                        <p class="info-text">por fin!! estas en la sala para de conseguir nuevos platillos solo déjanos saber dos datos cruciales
                            sobre tu estado fisico</p>
                        <div class="form-group form-row row justify-content-between" style="margin: 0;">
                            <div class="col-6">
                                <!-- Peso -->
                                <label for="peso">Peso actual(Kilogramos)</label>
                                <input type="number" step="0.01" name="peso" id="peso" placeholder="peso" class="" style="font-size:1rem; margin: 0rem 0rem 1rem 0rem; ">
                            </div>
                            <div class="col-6">
                                <!-- Altura -->
                                <label for="altura">Altura actual(Metros)</label>
                                <input type="number" step="0.01" name="altura" id="altura" placeholder="altura" class="">
                            </div>
                            <div class="button-group" style="display: flex; gap: 1rem; text-align:center;">
                                <a href="../dashboard/registro.php" class="back-btn col-6">regresar</a>
                                <button type="submit" class="login-btn col-6">siguiente</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="mensaje-exito" style="display: none;" class="mensaje-exito">
                    Se ha registrado el usuario satisfactoriamente
                </div>
            </div>
        </div>
    </div>
    <?php include "../dashboard/footer.php"; ?>
    <?php include "../dashboard/scripts.php"; ?>
</body>
</html>