<?php
# llamamos al archivo de conexion 
    session_start();
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos al archivo
    require('log.php');
    #creamos y accedemos al archivo
    $log = new Log("log.txt");
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
        $log->writeLine("Informacion", "se actualizaron los datos del alumno: ".$nombre . " DNI: " .$dni );
        
    	header("location: detalleAlumno.php?id=".$id);

    }
    #cerrando funcion de log
    $log->close();

?>