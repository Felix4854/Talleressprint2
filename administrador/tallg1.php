<?php
session_start();
# llamamos al archivo de conexion 
include('conexion.php');

# instanciamos los parametros de conexion
$con = connection();

# Recuperamos los datos del formulario
$id_disciplina = $_POST['disciplina'];
$id_profesor = $_POST['profesor'];
$taller = $_POST['taller'];
$ubicacion = $_POST['ubicacion'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$ingreso = $_POST['ingreso'];
$salida = $_POST['salida'];
#consulta si existe un taller con el nombre que se ingreso
$sql_taller = "SELECT count(*) AS `num` FROM `taller` WHERE `taller`='$taller';";
$sql_query_taller = mysqli_query($con, $sql_taller);
$row_taller = mysqli_fetch_array($sql_query_taller);
#erro 1 - nombre del taller duplicado
if($row_taller['num'] > 0 ){
	$r1 = 1;
}else{
	$r1 = 0;
}
#error 2 -  Verificamos si la fecha de fin es posterior a la fecha de inicio
if ($fin < $inicio) {
    # Si la fecha de fin es anterior a la fecha de inicio, redirigimos con un mensaje de error    
    $r2 = 1;
}else{
	$r2 = 0;
}
#error 3 - verificar que la hora de ingreso no sea mayor a la hora de salida
if($salida < $ingreso ){
	$r3 = 1;
}else{
	$r3 = 0;
}
#evaluando los errores para proceder al registro
if ($r1 == 1 OR $r2 == 1 OR $r3 == 1){
	header("location: taller1.php?r1=".$r1."&r2=".$r2."&r3=".$r3);
}else{
	# Realizamos la inserción en la base de datos
	$sql = "INSERT INTO `taller` (`disiplina_id`, `profesor_id`, `aula_id`, `taller`, `inicio`, `fin`, `estado`, `ingreso`, `salida`) VALUES ('$id_disciplina', '$id_profesor', '$ubicacion', '$taller', '$inicio', '$fin', '1', '$ingreso', '$salida')";
	$query = mysqli_query($con, $sql);
	header("location: talleres.php");
}

	#llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "se creo un nuevo taller con el nombre: ". $taller );
    #cerramos la funcion
    $log->close();
?>