<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $id = $_GET['id'];
    $id_disciplina = $_POST['disciplina'];
    $id_profesor = $_POST['profesor'];
    $ubicacion = $_POST['ubicacion'];
    $taller = $_POST['taller'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $ingreso = $_POST['ingreso'];
    $salida = $_POST['salida'];   
    
    //obteniendo valores
    $sql_dato = "SELECT `taller` FROM `taller` WHERE `id`=$id ";
    $query_dato = mysqli_query($con, $sql_dato);
    $row_dato = mysqli_fetch_array($query_dato);

    $sql ="UPDATE `taller` SET `disiplina_id` = '$id_disciplina', `profesor_id` = '$id_profesor',`aula_id` = '$ubicacion', `taller` = '$taller', `inicio` = '$inicio', `fin` = '$fin', `ingreso` = '$ingreso', `salida` = '$salida' WHERE `taller`.`id` = '$id';" ;
    $query = mysqli_query($con, $sql);

    if ($query){
    	header("location: talleres.php");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se modifico los valores del taller: ". $row_dato['taller'] );
    #cerramos la funcion
    $log->close();
?>