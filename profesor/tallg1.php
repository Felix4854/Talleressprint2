<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id_disciplina = $_POST['disciplina'];
    $id_profesor = $_POST['profesor'];
    $taller = $_POST['taller'];
    $ubicacion = $_POST['ubicacion'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $ingreso = $_POST['ingreso'];
    $salida = $_POST['salida'];   
    
    $sql ="INSERT INTO `taller` (`disiplina_id`, `profesor_id`,`aula_id`, `taller`, `inicio`, `fin`, `estado`, `ingreso`, `salida`) VALUES ('$id_disciplina', '$id_profesor','$ubicacion', '$taller', '$inicio', '$fin', '1', '$ingreso', '$salida');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: talleres.php");
    }

?>