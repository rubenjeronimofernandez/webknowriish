<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/knowriish/assets/css/style.css">
    <?php include '../includes/header.php'; ?>
    <title><?php echo $titulo; ?></title>
    
    
    <!-- Aquí puedes incluir tus estilos CSS, Bootstrap, etc. -->
</head>
<body>

    

    <div class="container">
        <article class="blog-post">
            <h1><?php echo $titulo; ?></h1>
            <div class="datosPost">
                <p><?php echo $autor; ?></p>
                <p><?php echo $categoria; ?></p>
                <p><?php echo $fecha; ?></p>
            </div>
            <h2><?php echo $subtitulo; ?></h2>
            <?php echo $contenido1; ?>
            <img id="imagenPost" src="<?php echo $imagen1; ?>" alt="<?php echo $titulo; ?>">
            <?php echo $contenido2; ?>
            <img src="<?php echo $imagen2; ?>" alt="<?php echo $titulo; ?>">
            <?php echo $contenido3; ?>
        </article>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>
</html>
