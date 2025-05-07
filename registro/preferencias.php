<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>N.I.C.O.L.E - Preferencias</title>
</head>
<body>
    <div class="app-container">
        <div class="left-section">
            <h1 class="logo">N.I.C.O.L.E</h1>
            <div class="welcome-message">
                <h2>vamos!!! estas a nada<br>de aprender nuevos<br>recetas</h2>
            </div>
        </div>
        <div class="right-section">
            <div class="login-container">
            <img src="../icono.jpg" alt="Icono" class="mb-4" width="100">
                <h3>ayúdanos a conocer más de ti</h3>
                <form action="procesar_registro.php" method="POST">
                    <input type="hidden" name="finalizar_registro" value="1">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.taste-btn');
            const hiddenInput = document.getElementById('sabores-seleccionados');
            const selectedTastes = new Set();

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    if (this.classList.toggle('active')) {
                        selectedTastes.add(value);
                    } else {
                        selectedTastes.delete(value);
                    }
                    hiddenInput.value = Array.from(selectedTastes).join(',');
                });
            });

            // Manejar el envío del formulario
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                fetch('procesar_registro.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('mensaje-exito').style.display = 'block';
                    setTimeout(() => {
                        window.location.href = '../login.php';
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>