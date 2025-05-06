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
    <h3>Imagen <?php echo $codigo; ?></h3>
    <img src="https://picsum.photos/id/<?php echo $codigo; ?>/500/400" alt="Imagen <?php echo $codigo; ?>">
    <br><br>
    <a href="ej2_random_image.php">Generar nuevamente</a>
    <br>
    <br>
    <br>
    <br>
    <a href="index.php">Regresar</a>
</body>
</html>