document.addEventListener('DOMContentLoaded', function() {
    const formularioContacto = document.getElementById('formularioContacto');

    formularioContacto.addEventListener('submit', function(event) {
        // Verificar si el formulario es válido
        if (!formularioContacto.checkValidity()) {
            event.preventDefault(); // Evitar el envío del formulario si no es válido
            // Manejar los campos inválidos según sea necesario
            // En este ejemplo, podrías mostrar un mensaje de error o resaltar los campos inválidos
        }
    });
});