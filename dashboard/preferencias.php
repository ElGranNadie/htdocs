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
    <style>
        .carousel {
            position: relative;
            margin-top: 2rem;
            width: 100%;
            max-width: 500px;
            height: 180px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0);
            border-radius: 10px;
            padding: 30px;
        }

        .carousel-item {
            position: absolute;
            width: 100%;
            text-align: center;
            font-size: 2.8rem;
            font-family: 'Quicksand', sans-serif;
            color: rgb(0, 0, 0);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
            display: none;
        }

        @keyframes carouselFade {
            0% { opacity: 0; transform: translateY(20px); }
            5% { opacity: 1; transform: translateY(0); }
            35% { opacity: 1; transform: translateY(0); }
            40% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 0; transform: translateY(-20px); }
        }

        .carousel-item {
            animation: carouselFade 15s infinite;
            display: block;
        }

        .carousel-item:nth-child(1) { animation-delay: 0s; }
        .carousel-item:nth-child(2) { animation-delay: 5s; }
        .carousel-item:nth-child(3) { animation-delay: 10s; }
    </style>
<!-- Archivo JS personalizado para interacción del usuario, la variable esta en el set de variables -->
<script src='<?php echo $mainjs?>'></script>
</head>
<body>
    <?php include "../dashboard/header.php"; ?>
    <div class="app-container"><!-- Sección izquierda: branding y carrusel motivacional -->
        <div class="right-section">
            <div class="login-container">
            <img src='<?php echo $logo ?>64.png' alt="Icono" class="mb-4" width="64">
                <h3>ayúdanos a conocer más de ti</h3>
                <!-- Formulario para enviar preferencias del usuario -->
                <form action="procesar_registro.php" method="POST">
                    <input type="hidden" name="finalizar_registro" value="1">
                    <!-- sección de gustos personales -->
                    <p class="form-hint">cuentanos que se adapta mas a ti</p>
                    <div class="taste-buttons row justify-content-evenly">
                        <!-- Botones con valores que se asignan dinámicamente -->
                        <button type="button" class="taste-btn col-5" data-value="salado">salado</button>
                        <button type="button" class="taste-btn col-5" data-value="dulce">dulce</button>
                        <button type="button" class="taste-btn col-5" data-value="acido">ácido</button>
                        <button type="button" class="taste-btn col-5" data-value="picante">picante</button>
                        <!-- Campo oculto donde se guarda la selección de sabores -->
                        <input type="hidden" name="sabores" id="sabores-seleccionados">
                    </div>
                    <!-- Campo para indicar alergias alimentarias -->
                    <p class="form-hint">eres alérgico a algún como una fruta o comida?</p>
                    <div class="form-group">
                        <input type="text" name="alergias" placeholder="alergias:">
                    </div>
                    <!-- Sección para datos físicos -->
                    <p class="form-hint">por fin!! estas en la sala para de conseguir nuevos platillos solo déjanos saber sobre tu estado</p>
                    <div class="form-group form-row">
                        <div class="input-group half-width">
                            <!-- Peso -->
                            <label for="peso">Peso</label>
                            <input type="number" step="0.01" name="peso" id="peso" placeholder="peso" class="with-unit">
                            <span class="unit">kilogramos</span>
                        </div>
                        <div class="input-group half-width">
                            <!-- Altura -->
                            <label for="altura">Altura</label>
                            <input type="number" step="0.01" name="altura" id="altura" placeholder="altura" class="with-unit">
                            <span class="unit">centímetros</span>
                        </div>
                    </div>
                    <!-- Botón para enviar el formulario y finalizar el registro -->
                    <div class="button-group">
                        <button type="submit" class="login-btn">finalizar</button>
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