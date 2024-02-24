<?php
# llamamos al archivo de conexion 
session_start();
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
	$sql_inscritos="SELECT count(*) AS `num` FROM `profesor` WHERE `usuario`='$usuario' AND `pass`='$pass'";
    $query_ins = mysqli_query($con , $sql_inscritos);
    $rows_ins = mysqli_fetch_array($query_ins); 
    
    if( $rows_ins['num'] != 0 ){
	    

	    $sql ="SELECT `id` FROM `profesor` WHERE `usuario`='$usuario' AND `pass`='$pass'" ;
	    $query = mysqli_query($con, $sql);
	    $row_usuario = mysqli_fetch_array($query);
	    $_SESSION['pr_id'] =  $row_usuario['id'];
	    header("location: principal.php");
	}else{    
    	header("location: index.php");
    }

?>

