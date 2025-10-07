<?php 
    session_start();
    require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N.I.C.O.L.E - Preferencias</title>
    <?php include "../dashboard/other.php"; ?>
    <?php include "../dashboard/stylesheet.php"; ?>
</head>
<body>
    <?php include "../dashboard/header.php"; ?>

    <div class="app-container">
        <div class="right-section">
            <div class="login-container" style="max-width: 95vw;">
                <form action="procesar_registro.php" method="POST" id="preferenciasForm">
                    <input type="hidden" name="finalizar_registro" value="1">
                    <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64">
                    <h3>Ayúdanos a conocer más de ti</h3>

                    <div class="row" style="width: 100%; margin: 0; padding: 1rem;">
                        <!-- COLUMNA IZQUIERDA: ALERGIAS -->
                        <div class="col-md-6 col-12">
                            <p class="info-text">
                                ¿Eres alérgico a algún alimento como frutas, comidas o ingredientes?
                                O si sufres de alguna enfermedad que afecte tu dieta, por favor indícanoslo
                                para tenerlo en cuenta al sugerirte platillos. (puedes eliminar alguna alergia dandole click)
                            </p>

                            <div>
                                <div class="row">
                                    <select id="alergiasDropdown" class="col-9" style="font-size:1rem; margin-bottom:1rem;">
                                        <option disabled selected>Selecciona una alergia...</option>
                                        <option value="Leche">Leche</option>
                                        <option value="Huevo">Huevo</option>
                                        <option value="Cacahuetes">Cacahuetes</option>
                                        <option value="Frutos secos (almendras, nueces, avellanas, etc.)">Frutos secos (almendras, nueces, avellanas, etc.)</option>
                                        <option value="Pescado">Pescado</option>
                                        <option value="Mariscos (camarón, langosta, cangrejo, etc.)">Mariscos (camarón, langosta, cangrejo, etc.)</option>
                                        <option value="Trigo / Gluten">Trigo / Gluten</option>
                                        <option value="Soja">Soja</option>
                                        <option value="Sésamo">Sésamo</option>
                                        <option value="Mostaza">Mostaza</option>
                                        <option value="Altramuces (lupin)">Altramuces (lupin)</option>
                                        <option value="Maíz">Maíz</option>
                                        <option value="Chocolate / Cacao">Chocolate / Cacao</option>
                                        <option value="Fresas">Fresas</option>
                                        <option value="Plátano">Plátano</option>
                                        <option value="Tomate">Tomate</option>
                                        <option value="Kiwi">Kiwi</option>
                                        <option value="Durazno / Melocotón">Durazno / Melocotón</option>
                                        <option value="Manzana">Manzana</option>
                                        <option value="Aditivos (sulfitos, colorantes, conservantes)">Aditivos (sulfitos, colorantes, conservantes)</option>
                                    </select>
                                    <button onclick="agregarDesdeDropdown(event)" class="login-btn col-3 active" style="font-size:1rem; margin-bottom:1rem;">Añadir</button>
                                </div>

                                <p>Si tu alergia no se encuentra en la lista, añádela escribiéndola aquí:</p>
                                <div class="row">
                                    <input type="text" id="nuevaAlergia" placeholder="Escribe aquí..." class="col-9" style="font-size:1rem; margin-bottom:1rem;">
                                    <button onclick="agregarDesdeInput(event)" class="login-btn col-3 active" style="font-size:1rem; margin-bottom:1rem;">Añadir</button>
                                </div>

                                <h3>Lista de alergias añadidas:</h3>
                                <ul id="listaAlergias"></ul>

                                <!-- Campo oculto para enviar alergias -->
                                <input type="hidden" name="alergias" id="alergiasInput">

                                <?php if (isset($_SESSION['error'])): ?>
                                    <div class="error-message">
                                        <?php 
                                            if (is_array($_SESSION['error'])) {
                                                foreach ($_SESSION['error'] as $err) echo "<p>$err</p>";
                                            } else {
                                                echo "<p>{$_SESSION['error']}</p>";
                                            }
                                            unset($_SESSION['error']);
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- COLUMNA DERECHA: SABORES Y DATOS FÍSICOS -->
                        <div class="col-md-6 col-12">
                            <p class="info-text">Activa tus sabores preferidos para que seleccionemos tus alimentos favoritos:</p>
                            <div class="taste-buttons row justify-content-evenly">
                                <button type="button" class="taste-btn col-3" data-value="amargo">Amargo</button>
                                <button type="button" class="taste-btn col-3" data-value="umami">Umami (carne)</button>
                                <button type="button" class="taste-btn col-3" data-value="salado">Salado</button>
                                <button type="button" class="taste-btn col-3" data-value="dulce">Dulce</button>
                                <button type="button" class="taste-btn col-3" data-value="acido">Ácido</button>
                                <button type="button" class="taste-btn col-3" data-value="picante">Picante</button>

                                <!-- Campo oculto donde se guarda la selección de sabores -->
                                <input type="hidden" name="sabores" id="sabores-seleccionados">
                            </div>

                            <p class="info-text">
                                Por último, cuéntanos dos datos sobre tu estado físico para ajustar tus recomendaciones:
                            </p>

                            <div class="form-group form-row row justify-content-between" style="margin: 0;">
                                <div class="col-6">
                                    <label for="peso">Peso actual (kg)</label>
                                    <input type="number" step="0.01" name="peso" id="peso" placeholder="Peso" style="font-size:1rem; margin-bottom:1rem;" required>
                                </div>
                                <div class="col-6">
                                    <label for="altura">Altura actual (cm)</label>
                                    <input type="number" step="0.01" name="altura" id="altura" placeholder="Altura" style="font-size:1rem;" required>
                                </div>

                                <div class="button-group" style="display: flex; gap: 1rem; margin-top:1rem;">
                                    <a href="../dashboard/registro.php" class="back-btn col-6">Regresar</a>
                                    <button type="submit" class="login-btn col-6">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="mensaje-exito" style="display: none;" class="mensaje-exito">
                    Se ha registrado el usuario satisfactoriamente.
                </div>
            </div>
        </div>
    </div>

    <?php include "../dashboard/footer.php"; ?>
    <?php include "../dashboard/scripts.php"; ?>

    <script>
        // --- GESTIÓN DE ALERGIAS ---
        const listaAlergias = [];
        const listaElement = document.getElementById("listaAlergias");
        const alergiasInput = document.getElementById("alergiasInput");

        function actualizarAlergias() {
            listaElement.innerHTML = '';
            listaAlergias.forEach((a, index) => {
                const li = document.createElement('li');
                li.textContent = a;
                li.onclick = () => {
                    listaAlergias.splice(index, 1);
                    actualizarAlergias();
                };
                listaElement.appendChild(li);
            });
            alergiasInput.value = listaAlergias.join(', ');
        }

        function agregarDesdeDropdown(event) {
            event.preventDefault();
            const select = document.getElementById("alergiasDropdown");
            const valor = select.value;
            if (valor && !listaAlergias.includes(valor)) {
                listaAlergias.push(valor);
                actualizarAlergias();
            }
        }

        function agregarDesdeInput(event) {
            event.preventDefault();
            const input = document.getElementById("nuevaAlergia");
            const valor = input.value.trim();
            if (valor && !listaAlergias.includes(valor)) {
                listaAlergias.push(valor);
                input.value = '';
                actualizarAlergias();
            }
        }

        // --- GESTIÓN DE SABORES ---
        const botonesSabores = document.querySelectorAll('.taste-btn');
        const inputSabores = document.getElementById('sabores-seleccionados');
        const saboresSeleccionados = new Set();

        botonesSabores.forEach(btn => {
            btn.addEventListener('click', () => {
                const valor = btn.dataset.value;
                if (saboresSeleccionados.has(valor)) {
                    saboresSeleccionados.delete(valor);
                    btn.classList.remove('active');
                } else {
                    saboresSeleccionados.add(valor);
                    btn.classList.add('active');
                }
                inputSabores.value = Array.from(saboresSeleccionados).join(', ');
            });
        });
    </script>
</body>
</html>
