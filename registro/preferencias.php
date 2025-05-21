<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos/base.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>N.I.C.O.L.E - Preferencias</title>
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

<script src="../js/main.js"></script>
</head>
<body>
    <div class="app-container">
        <div class="left-section">
            <h1 class="logo">N.I.C.O.L.E</h1>
            <div class="carousel">
                <div class="carousel-item">dinos tus gustos<br>culinarios</div>
                <div class="carousel-item">personaliza tu<br>experiencia</div>
                <div class="carousel-item">cocinaremos juntos<br>algo especial</div>
            </div>
        </div>
        <div class="right-section">
            <div class="login-container">
            <img src="../imagenes/icono.jpg" alt="Icono" class="mb-4" width="100">
                <h3>ayúdanos a conocer más de ti</h3>
                <form action="procesar_registro.php" method="POST">
                    <input type="hidden" name="finalizar_registro" value="1">
                    <p class="form-hint">cuentanos que se adapta mas a ti</p>
                    <div class="taste-buttons">
                        
                        <button type="button" class="taste-btn" data-value="salado">salado</button>
                        <button type="button" class="taste-btn" data-value="dulce">dulce</button>
                        <button type="button" class="taste-btn" data-value="acido">ácido</button>
                        <button type="button" class="taste-btn" data-value="picante">picante</button>
                        <input type="hidden" name="sabores" id="sabores-seleccionados">
                    </div>
                    <p class="form-hint">eres alérgico a algún como una fruta o comida?</p>
                    <div class="form-group">
                        <input type="text" name="alergias" placeholder="alergias:">
                    </div>
                    <p class="form-hint">por fin!! estas en la sala para de conseguir nuevos platillos solo déjanos saber sobre tu estado</p>
                    <div class="form-group form-row">
                        <div class="input-group half-width">
                            <label for="peso">Peso</label>
                            <input type="number" step="0.01" name="peso" id="peso" placeholder="peso" class="with-unit">
                            <span class="unit">kilogramos</span>
                        </div>
                        <div class="input-group half-width">
                            <label for="altura">Altura</label>
                            <input type="number" step="0.01" name="altura" id="altura" placeholder="altura" class="with-unit">
                            <span class="unit">centímetros</span>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="login-btn">finalizar</button>
                    </div>
                </form>
                <div id="mensaje-exito" style="display: none;" class="mensaje-exito">
                    Se ha registrado el usuario satisfactoriamente
                </div>
            </div>
            <div class="side-message">
                <h3>creo que ya sabemos que es lo primero que cocinaremos hoy</h3>
            </div>
        </div>
    </div>
</body>
</html>