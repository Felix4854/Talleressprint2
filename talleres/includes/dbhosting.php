<?php

$host = "localhost";
$user = "medicalpc_admin";
$password = "1O4o8998692*";
$database = "medicalpc_medicina";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la basa de datos, el error fue:";
mysqli_connect_error() ;


}



?>