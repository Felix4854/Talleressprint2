<?php
	function connection(){
		$host = "localhost";
		$user = "asistencia";
		$pass = "&3jkwH281";
		$bd = "admin_plhweb";
		$connect = mysqli_connect($host,$user,$pass);
		mysqli_select_db($connect, $bd);
		return $connect;
	}
?>