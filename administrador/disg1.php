<?php
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    #llamamos a todos los datos la tabla usuarios    
    $disciplina = $_POST['disciplina'];

    // Consulta SQL para verificar si el nombre o correo ya existen en la tabla
    $sql_disciplina = "SELECT  COUNT(*) AS `num` FROM `disiplina` WHERE `disiplina`='$disciplina' AND `estado`= 1 ";
    $query_disciplina = mysqli_query($con, $sql_disciplina);
    $row_disciplina = mysqli_fetch_assoc($query_disciplina);

    // Verificamos si el nombre o correo ya existen en la base de datos
    if ($row_disciplina['num'] > 0) {

        header("location: disciplina1.php?r=1");
    }else{
        $sql ="INSERT INTO `disiplina` (`disiplina`, `estado`) VALUES ('$disciplina', '1');" ;
        $query = mysqli_query($con, $sql);

        header("location: disciplina.php?r=1");
    }

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se agrego la nueva disciplina: ".$disciplina);    
    #cerramos la funcion
    $log->close();

?>