<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $aula = $_POST['aula'];
    #
    $sql ="INSERT INTO `aula` (`detalle`, `estado`) VALUES ( '$aula', '1');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: aula.php");
    }

?>