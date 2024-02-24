<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $disciplina = $_POST['disciplina'];
    #
    $sql ="UPDATE `disiplina` SET `disiplina` = '$disciplina' WHERE `disiplina`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: disciplina.php");
    }

?>