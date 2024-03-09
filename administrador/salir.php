<?php 
session_start();
	
	#llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "Cerro la sesion" );
    #cerramos la funcion
    $log->close();

	//eliminar los valores de sesion
	$_SESSION['us_id']="";
	$_SESSION['us_nm']="";
	header("location: index.php");

?>