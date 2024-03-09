<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $sql_dato = "SELECT `nombre` FROM `usuario` WHERE `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);
    

    $sql ="UPDATE `usuario` SET `nombre` = '$nombre', `usuario` = '$usuario', `pass` = '$pass' WHERE `usuario`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: usuarios.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se edito la información del usuario: ".$row_dato['nombre']. " ingresando los valores: Nombre: ".$nombre. ", Usuario: ".$usuario  );
    #cerramos la funcion
    $log->close();

?>