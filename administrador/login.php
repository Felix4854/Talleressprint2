<?php
# llamamos al archivo de conexion 
    session_start();
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #llamamos a todos los datos la tabla usuarios
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
   
	$sql_inscritos="SELECT count(*) AS `num` FROM `usuario` WHERE `usuario`='$usuario' AND `pass`='$pass'";
    $query_ins = mysqli_query($con , $sql_inscritos);
    $rows_ins = mysqli_fetch_array($query_ins); 
    
    if( $rows_ins['num'] != 0 ){	    

	    $sql ="SELECT `id`, `nombre`  FROM `usuario` WHERE `usuario`='$usuario' AND `pass`='$pass'" ;
	    $query = mysqli_query($con, $sql);
	    $row_usuario = mysqli_fetch_array($query);        
	    $_SESSION['us_id'] = $row_usuario['id'];
        $_SESSION['us_nm'] = $row_usuario['nombre'];
        $log->writeLine("Información", "el usuario ".$row_usuario['nombre']." inicio sesion.");
	    header("location: principal.php");
	}else{
        $log->writeLine("Error", "no pudo inciar sesion con nombre de usuario: ".$usuario." porque el nombre de usuario o contraseña son incorrectos.");
    	header("location: index.php?r=1");
    }
    #cerramos la funcion
    $log->close();
?>