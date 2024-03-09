<?php
session_start();
// Llamamos al archivo de conexión
include('conexion.php');

// Instanciamos los parámetros de conexión
$con = connection();

// Verificamos si se enviaron datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    // Consulta SQL para verificar si el nombre o correo ya existen en la tabla
    $sql_profesor = "SELECT  COUNT(*) AS `num` FROM `profesor` WHERE `nombres`='$nombre' OR `correo`='$correo' OR `usuario`='$usuario'";
    $query_profesor = mysqli_query($con, $sql_profesor);
    $row_profesor = mysqli_fetch_assoc($query_profesor);

    // Verificamos si el nombre o correo ya existen en la base de datos
    if ($row_profesor['num'] > 0) {
        // Si el nombre o correo ya existe, redirigimos con un mensaje de error
        header("location: profesor1.php?r=1");
    } else {
        // Si el nombre y correo no existen, procedemos con la inserción
        $sql_insert = "INSERT INTO profesor (nombres, usuario, pass, estado, correo) VALUES ('$nombre', '$usuario', '$pass', '1', '$correo')";
        $query_insert = mysqli_query($con, $sql_insert);
        header("location: profesor.php?r=1");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se creo un nuevo profesor con los valores: Nombre". $nombre. ", Correo: ".$correo." y Usuario: " .$usuario );
    #cerramos la funcion
    $log->close();
}
?>