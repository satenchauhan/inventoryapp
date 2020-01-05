<?php 



class Database
{
	private $dbcon;

	public function connect(){
		include_once("config.php");
		$this->dbcon = new Mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
		if($this->dbcon){
			return $this->dbcon;

			//echo "Connected.............";
		}
		return "Database connection failed ???";
	}

}

$db = new Database();

$db->connect();