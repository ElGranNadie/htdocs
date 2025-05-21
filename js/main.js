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