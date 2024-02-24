<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $disciplina = $_POST['disciplina'];
    #
    $sql ="INSERT INTO `disiplina` (`disiplina`, `estado`) VALUES ('$disciplina', '1');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: disciplina.php");
    }

?>