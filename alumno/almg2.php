<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    #
    $sql ="UPDATE `alumno` SET `nombres` = '$nombre', `usuario` = '$usuario', `pass` = '$pass', `dni` = '$dni', `correo` = '$correo' WHERE `alumno`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: detalleAlumno.php?id=".$id);
    }

?>