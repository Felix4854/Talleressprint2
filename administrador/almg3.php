<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];   
    //lo datos del alumno
    $sql_dato = "SELECT `nombres` FROM `alumno` WHERE  `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se elimino el alumno: ".$row_dato['nombres']);
    $sql ="UPDATE `alumno` SET `estado` = '0' WHERE `alumno`.`id` = '$id'" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: alumnos.php");
    }
    #cerramos la funcion
    $log->close();

?>