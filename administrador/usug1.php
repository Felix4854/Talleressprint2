<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $sql_usu = "SELECT COUNT(*) AS `num` FROM `usuario` WHERE `nombre`='$nombre' OR `usuario`='$usuario';";
    $query_usu= mysqli_query($con, $sql_usu);
    $row_usu = mysqli_fetch_array($query_usu);
    if($row_usu['num'] > 0 ){
        header("location: usuario1.php?r=1");
    }else{
        $sql ="INSERT INTO `usuario` (`nombre`, `usuario`, `pass`, `estado`, `nivel`) VALUES ( '$nombre', '$usuario', '$pass', '1', '1');" ;
        $query = mysqli_query($con, $sql);        
        if ($query){
        header("location: usuarios.php");
        }
    } 
    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "creo un nuevo usuario: ".$nombre);
    #cerramos la funcion
    $log->close();

?>