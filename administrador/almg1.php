<?php
    session_start();
# llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamada al archivo
    require('log.php');
    #creamos y accedemos al archivo
    $log = new Log("log.txt");
    
    #llamamos a todos los datos la tabla usuarios
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $sql_alm = "SELECT count(*) AS  `num` FROM `alumno` WHERE  `correo`='$correo' OR `nombres`='$nombre' OR `dni`='$dni'";
    $query_alm = mysqli_query($con, $sql_alm);
    $row_alm = mysqli_fetch_array($query_alm);
    if($row_alm['num']>0){        
        #enviamos mensaje de error
        $log->writeLine("usuario: ".$_SESSION['us_nm']."][Error", "no se registro el nuevo  alumno por que ya existen registros con DNI:".$dni.", Nombre:".$nombre .", Correo: ".$correo);
        header("location: alumno1.php?r=1");
        
    }else{
        $sql ="INSERT INTO `alumno` (`nombres`, `usuario`, `pass`, `dni`, `correo`, `estado`) VALUES ('$nombre', '$usuario', '$pass', '$dni', '$correo','1');" ;
        $query = mysqli_query($con, $sql);
        #enviamos mensaje de error
        $log->writeLine("[usuario: ".$_SESSION['us_nm']."][Informacion", "se agrego el alumno con DNI:".$dni.", Nombre:".$nombre .", Correo: ".$correo);
        header("location: alumnos.php?r=0");
      
        
    }
    #cerrando funcion de log
    $log->close();

?>