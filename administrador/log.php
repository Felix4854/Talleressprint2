<?php 
	class log{
		private $fileLog;
		function __construct($path)
		{
			$this->fileLog = fopen($path, "a");
		}

		function writeLine($type , $mensaje)
		{
			date_default_timezone_set('America/Lima');
			$d = date("d-m-Y H:i:s");
			fputs($this->fileLog, "[".$d."][".$type."]: ".$mensaje . "\n");
		}

		function close()
		{
			fclose($this->fileLog);
		}
	}

	/*
	forma de llamar a la funcion  y almacenar la informacion en el archivo log
	#se crea el archivo para almacenar los datos
	#llamada al archivo
    require('log.php');
    #iniciando
	$log = new Log("log.txt");
	#se escribe en el archivo
	$log->writeLine("Error", "mensaje de error");
	$log->writeLine("Información", "mensaje de información");
	$log->writeLine("Warning", "mensaje de Warning");
	#cerramos la funcion
	$log->close();
	*/
?>