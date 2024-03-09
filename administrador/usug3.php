<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];

    //obteniendo el nombre del usuario
    $sql_dato = "SELECT `nombre` FROM `usuario` WHERE `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    $sql ="DELETE FROM `usuario` WHERE `usuario`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: usuarios.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se elimino el usuario: ".$row_dato['nombre'] );
    #cerramos la funcion
    $log->close();

?>