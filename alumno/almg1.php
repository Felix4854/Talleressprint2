<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    #
    $sql ="INSERT INTO `alumno` (`nombres`, `usuario`, `pass`, `dni`, `correo`, `estado`) VALUES ('$nombre', '$usuario', '$pass', '$dni', '$correo','1');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: alumnos.php");
    }

?>