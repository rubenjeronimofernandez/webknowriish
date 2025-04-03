<?php
// Incluye el header
include 'includes/header.php';
?>

<section class="hero">
  <div class="container">
    <div class="textocentro">
        <h1>¿Tu empresa aprende?</h1>
        <p>Mejoramos la eficiencia y productividad a través del conocimiento</p>
        <a href="#services" class="btn btn-primary">Explorar Servicios</a>
    </div>
  </div>
</section>

<!-- Servicios Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="service-grid">
                <div class="service-card">
                    <img class="service-img" src="/knowriish/assets/img/service1.jpg" alt="Consultoría Educativa">
                    <div class="service-text">
                        <h3>Consultoría en Gestión del Conocimiento</h3>
                        <p>Trabajamos en colaboración con las empresas para desarrollar e implementar estrategias integrales de gestión del conocimiento. Analizamos las necesidades específicas de cada organización y diseñamos soluciones personalizadas que permitan maximizar el uso del conocimiento existente y fomentar la colaboración.</p>
                    </div>
                    
                </div>
                <div class="service-card">
                    <img class="service-img" src="/knowriish/assets/img/service2.jpg" alt="Formación Online">
                    <div class="service-text">
                        <h3>Capacitación de Equipos</h3>
                        <p>Impartimos programas de capacitación diseñados para fortalecer las habilidades de los empleados en la gestión del conocimiento. A través de talleres interactivos y prácticos, ayudamos a los equipos a adquirir competencias clave, como la creación y el intercambio efectivo de conocimiento, la construcción de comunidades de práctica y el uso de herramientas tecnológicas.</p>
                    </div>
                </div>
                <div class="service-card">
                    <img class="service-img" src="/knowriish/assets/img/service3.jpg" alt="Eventos Educativos">
                    <div class="service-text">
                        <h3>Desarrollo de Estrategias Personalizadas</h3>
                        <p>Trabajamos estrechamente con las empresas para desarrollar estrategias adaptadas a sus necesidades y objetivos específicos. Analizamos el entorno organizacional, identificamos áreas de mejora y diseño planes de acción que permitan maximizar el valor del conocimiento y promover la innovación en la empresa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="container-activando">
            <div>
                <h2>Activando</h2>
                <h3>¿Cómo podemos ayudarte</h3>
            </div>
            <div class="contenedor-activando">
                <div class="activando-card">
                    <h4>Gestión del conocimiento</h4>
                    <p>Identificar, capturar y difundir el conocimiento y las habilidades clave para mejorar las experiencias de los clientes y la propuesta de valor.</p>
                </div>
                <div class="activando-card">
                    <h4>Cultura de aprendizaje</h4>
                    <p>Gestionar los aprendizajes de manera eficaz para que los conocimientos fluyan de manera natural en la organización.</p>
                </div>
                <div class="activando-card">
                    <h4>Centrado en las personas</h4>
                    <p>Escuchando activamente a quien es verdaderamente propietario del conocimiento e impulsando sus aspiraciones.</p>
                </div>
                <div class="activando-card">
                    <h4>Foco en resultados y evidencias</h4>
                    <p>Identificando los indicadores de impacto que permitan mejorar la toma de decisiones de la organización.</p>
                </div>
            </div>
            
        </div>
        <!-- Ejemplo de testimonio -->
            <blockquote class="testimonial">
                "Gracias a Knowriish, nuestros colaboradores trabajan mejor juntos y han alcanzado objetivos increíbles."
                - Cliente satisfecho
            </blockquote>
    </section>

    <!-- Blog Start -->
    <section id="blog">
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">Blog</h2>
                <h1 class="mb-0">Algunas ideas</h1>
                <div class="text-center">
                    <a class="boton-entradas" href="pages/blog.php">Todas las entradas</a>
                </div>
            </div>
            <div class="row blog-cards-container">
                <ul id="archivoList" class="row" style="list-style-type: none;"></ul>
                <script>
                    // Obtener los datos del servidor utilizando AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "getArchivos.php", true);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var archivos = JSON.parse(xhr.responseText);
                            // Obtener los 3 últimos posts publicados
                            var ultimosPosts = archivos.filter(function(archivo) {
                                return (
                                    archivo.nombre !== "plantillaPost.html" &&
                                    archivo.tipo !== "carpeta" &&
                                    archivo.nombre !== "imagenes"
                                );
                            }).slice(-3);

                            // Generar la lista de los 3 últimos posts en HTML
                            var blogSection = document.querySelector(".blog-cards-container");

                            ultimosPosts.forEach(function(post) {
                                var column = document.createElement("div");
                                column.className = "col-md-4 blog-card-item";

                                var listItem = document.createElement("div");
                                listItem.className = "blog-item bg-light rounded overflow-hidden";

                                var imgWrapper = document.createElement("div");
                                imgWrapper.className = "blog-img position-relative overflow-hidden";

                                var img = document.createElement("img");
                                img.className = "img-fluid custom-image";
                                img.src = post.imagen;
                                img.alt = "";

                                var contentWrapper = document.createElement("div");
                                contentWrapper.className = "p-4";

                                var title = document.createElement("h4");
                                title.className = "mb-3";
                                title.innerText = post.titulo;

                                var description = document.createElement("p");
                                description.innerText = post.descripcion;

                                var readMoreLink = document.createElement("a");
                                readMoreLink.className = "text-uppercase";
                                readMoreLink.href = post.ruta;
                                readMoreLink.innerHTML = "Leer más<i class='bi bi-arrow-right'></i>";

                                // Construir la estructura del elemento
                                imgWrapper.appendChild(img);
                                contentWrapper.appendChild(title);
                                contentWrapper.appendChild(description);
                                contentWrapper.appendChild(readMoreLink);
                                listItem.appendChild(imgWrapper);
                                listItem.appendChild(contentWrapper);
                                column.appendChild(listItem);
                                blogSection.appendChild(column);
                            });
                        }
                    };

                    xhr.send();
                </script>
            </div>
        </div>
    </div>
</section>
    <!-- Blog fin -->

    <!--Seccion guía descargable-->
    <section id="guia">
        <div class="container">
            <div class="guiaFoto">
                <div class="contenedor-guia">
                    <h2>Descubre nuestra guía sobre Strategic Learning</h2>
                    <p>Basados en el método de Willie Petersen, te ofrecemos una guía para que el aprendizaje surja desde tu propia acción. </p>
                    <!--<a href="assets/download/GUIA STRATEGIC LEARNING.pdf" download="GUIA STRATEGIC LEARNING.pdf" class="boton-descarga">Descargar Guía</a>-->
                    <button id="descargarBtn" class="boton-descarga">Descargar Guía</button>
                </div>
                <img class="imagenGuia" src="assets/img/PortadaGuiaStrategicLearning.jpg" alt="Guia strategic learning">
            </div>
        </div>
        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Completa tus datos para descargar la guía</h3>
                <form id="formulario-descarga">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="empresa">Empresa:</label>
                    <input type="text" id="empresa" name="empresa" required>
                    
                    <button type="submit" class="boton-descarga">Enviar y Descargar</button>
                </form>
            </div>
        </div>
    </section>
<script src="/knowriish/assets/js/script.js"></script>

<?php
// Incluye el footer
include 'includes/footer.php';
?>
