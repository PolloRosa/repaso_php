<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    <title>Superglobal GET</title>
</head>
<body>
    <a href="index.html">Regresar</a>
    <br>
    <br>
    <details>
        <summary>Ejercicio 2 - Parámetros recibidos con GET</summary>
        <p>Requerimiento funcional:</p>
        <p>
            Hemos visto en clase que se pueden recibir parámetros en PHP con los arreglos superglobales GET y POST, siendo GET para información no sensible.
        </p>
        <p>
            Los datos recibidos por GET se envían a través de la URL y se pueden ver en la barra de direcciones del navegador, así como también se pueden enviar a través de un formulario HTML con método GET. Este método es útil para enviar datos que no son sensibles, como por ejemplo, filtros o texto para una búsqueda.
        </p>
        <p>
            En este ejercicio se debe crear un formulario que envíe un texto a la misma página que debe recibirlo y mostrarlo en pantalla.
        </p>
        <p>Etiquetas HTML en uso en el ejercicio:</p>
            <ul>
                <li>&lt;form&gt;</li>
                <li>&lt;label&gt;</li>
                <li>&lt;input type=text&gt;</li>
                <li>&lt;input type=submit&gt;</li>
            </ul>
        <p>Funcionalidad final:</p>
        <p>
            Se creó 1 página HTML que contiene un formulario con un campo de texto y un botón de envío. Al hacer click en el botón, se envía el texto ingresado a la misma página utilizando el método GET.
        </p>
        <p>
            La página está preparada para recibir el parámetro 'ref' por GET. Si se recibe, se utiliza la función PHP htmlspecialchars para sanitizar el valor y evitar inyecciones de código. Luego, se muestra el valor en pantalla. Si no se recibe, se muestra un mensaje indicando que se está esperando un valor.
        </p>
        <p>
            Desde la página index.php ya se está enviando un valor por GET al hacer click en el enlace "Parámetros recibidos con GET".
        </p>
    </details>
    <h1>Envío de parámetros con GET</h1>
    <p>Uso de la variable superglobal GET para el envío y recepción de datos con PHP.</p>
    <form action="ej2_get.php" method="get">
        <label for="txtRef">Ingresar mensaje:</label> 
        <input type="text" id="txtRef" name="ref">
        <br><br>
        <input type="submit" value="Enviar parámetro"> | <a href="ej2_get.php">Reiniciar ejercicio</a>
    </form>
    <br><br>
<?php
// Verificar si se ha enviado el parámetro 'ref' por GET
if(isset($_GET['ref'])) {
    // Sanitizar el valor recibido para evitar inyecciones de código
    // Se usa la función htmlspecialchars para convertir caracteres especiales a entidades HTML y poderlo mostrar en pantalla
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
<a href="index.html">Regresar</a>
</body>
</html>