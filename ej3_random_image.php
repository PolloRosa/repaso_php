<?php
$codigo = rand(30, 40);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    <title>Generar imagen random</title>
</head>
<body>
    <a href="index.html">Regresar</a>
    <br>
    <br>
    <details>
        <summary>Ejercicio 3 - Generación de números random</summary>
        <p>Requerimiento funcional:</p>
        <p>
            El cliente quiere mostrar una imagen aleatoria en su página web.
        </p>
        <p>
            Nos ha indicado usar el servicio https://picsum.photos y mostrar 1 de 10 fotos aleatorias, cada vez que se recargue la página debe motrar una imagen diferente.
        </p>
        <p>Etiquetas HTML en uso en el ejercicio:</p>
            <ul>
                <li>&lt;img&gt;</li>
            </ul>
        <p>Funcionalidad final:</p>
        <p>
            Se revisó la documentación de picsum para aprender a    usarlo para mostrar imágenes aleatorias en la página web. Se encontró que se puede usar un número aleatorio como parte de la URL de la imagen, lo que permite mostrar una imagen diferente cada vez que se recarga la página.
        </p>
        <p>
            Se hizo uso de la función de PHP rand() para generar un número aleatorio entre 30 y 40, y se envió este número como parte de la URL (parámetro id) como solicitud a picsum para mostrar una imagen en la página. Adicionalmente se indicó a picsum el tamaño de la imagen a mostrar (500x400 píxeles).
        </p>
    </details>
    <h3>Imagen <?php echo $codigo; ?></h3>
    <img src="https://picsum.photos/id/<?php echo $codigo; ?>/500/400" alt="Imagen <?php echo $codigo; ?>">
    <br><br>
    <a href="ej3_random_image.php">Generar nuevamente</a>
    <br>
    <br>
    <br>
    <br>
    <a href="index.html">Regresar</a>
</body>
</html>