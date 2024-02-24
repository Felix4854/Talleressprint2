<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $ida = $_GET['ida'];

    #
    $sql ="INSERT INTO `inscrito` (`alumno_id`, `taller_id`, `estado`) VALUES ('$ida', '$id', '1');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: detalleTaller.php?id=".$id);
    }

?>