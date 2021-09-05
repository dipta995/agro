<?php
define("HOST_NAME", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DATABASE", "project_data");

class DBconnection{
	public $name 	= HOST_NAME;
	public $user 	= USER_NAME;
	public $pass 	= PASSWORD;
	public $datab 	= DATABASE;
	public $con;
	public $error;

	public function connectDataBase(){
		$this->con = new mysqli($this->name, $this->user, $this->pass, $this->datab);
		if ($this->con == false) {
			$this->error = "Connection fail".$this->con->connect_error;
		}
	}
}

?>