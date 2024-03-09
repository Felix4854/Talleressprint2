<?php
    session_start();
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $aula = $_POST['aula'];
    
    $sql_ubicacion = "SELECT count(*) AS `num` FROM `aula` WHERE `detalle`='$aula';";
    $sql_query_ubicacion = mysqli_query($con, $sql_ubicacion);
    $row_ubicacion = mysqli_fetch_array($sql_query_ubicacion);
    #erro 1 - nombre del ubicacion duplicado
    if($row_ubicacion['num'] > 0 ){
        header("location: aula1.php?r=1");
    }else{
        $sql ="INSERT INTO `aula` (`detalle`, `estado`) VALUES ( '$aula', '1');" ;
        $query = mysqli_query($con, $sql);
        header("location: aula.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "creo una nueva ubicacion : ".$aula);    
    #cerramos la funcion
    $log->close();

?>