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


?>