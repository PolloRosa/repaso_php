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
    <style>
        header {
            margin-bottom: 60px;
        }
        footer {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.html">Regresar</a>
    </header>
    <main>
        <h1>Formularios - parte 1</h1>
        <article>
            <section id="ejercicio-propuesto">
                <details>
                    <summary>Ejercicio 4 - Formularios - Parte 1</summary>
                    <p>Requerimiento funcional:</p>
                    <p>
                        Queremos dar un repaso al uso de formularios en HTML, pero iremos más allá y usaremos PHP para darle funcionalidad. 
                    </p>
                    <p>
                        El objetivo del ejercicio es crear un formulario de inicio de sesión con caja de texto para usuario y caja de texto para contraseña, con botones para iniciar sesión y para el registro del usuario.
                    </p>
                    <p>
                        El código PHP se usará para el envío de datos por POST pero no para la persistencia de datos. El desarrollo PHP será sin conexión a base de datos.
                    </p>
                    <p>Etiquetas HTML en uso en el ejercicio:</p>
                        <ul>
                            <li>&lt;form&gt;</li>
                            <li>&lt;input type="text"&gt;</li>
                            <li>&lt;input type="password"&gt;</li>
                            <li>&lt;button type="submit"&gt;</li>
                            <li>&lt;button&gt;</li>
                        </ul>
                    <p>Funcionalidad final:</p>
                    <p>
                        Se creó una página PHP con el formulario y los campos solicitados, el formulario envía los datos por POST a sí mismo, mostrando mensaje de éxito y enlace para cerrar sesión, o mensaje de error y el formulario vacío.<br>
                    </p>
                    <p>
                        El código PHP no inicia sesión, solo valida que el usuario y clave coincidan con el de administrador.<br>
                        Se han considerado credenciales para el usuario administrador (admin/1234).<br>
                        El enlace para cerrar sesión solo redirige a la misma página para mostrar el formulario en blanco.
                    </p>
                    <p>
                        Los campos <code>input</code> usan el atributo <code>required</code> para que el botón de submit valide que los datos se encuentren rellenados.
                    </p>
                    <p>
                        Se creó un botón de tipo submit para registro de usuario que envía el valor del campo de usuario a otra página php usando el mismo elemento formulario del ejercicio con el atributo <code>formaction</code>, <code>formmethod</code> y <code>formnovalidate</code> ya que sirve también como enlace que dirige a la página de registro.
                    </p>
                    <p>
                        Se creó un botón con la función <code>ingresarAdmin()</code> de JavaScript para rellenar ambos campos con las credenciales del usuario administrador. 
                    </p>
                </details>
            </section>
            <h2>Inicio de sesión</h2>
            <section id="resolucion">
<?php if ($haysesion) { ?>
                <p><?php echo $status; ?></p>
                <a href="4_login.php">Cerrar sesión</a>
<?php } else { ?>
                <form action="4_login.php" method="post">
                    <table>
                        <tr>
                            <td>Usuario:</td>
                            <td><input type="text" name="txtUsuario" id="txtUsuario" placeholder="Ingrese usuario" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td><input type="password" name="txtContrasena" id="txtContrasena" placeholder="Ingrese contraseña" required></td>
                        </tr>
                        <tr>
                            <tfoot>
                                <tr>
                                    <td><button type="submit">Ingresar</button></td>
                                    <td><button type="submit" formaction="5_registro.php" formmethod="post" formnovalidate>¿No estás registrado?</button></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button id="btnAdmin" type="button" onclick="ingresarAdmin()">Ingresar como administrador</button></td>
                                </tr>
                            </tfoot>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $status; ?></p></td>
                        </tr>
                    </table>
                </form>            
<?php } ?>
            </section>
        </article>
    </main>
    <footer>
        <a href="index.html">Regresar</a>
    </footer>
    <script>
        function ingresarAdmin() {
            document.getElementById("txtUsuario").value = "admin";
            document.getElementById("txtContrasena").value = "1234";
        }
    </script>
</body>
</html>