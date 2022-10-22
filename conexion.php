<?php 

    // Archivo de conexión
    $servidor = "localhost"; // o 127.0.0.1
    $usuario = "root";
    $contrasenha = ""; // Del usuario
    $baseDeDatos = "curso_dw";


    // Generamos el objeto de conexion a través de mysqli
    $mysqli = new mysqli($servidor, $usuario, $contrasenha, $baseDeDatos);
    //var_dump($mysqli);

    $consulta = "SELECT nombre, apellido, fechaNac FROM agenda where apellido = 'Lopez'";

    $respuesta = $mysqli->query($consulta);

    /* var_dump($respuesta); */

    while ($fila = $respuesta->fetch_assoc()) {
        //var_dump($fila);
        echo $fila["nombre"]." ".$fila["apellido"]." ".$fila["fechaNac"]."<br>";
    }

    /* $sql = "INSERT INTO agenda (nombre,apellido,fechaNac, telefono, domicilio) values ('Juan', 'Valdez', '1997-06-24', 2487878,'Avda Evergreen 123')"; */

    $sqlUpdate =  "UPDATE agenda SET nombre = 'Ramon' where apellido = 'Valdez'";

    $respuesta = $mysqli->query($sqlUpdate);



    $filename = "test.sql";
    // Fecha traida desde el servidor Y es año, m es mes y d es dia
    $fecha = date('Y-m-d');

    /* Esto es para Linux en caso de tener contraseña */
    exec("mysqldump -u $usuario -p$contrasenha $baseDeDatos > {$baseDeDatos}_{$fecha}_2.sql");

    /* Esto es para Linux en caso de no tener contraseña */
    exec("mysqldump -u $usuario $baseDeDatos > {$baseDeDatos}_{$fecha}_2.sql");

    /* Esto es para Windows en caso de utilizar XAMPP */

    exec("C:/xampp/mysql/bin/mysqldump -u $usuario $baseDeDatos > {$baseDeDatos}_{$fecha}_2.sql");


    /* Crear archivo ZIP (Comprimido) */
    /* Nombre de mi archivo .sql que viene del dump realizado */
    $files = "{$baseDeDatos}_{$fecha}_2.sql";

    /* Nombre del archivo comprimido */
    $zipname = "{$baseDeDatos}_{$fecha}.zip";

    /* Empezamos a crear nuestro archivo ZIP */
    $zip = new ZipArchive;
    /* Aperturamos conexion con el archivo en modalidad de creacion */
    $zip->open($zipname, ZipArchive::CREATE);
    /* Agregamos el documento al archivo comprimido */
    $zip->addFile($files);
    /* Cerramos el archivo */
    $zip->close();

    /// Para descargar el archivo zip con nuestro backup de la 
    /// base de datos desde el servidor

    /* Tipo de cabecera para el navegador (le dicemos que es un archivo comprimido (ZIP)) */
    header('Content-Type: application/zip');
    /* En la disposicion lo ponemos como adjuntos y le nombramos */
    header('Content-disposition: attachment; filename='.$zipname);
    /* Inidicamos la longitud/peso del archivo */
    header('Content-Length: ' . filesize($zipname));
    /* Realizamos una lectura del archivo, ahi ya te deberia saltar para descargar */
    readfile($zipname);

    /* $respuesta = array(
        "nombre" => 'Juan',
        "apellido" => 'Juarez',
        "..." => "..."       
    ) */
