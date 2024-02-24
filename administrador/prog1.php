<?php
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
    $sql_check = "SELECT COUNT(*) AS num FROM profesor WHERE nombres='$nombre' OR correo='$correo'";
    $query_check = mysqli_query($con, $sql_check);
    $row_check = mysqli_fetch_assoc($query_check);

    // Verificamos si el nombre o correo ya existen en la base de datos
    if ($row_check['num'] > 0) {
        // Si el nombre o correo ya existe, redirigimos con un mensaje de error
        header("location: profesor1.php?er=1");
        exit(); // Finalizamos la ejecución del script
    } else {
        // Si el nombre y correo no existen, procedemos con la inserción
        $sql_insert = "INSERT INTO profesor (nombres, usuario, pass, estado, correo) VALUES ('$nombre', '$usuario', '$pass', '1', '$correo')";
        $query_insert = mysqli_query($con, $sql_insert);

        // Verificamos si la inserción fue exitosa
        if ($query_insert) {
            // Redirigimos a la página de profesores
            header("location: profesor.php");
            exit(); // Finalizamos la ejecución del script
        } else {
            // Si hubo un error en la inserción, puedes manejarlo aquí
            echo "Error al insertar el profesor.";
        }
    }
}
?>