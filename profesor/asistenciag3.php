<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $idas = $_GET['idas'];
    $id_alumno = $_GET['ida'];
    $fecha = $_POST['fecha'];
    $ingreso = $_POST['ingreso'];
    $salida = $_POST['salida'];
    #
    $sql ="DELETE FROM `asistencia` WHERE `asistencia`.`id` = '$idas'" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: asistenciaTaller.php?id=".$id);
    }

?>