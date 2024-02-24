<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $aula = $_POST['aula'];
    #
    $sql ="UPDATE `aula` SET `detalle` = '$aula' WHERE `aula`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: aula.php");
    }

?>