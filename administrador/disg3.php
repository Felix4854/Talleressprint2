<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
 	$id = $_GET['id'];
    
    $sql_dato = "SELECT `disiplina` FROM `disiplina` WHERE `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    $sql ="UPDATE `disiplina` SET `estado` = '0' WHERE `disiplina`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: disciplina.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se elimino la disciplina: ".$row_dato['disiplina']);    
    #cerramos la funcion
    $log->close();

?>