// Abrir y cerrar el modal
document.getElementById('descargarBtn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
    }
});

// Manejar el envío del formulario
document.getElementById('formulario-descarga').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario recargue la página

    // Aquí puedes procesar los datos si es necesario (enviar al servidor)
    
    // Simula la descarga del archivo
    const link = document.createElement('a');
    link.href = 'assets/download/GUIA STRATEGIC LEARNING.pdf'; // Ruta del archivo
    link.download = 'GUIA STRATEGIC LEARNING.pdf';
    
    document.body.appendChild(link);
    link.click();
    
    // Cierra el modal después de descargar
    document.getElementById('modal').style.display = 'none';
});

// Visibilidad del menu
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const dropdown = document.querySelector('.dropdown');

    menuToggle.addEventListener('click', function() {
        navLinks.classList.toggle('active');
    });

    dropdown.addEventListener('click', function() {
        dropdown.classList.toggle('active');
    });
});