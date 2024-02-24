<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $idi = $_GET['idi'];
    $id_alumno = $_GET['ida'];
    date_default_timezone_set('America/Lima');
    $fecha = date("y-m-d");
    $hora= date("H:i:s");
    
    #
    $sql ="INSERT INTO `asistencia` (`inscrito_id`, `alumno_id`, `fecha`, `entrada` ) VALUES ('$idi', '$id_alumno', '$fecha', '$hora');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: detalleTaller.php?id=".$id);
    }

?>