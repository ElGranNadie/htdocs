// Función para alternar la visibilidad de ambas contraseñas
function togglePasswordAll() {
    const pass = document.getElementById('pass');
    const confirmarPass = document.getElementById('confirmar_pass');
    const newType = pass.type === 'password' ? 'text' : 'password';
    pass.type = newType;
    confirmarPass.type = newType;
}

// Función para validar que las contraseñas coincidan
function validarContraseñas() {
    const pass = document.getElementById('pass').value;
    const confirmarPass = document.getElementById('confirmar_pass').value;
    const mensaje = document.getElementById('password-match-message');
    
    if (confirmarPass === '') {
        mensaje.textContent = '';
        mensaje.style.color = '';
    } else if (pass === confirmarPass) {
        mensaje.textContent = 'Las contraseñas coinciden';
        mensaje.style.color = 'green';
    } else {
        mensaje.textContent = 'Las contraseñas no coinciden';
        mensaje.style.color = 'red';
    }
}

// Función para alternar la visibilidad de una contraseña específica
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}
// Condiciones de salud para las preferencias.php
function agregarDesdeDropdown(e) {
    e.preventDefault();
    const dropdown = document.getElementById("alergiasDropdown");
    const seleccion = dropdown.value;
    if (seleccion) {
    agregarItem(seleccion);
    dropdown.value = ""; // Reinicia la selección
    }
}

function agregarDesdeInput(e) {
    e.preventDefault();
    const input = document.getElementById("nuevaAlergia");
    const texto = input.value.trim();
    if (texto) {
    agregarItem(texto);
    input.value = ""; // Limpia el campo
    }
}

function agregarItem(texto) {
    const lista = document.getElementById("listaAlergias");
    const li = document.createElement("li");
    li.classList.add('row');
    // Botón para eliminar
    div = document.createElement("div");
    div.classList.add('col-8')
    div.classList.add('list-text')
    div.textContent = texto;
    li.appendChild(div);
    const btnEliminar = document.createElement("button");
    btnEliminar.classList.add('list-close-btn')
    btnEliminar.classList.add('col-3')
    btnEliminar.style.marginLeft = "10px";
    btnEliminar.onclick = () => lista.removeChild(li);
    btnEliminar.textContent = "Eliminar  ";
    const imagen = "../imagenes/cerrar.png" //Img en variable para enviar lo que desees
    btnEliminar.insertAdjacentHTML(
        "beforeend",
        `<img src=${imagen} alt=${imagen}>` // Backticks para img variable
    );
    
    li.appendChild(btnEliminar);
    lista.appendChild(li);
}

//preferencias
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
});