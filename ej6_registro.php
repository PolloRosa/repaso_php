<?php
$__UPLOAD_DIR__ = "upload/";
$hoy = date('Y-m-d');

// en el mensaje de guardado incluir un input button popovertarget para mostrar un descargable sorpresa
/* pendiente hacer página con los elementos input type:
datetime-local <-- idea de consulta de carta natal con un API gratuito
month
week
time
*/
/* Función para subir archivos para los 2 campos en el formulario
Máximo tamaño de archivo por defecto es de 3 MB
*/
function subirArchivo($FILES, $esImagen, $esPDF, $prefijoResultado = "Archivo: ", $maxTamano = 3000000) {
    $prefijo = date('YmdGis');
    $archivo_destino = $GLOBALS['__UPLOAD_DIR__'] . $prefijo . basename($FILES['name']);
    $esValido = true;
    // validación de imagen: si es una imagen válida
    if($esImagen) {
        $tamano_imagen = getimagesize($FILES['tmp_name']);
        if($tamano_imagen === false) {
            $esValido = false;
            $resultado = $prefijoResultado . "error::archivo no es una imagen válida. <br>";
        }
    }
    // validación de PDF
    if($esPDF) {
        $extension = strtolower(pathinfo($archivo_destino,PATHINFO_EXTENSION));
        if($extension != 'pdf') {
            $esValido = false;
            $resultado = $prefijoResultado . "error::archivo no es un documento PDF válido. <br>";
        }
    }
    //validación de tamaño de archivo
    if ($FILES['size'] >= $maxTamano) {
        $esValido = false;
        $resultado = $prefijoResultado . "error::tamaño de archivo es igual o superior al máximo permitido. <br>";
    }

    if($esValido) {
        if (move_uploaded_file($FILES['tmp_name'], $archivo_destino)) {
            $resultado = $prefijoResultado .'<a href="' . $archivo_destino . '" target="_blank">click aquí</a><br>';
        } else {
            $resultado = $prefijoResultado . "error::no se pudo subir el archivo. <br>";
        }
    }
    return $resultado;
}

// Si la página está recibiendo del formulario de registro
$nombres = "";
$apellidos = "";
$genero = "";
$edad = "";
$distrito = "";
$nacimiento = "";
$usuario = "";
$contrasena = "";
$foto = "";
$email = "";
$celular = "";
$linkedin = "";
$expectativas = "";
$curriculum = "";
$intereses = "";
$boletin = "";

// parámetro POST hdnRegistrar de página ej6_registro.php
if(isset($_POST['hdnRegistrar'])) {
    if(isset($_POST['txtNombres']) && !empty($_POST['txtNombres'])){
        $nombres = "Nombres: " . $_POST['txtNombres'] . "<br>";
    }
    if(isset($_POST['txtApellidos']) && !empty($_POST['txtApellidos'])){
        $apellidos = "Apellidos: " . $_POST['txtApellidos'] . "<br>";
    }
    if(isset($_POST['rbnGenero'])){
        $genero = "Género: " . $_POST['rbnGenero'] . "<br>";
    }
    if(isset($_POST['txtEdad']) && !empty($_POST['txtEdad'])){
        $edad = "Edad: " . $_POST['txtEdad'] . "<br>";
    }
    if(isset($_POST['txtDistrito']) && !empty($_POST['txtDistrito'])){
        $distrito = "Distrito: " . $_POST['txtDistrito'] . "<br>";
    }
    if(isset($_POST['txtNacimiento']) && !empty($_POST['txtNacimiento'])){
        $nacimiento = "Fecha de nacimiento: " . $_POST['txtNacimiento'] . "<br>";
    }
    if(isset($_POST['txtNuevoUsuario']) && !empty($_POST['txtNuevoUsuario'])){
        $usuario = "Usuario: " . $_POST['txtNuevoUsuario'] . "<br>";
    }
    if(isset($_POST['txtNuevaContrasena']) && !empty($_POST['txtNuevaContrasena'])){
        $contrasena = "Contraseña sin cifrar: " . $_POST['txtNuevaContrasena'] . "<br>";
    }
    if(!empty($_FILES['filFoto']['name'])){
        $foto = subirArchivo($_FILES['filFoto'], true, false, "Foto de perfil: ");
    }
    if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])){
        $email = "Email: " . $_POST['txtEmail'] . "<br>";
    }
    if(isset($_POST['txtCelular']) && !empty($_POST['txtCelular'])){
        $celular = "Celular: " . $_POST['txtCelular'] . "<br>";
    }
    if(isset($_POST['txtLinkedin']) && !empty($_POST['txtLinkedin'])){
        $linkedin = "Linkedin: " . $_POST['txtLinkedin'] . "<br>";
    }
    $expectativas = "Expectativas salariales: " . $_POST['rngSalario'] . "<br>";
    if(!empty($_FILES['filCurriculum']['name'][0])) {
        for($i=0; $i<count($_FILES['filCurriculum']['name']); $i++) {
            $archivos = array();
            $archivos['name'] = $_FILES['filCurriculum']['name'][$i];
            $archivos['tmp_name'] = $_FILES['filCurriculum']['tmp_name'][$i];
            $archivos['size'] = $_FILES['filCurriculum']['size'][$i];
            $curriculum .= subirArchivo($archivos, false, true, "Curriculum Vitae: ", 5000000);
        }
    }
    if(isset($_POST['chkInteres']) && count($_POST['chkInteres']) > 0) {
        $intereses = "Intereses: " . implode(", ", $_POST['chkInteres']) . "<br>";
    }
    $boletin = "Recibir boletín? " . $_POST['selBoletin'];
}
// parámetro POST txtUsuario de página ej5_login.php
// ejercicio 5 con 2 botones en 1 formulario dirigiendo a 2 diferentes páginas web
if(isset($_POST['txtUsuario']))
    $usuario = $_POST['txtUsuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="assets/favicon/favicon.ico">
    <title>Formularios</title>
</head>
<body>
    <a href="index.html">Regresar</a>
    <section>
        <h2>Registro de usuario</h2>
        <form action="ej6_registro.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="hdnRegistrar" value="1">
            <fieldset>
                <legend>Datos personales</legend>
                <table>
                    <tr>
                        <td>Nombres:</td>
                        <td><input type="text" name="txtNombres" placeholder="Ingrese nombres" autocomplete="off" autofocus></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" name="txtApellidos" placeholder="Ingrese apellidos" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Género:</td>
                        <td>
                            <input type="radio" name="rbnGenero" value="Agenero"> Agenero <br>
                            <input type="radio" name="rbnGenero" value="Femenino"> Femenino <br>
                            <input type="radio" name="rbnGenero" value="Fluido"> Fluido <br>
                            <input type="radio" name="rbnGenero" value="Masculino"> Masculino
                        </td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td><input type="number" name="txtEdad" placeholder="Ingrese edad" min="18"></td>
                    </tr>
                    <tr>
                        <td>Distrito de residencia:</td>
                        <td>
                            <input type="text" name="txtDistrito" list="lisDistrito" placeholder="Ingrese distrito">
                            <datalist id="lisDistrito">
                                <option value="Ancón"></option>
                                <option value="Ate"></option>
                                <option value="Barranco"></option>
                                <option value="Breña"></option>
                                <option value="Carabayllo"></option>
                                <option value="Chaclacayo"></option>
                                <option value="Chorrillos"></option>
                                <option value="Cieneguilla"></option>
                                <option value="Comas"></option>
                                <option value="El Agustino"></option>
                                <option value="Independencia"></option>
                                <option value="Jesús María"></option>
                                <option value="La Molina"></option>
                                <option value="La Victoria"></option>
                                <option value="Lima">Cercado</option>
                                <option value="Lince"></option>
                                <option value="Los Olivos"></option>
                                <option value="Lurigancho"></option>
                                <option value="Lurín"></option>
                                <option value="Magdalena del Mar"></option>
                                <option value="Miraflores"></option>
                                <option value="Pachacamac"></option>
                                <option value="Pucusana"></option>
                                <option value="Pueblo Libre"></option>
                                <option value="Puente Piedra"></option>
                                <option value="Punta Hermosa"></option>
                                <option value="Punta Negra"></option>
                                <option value="Rímac"></option>
                                <option value="San Bartolo"></option>
                                <option value="San Borja"></option>
                                <option value="San Isidro"></option>
                                <option value="San Juan de Lurigancho">SJL</option>
                                <option value="San Juan de Miraflores">SJM</option>
                                <option value="San Luis"></option>
                                <option value="San Martín de Porres"></option>
                                <option value="San Miguel"></option>
                                <option value="Santa Anita"></option>
                                <option value="Santa María del Mar"></option>
                                <option value="Santa Rosa"></option>
                                <option value="Santiago de Surco"></option>
                                <option value="Surquillo"></option>
                                <option value="Villa el Salvador">VES</option>
                                <option value="Villa María del Triunfo">VMT</option>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" name="txtNacimiento" max="<?php echo $hoy; ?>"></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Datos de la cuenta</legend>
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" name="txtNuevoUsuario" placeholder="Ingrese usuario" pattern="^[a-zA-Z]{1}[A-Za-z0-9]*$" value="<?php echo $usuario; ?>" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Contraseña:</td>
                        <td><input type="password" name="txtNuevaContrasena" placeholder="Ingrese contraseña"></td>
                    </tr>
                    <tr>
                        <td>Foto de perfil (max 3 MB):</td>
                        <td><input type="file" name="filFoto" accept="image/*"></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Perfil profesional</legend>
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="txtEmail" placeholder="Ingrese email" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Celular:</td>
                        <td><input type="tel" name="txtCelular" placeholder="Ingrese celular" pattern="^[+]?[0-9]+$" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Enlace de Linkedin:</td>
                        <td><input type="url" name="txtLinkedin" placeholder="Ingrese URL" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Expectativas salariales (1000 a 5000):</td>
                        <td><input type="range" name="rngSalario" list="lisSalario" min="1000" max="5000" step="500">
                        <datalist id="lisSalario">
                            <option value="1000"></option>
                            <option value="1500"></option>
                            <option value="2000"></option>
                            <option value="2500"></option>
                            <option value="3000"></option>
                            <option value="3500"></option>
                            <option value="4000"></option>
                            <option value="4500"></option>
                            <option value="5000"></option>
                        </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td>Curriculum Vitae (max 5 MB):</td>
                        <td><input type="file" name="filCurriculum[]" accept=".pdf" multiple></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Queremos saber de ti</legend>
                <table>
                    <tr>
                        <td>Interesado en contenido:</td>
                        <td>
                            <input type="checkbox" name="chkInteres[]" value="Autos">Autos <br>
                            <input type="checkbox" name="chkInteres[]" value="Deportes"> Deportes <br>
                            <input type="checkbox" name="chkInteres[]" value="Maquillaje">Maquillaje <br>
                            <input type="checkbox" name="chkInteres[]" value="Tecnología">Tecnología
                        </td>
                    </tr>
                    <tr>
                        <td>Deseo recibir boletines:</td>
                        <td>
                            <select name="selBoletin">
                                <option value="Correo">A mi correo</option>
                                <option value="WhatsApp">A mi WhatsApp</option>
                                <option value="No" selected>No deseo recibir</option>
                                <option value="Tecnología">Tecnología</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <p><input type="checkbox" name="chkAutorizo" required> <label for="chkAutorizo">Autorizo a que hagan uso de mi información personal para procesos de Marketing.</label></p>
            <p><input type="submit" value="Registrar usuario"> <input type="reset" value="Limpiar"> </p>
        </form>
    </section>
    <?php if(isset($_POST['hdnRegistrar'])) { ?>
    <section>
        <h3>Datos recibidos...</h3>
        <p>
            <?php
            echo $nombres; 
            echo $apellidos;
            echo $genero;
            echo $edad;
            echo $distrito;
            echo $nacimiento;
            echo $usuario;
            echo $contrasena;
            echo $foto;
            echo $email;
            echo $celular;
            echo $linkedin;
            echo $expectativas;
            echo $curriculum;
            echo $intereses;
            echo $boletin;
            ?>
        </p>    
    </section>
    <?php } ?>
    <br>
    <br>
    <br>
    <br>
    <a href="index.html">Regresar</a>
</body>
</html>