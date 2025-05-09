<?php
$status = "";
$titulo = "Inicio de sesión";
$haysesion = false;

if(isset($_POST['txtUsuario']) && isset($_POST['txtContrasena'])) {
    if ($_POST['txtUsuario'] == 'admin' && $_POST['txtContrasena'] == '1234') {
        $status = "Bienvenido, administrador :)";
        $titulo = "Sesión iniciada";
        $haysesion = true;
    } else {
        $status = "Usuario no registrado."; 
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <a href="index.html">Regresar</a>
    <br>
    <br>
<?php if ($haysesion) { ?>
    <section>
        <p><?php echo $status; ?></p>
        <a href="ej4_login.php">Cerrar sesión</a>
    </section>
<?php } else { ?>
    <section>
        <h2>Inicio de sesión</h2>
        <form action="ej4_login.php" method="post">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" name="txtUsuario" placeholder="Ingrese usuario" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="txtContrasena" placeholder="Ingrese contraseña" required></td>
                </tr>
                <tr>
                    <tfoot>
                        <tr>
                            <td><input type="submit" value="Ingresar"></td>
                            <td><input type="submit" formaction="ej5_registro.php" formmethod="post" formnovalidate value="¿No estás registrado?"></td>
                        </tr>
                    </tfoot>
                </tr>
                <tr>
                    <td colspan="2"><p><?php echo $status; ?></p></td>
                </tr>
            </table>
        </form>
    </section>
<?php } ?>
    <br>
    <br>
    <br>
    <br>
    <a href="index.html">Regresar</a>
</body>
</html>