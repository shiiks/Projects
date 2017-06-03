<?php
ini_set("display_errors","on");
class Database
{

    private $host = "localhost";
    private $db_name = "zomato_test";
    private $username = "root";
    private $password = "";
    public $conn;
      
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
			date_default_timezone_set("UTC"); //Asia/kolkata not working
			include("user_online.php");
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
          
        return $this->conn;
    }

}
?>