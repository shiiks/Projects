<?php

require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txt_uname']);
	$umail = trim($_POST['txt_umail']);
	$upass = trim($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($fname,$lname,$uname,$umail,$upass))	{
					
					$email_message = "";
					$email_message .= "Dear ".$uname.",\n\n"; //dear name,
					$email_message .= "Thank You for registering with us.\nYour Password is : ".$upass."\n";
					$email_message .= "You will require this password to login.\n";
					$email_message .= "Now u can see notices in just one click online!\n\n";
					$email_message .= "Regards\n";
					$email_message .= "Team E-notice board\n";
					
					$to = $umail ;
					$subject = "Password Verification";
					$headers = "From: E-Notice Board <contact@picgyan.com>\r\n";
					$headers .= "Reply-To: shikharsaran.sss@gmail.com \r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=iso-8859-1" . "\r\n";


					 if( (mail($to, $subject, $email_message, $headers,"-f shikharsaran.sss@gamil.com")))
					{
						$msg = 'Register with password to access your<br/>Account.';
						?>
						<script>
							alert("Please check your email id for password, to sign in.\nCheck your spam folder in case you don\'t find any mail from us in your inbox.\n");
						</script>
						<?php
						$user->redirect('sign-up.php?joined');
					}
				}
				else
				{
					$msg ="Your account is already active, no need to activate again";
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="icon" href="../img/Noticeboardlogo.jpg" type="image/jpg" sizes="16x16">
<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="">
  <meta name="apple-mobile-web-app-title" content="E-notice Board">
  <meta name="theme-color" content="#f05f40">

<meta name="msapplication-navbutton-color" content="#f05f40">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#f05f40">
<meta name="apple-mobile-web-app-status-bar-style" content="#f05f40">
  <link rel="apple-touch-icon" href="../img/Noticeboardlogo.jpg">
  <meta name="msapplication-TileImage" content="../img/Noticeboardlogo.jpg">
  <meta name="msapplication-TileColor" content="#f05f40">
</head>
<body oncontextmenu="return false">
<div class="container">
    	<div class="form-container">
        <form method="post">
            <h2>Sign up.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>

</body>
</html>