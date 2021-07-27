<?php
spl_autoload_register(function ($class_name) {
	require_once $class_name . '.class.php';
});

class DBManager
{
	private $db;

	function __construct()
	{
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "";
		$dbname = "cms";

		try {
			$this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (Exception $e) {
			die("Database connection error<br> " . $e->getMessage());
		}
	}

	public function getDb(){
    	return $this->db;
    }
}
