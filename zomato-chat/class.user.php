<?php

require_once 'dbconfig.php';

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function is_logged_in()
	{
	
		if(isset($_SESSION['user']))
		{
			return true;
		}
	}
	
	public function login($names){
		 $sql=$this->conn->prepare("SELECT name FROM chatters WHERE name=?");
		 $sql->execute(array($names));
		 if($sql->rowCount()!=0){
		  $ermsg="<h2 class='error'>Name Taken. <a href='index.php'>Try another Name.</a></h2>";
		  return $ermsg;
		 }else{
		  $sql=$this->conn->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
		  $sql->execute(array($names));
		  $_SESSION['user']=$names;
		 }
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	

	public function logout()
	{
		$sql=$this->conn->prepare("DELETE FROM chatters WHERE name=?");
		$sql->execute(array($_SESSION['user']));
		session_destroy();
	}

	
}