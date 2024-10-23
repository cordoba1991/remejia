// Función para actualizar el año en el pie de página
function actualizarAño() {
    const elementoAño = document.getElementById('año-actual');
    const añoActual = new Date().getFullYear();
    elementoAño.textContent = añoActual;
}

// Llamar a la función cuando se carga la página
document.addEventListener('DOMContentLoaded', actualizarAño);

// Ejemplo de interactividad: cambiar el color del encabezado al hacer clic
document.querySelector('.encabezado-bienvenida').addEventListener('click', function() {
    this.style.color = this.style.color === 'yellow' ? 'white' : 'yellow';
});