<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];   
    $ida = $_GET['ida'];   
    $idi = $_GET['idi'];   
    #
    $sql ="DELETE FROM `inscrito` WHERE `inscrito`.`id` = '$idi'" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: detalleTaller.php?id=".$id);
    }

?>