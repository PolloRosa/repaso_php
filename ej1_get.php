<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    <title>Superglobal GET</title>
</head>
<body>
    <form action="ej1_get.php" method="get">
        <label for="txtRef">Ingresar texto:</label> 
        <input type="text" id="txtRef" name="ref">
        <br><br>
        <input type="submit" value="Enviar texto"> | <a href="ej1_get.php">Reiniciar ejercicio</a>
    </form>
    <br><br>
<?php
if(isset($_GET['ref'])) {
    $var = htmlspecialchars($_GET['ref']);
    echo 'Valor de ref: ' . $var;
} else {
    echo 'Esperando valor...';
}
?>
<br>
<br>
<br>
<br>
<a href="index.php">Regresar</a>
</body>
</html>