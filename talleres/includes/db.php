<?php

$host = "localhost";
$user = "administrador";
$password = "40899869";
$database = "bd_talleres";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la basa de datos, el error fue:";
mysqli_connect_error() ;


}



?>