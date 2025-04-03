<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Verificar que la solicitud sea GET a este script
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(["message" => "Acceso no autorizado"]);
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Max-Age: 86400");
    exit;
}

$blog_dir = 'blog';
$archivos = [];

if (is_dir($blog_dir)) {
    $post_files = glob($blog_dir . '/*.php');

    if ($post_files) {
        sort($post_files);

        function get_post_data($file) {
            ob_start();
            include $file;
            ob_end_clean();

            // Lógica para seleccionar la imagen de la tarjeta (puedes modificarla)
            $imagenTarjeta = isset($imagen1) ? $imagen1 : ''; // Usar $imagen1 por defecto

            return array(
                'titulo' => isset($titulo) ? $titulo : '',
                'imagen1' => isset($imagen1) ? $imagen1 : '',
                'contenido1' => isset($contenido1) ? $contenido1 : '',
                'autor' => isset($autor) ? $autor : '',
                'fecha' => isset($fecha) ? $fecha : '',
                'categoria' => isset($categoria) ? $categoria : '',
                'imagenTarjeta' => $imagenTarjeta // Agregar la imagen de la tarjeta
            );
        }

        foreach ($post_files as $post_file) {
            $post_name = pathinfo($post_file, PATHINFO_FILENAME);

            if ($post_name !== 'plantillaPost' && $post_name !== 'semilla') {
                $post_data = get_post_data($post_file);

                $archivos[] = array(
                    "nombre" => $post_name . '.php',
                    "ruta" => $blog_dir . '/' . $post_name . '.php',
                    "fecha" => $post_data['fecha'],
                    "titulo" => $post_data['titulo'],
                    "categoria" => $post_data['categoria'],
                    "autor" => $post_data['autor'],
                    "descripcion" => substr(strip_tags($post_data['contenido1']), 0, 197) . "...",
                    "imagen" => $post_data['imagen1'],
                    "imagenTarjeta" => $post_data['imagenTarjeta'] // Agregar la imagen de la tarjeta
                );
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($archivos);
?>