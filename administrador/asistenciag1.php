<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $id_alumno = $_GET['ida'];
    $fecha = $_POST['fecha'];
    $ingreso = $_POST['ingreso'];
    $salida = $_POST['salida'];
    #
    $sql ="INSERT INTO `asistencia` (`inscrito_id`, `alumno_id`, `fecha`, `entrada`, `salida`) VALUES ('$id', '$id_alumno', '$fecha', '$ingreso', '$salida');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: asistenciaTaller.php?id=".$id);
    }

?>