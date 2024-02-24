<?php
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $sql ="INSERT INTO `usuario` (`nombre`, `usuario`, `pass`, `estado`, `nivel`) VALUES ( '$nombre', '$usuario', '$pass', '1', '1');;" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: usuarios.php");
    }

?>