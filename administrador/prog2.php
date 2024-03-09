<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    $sql_dato = "SELECT `nombres` FROM `profesor` WHERE `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    #
    $sql ="UPDATE `profesor` SET `nombres` = '$nombre', `usuario` = '$usuario', `pass` = '$pass', `correo` = '$correo' WHERE `profesor`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: profesor.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se modifico los valores del profesor con  Nombre:". $row_dato['nombres'] );
    #cerramos la funcion
    $log->close();

?>