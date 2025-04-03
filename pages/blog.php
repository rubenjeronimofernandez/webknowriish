<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    </head>
<body>

    <?php include '../includes/header.php'; ?>

    <div class="container">
        <h1>Blog</h1>
        <div class="blog-grid">
            <?php
            $blog_dir = '../blog';

            // Check if the directory exists
            if (is_dir($blog_dir)) {
                // Use glob() to find all PHP files in the directory
                $post_files = glob($blog_dir . '/*.php');

                // Check if any files were found
                if ($post_files) {
                    // Sort the files (optional, but often desirable)
                    sort($post_files); // You might want to sort by date or title instead

                    // Function to safely include and extract variables (DEFINED OUTSIDE THE LOOP)
                    function get_post_data($file) {
                        ob_start(); // Inicia el buffering de salida
                        include $file;
                        ob_end_clean(); // Limpia el buffer de salida y lo descarta

                        return array(
                            'titulo' => isset($titulo) ? $titulo : '',
                            'imagen1' => isset($imagen1) ? $imagen1 : '',
                            'contenido1' => isset($contenido1) ? $contenido1 : '',
                            'autor' => isset($autor) ? $autor : '',
                            'fecha' => isset($fecha) ? $fecha : '',
                            'categoria' => isset($categoria) ? $categoria : ''
                        );
                    }

                    // Loop through each file and include it
                    foreach ($post_files as $post_file) {
                        // Extract the post name from the filename
                        $post_name = pathinfo($post_file, PATHINFO_FILENAME);

                        // Exclude the template file
                        if ($post_name !== 'plantillaPost' && $post_name !== 'semilla') {

                            // Get post data
                            $post_data = get_post_data($post_file);

                            // Extract variables
                            $titulo = $post_data['titulo'];
                            $imagen1 = $post_data['imagen1'];
                            $contenido1 = $post_data['contenido1'];
                            $autor = $post_data['autor'];
                            $fecha = $post_data['fecha'];
                            $categoria = $post_data['categoria'];

                            // Get the first 200 characters of contenido1 for the excerpt
                            $excerpt = substr(strip_tags($contenido1), 0, 200) . "...";

                            // Output the blog card
                            echo '<div class="blog-card">';
                            echo '<div class="card-image-container">'; // Nuevo contenedor
                            echo '<img src="' . $imagen1 . '" alt="' . $titulo . '">';
                            echo '<span class="card-category">' . htmlspecialchars($categoria) . '</span>'; // Categoría dentro del contenedor
                            echo '</div>';
                            echo '<div class="card-content">';
                            echo '<h2 class="card-title">' . htmlspecialchars($titulo) . '</h2>';
                            echo '<p class="card-excerpt">' . $excerpt . '</p>';
                            echo '<div class="card-footer">';
                            echo '<span>Autor: ' . htmlspecialchars($autor) . '</span>';
                            echo '<span>Fecha: ' . htmlspecialchars($fecha) . '</span>';
                            echo '</div>';
                            echo '<a href="../blog/' . $post_name . '.php" class="read-more-btn">Leer más</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                } else {
                    echo "<p>No se encontraron posts en el blog.</p>";
                }
            } else {
                echo "<p>Error: El directorio del blog no existe.</p>";
            }
            ?>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>
</html>