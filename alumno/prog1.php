<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    #
    $sql ="INSERT INTO `profesor` (`nombres`, `usuario`, `pass`, `estado`, `correo`) VALUES ('$nombre', '$usuario', '$pass', '1', '$correo');" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: profesor.php");
    }

?>