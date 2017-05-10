<?php
class ADMIN
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function register($uname,$umail,$upass,$admin_master)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			if($admin_master =='adminisawesome')
			{
				$stmt = $this->db->prepare("INSERT INTO admin(user_name,user_email,user_pass)
														   VALUES(:uname, :umail, :upass)");

				$stmt->bindparam(":uname", $uname);
				$stmt->bindparam(":umail", $umail);
				$stmt->bindparam(":upass", $new_password);

				$stmt->execute();

				return $stmt;
			}
			else
			{
				?>
				<script>
				alert("wrong master code.");
				</script>
				<?php
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function login($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM admin WHERE user_name=:uname OR user_email=:umail LIMIT 1");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_name'] = $adminRow['user_name'];
			if($stmt->rowCount() > 0)
			{
				if(password_verify($upass, $adminRow['user_pass']))
				{
					$_SESSION['user_session'] = $adminRow['user_id'];

					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
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
		unset($_SESSION['user_session']);
		unset($_SESSION['user_name']);
		return true;
	}
}
?>
