<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

require_once 'dbconfig.php';

class RECEIVERS
{	

	private $conn;
	
	//Database Connection call
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	//Preparing the statement
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	//For checking RECEIVERS or Hospitals
	public function sayit(){
		echo "RECEIVERS";
	}
	
	//last inserted id
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	//Registration
	public function register($uname,$email,$blood_group,$upass,$code)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_receivers(userName,userEmail,userBlood,userPass,tokenCode) 
			                                             VALUES(:user_name, :user_mail, :user_blood, :user_pass, :active_code)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_blood",$blood_group);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	//Requesting the blood
	public function request($id,$name,$gender,$age,$mobno,$blood_type,$email,$details)
	{
		try
		{							
			
			$stmt = $this->conn->prepare("INSERT INTO requested_blood(id,name,gender,age,mobno,blood_type,email,details) 
			                                             VALUES(:id, :name, :gender, :age, :mobno, :blood_type, :email, :details)");
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":name",$name);
			$stmt->bindparam(":gender",$gender);
			$stmt->bindparam(":age",$age);
			$stmt->bindparam(":mobno",$mobno);
			$stmt->bindparam(":blood_type",$blood_type);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":details",$details);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	//Login
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_receivers WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	//Session checking
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	
	//Mail
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();      
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 80;             
		$mail->AddAddress($email);
		$mail->Username="shikharsaran.sss@gmail.com";  
		$mail->Password="Sixdots6";            
		$mail->SetFrom('shikharsaran.sss@gmail.com','Blood Bank System');
		$mail->AddReplyTo("shikharsaran.sss@gmail.com","Blood Bank System");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();

	}	
}