<?php
    session_start();
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $aula = $_POST['aula'];
    
    $sql_dato = "SELECT `detalle` FROM `aula` WHERE `id` = $id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    $sql ="UPDATE `aula` SET `detalle` = '$aula' WHERE `aula`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: aula.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se edito los valores del ubicacion: ".$row_dato['detalle']." por ".$aula);    
    #cerramos la funcion
    $log->close();
?>