<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
	
require_once 'class.user.php';
require_once 'class.receivers.php';

$user_login = new USER();
$receivers_login = new RECEIVERS();

//For Checking user is logged in or not
if($user_login->is_logged_in()!="")
{
	$user_login->redirect('blood_info.php');
}
else if($receivers_login->is_logged_in()!="")
{
	$receivers_login->redirect('available_blood_sample.php');
}

//After the button is clicked
if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);

	$stmt = $user_login->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$stmt2 = $receivers_login->runQuery("SELECT * FROM tbl_receivers WHERE userEmail=:email_id");
	$stmt2->execute(array(":email_id"=>$email));
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		if($user_login->login($email,$upass))
		{
			//$_SESSION['hosorrec']=$user_login->sayit();
			$_SESSION['hosorrec']=$email;// This is checking of if Hospitals is trying to login or Receivers
			$user_login->redirect('blood_info.php');
		}
	}
	else if($stmt2->rowCount() > 0){
		if($receivers_login->login($email,$upass)){
			//$_SESSION['hosorrec']=$user_login->sayit();
			$_SESSION['hosorrec']=$email;// This is checking of if Hospitals is trying to login or Receivers
			$receivers_login->redirect('available_blood_sample.php');
		}
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login | Blood Bank System</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
			</div>
            <?php
		}
		?>
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Details!</strong> 
			</div>
            <?php
		}
		?>
        <h2 class="form-signin-heading">Sign In</h2><hr />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-login">Sign in</button>
		<a href="available_blood_sample.php" style="float:right;" class="btn btn-medium">Available Blood Sample</a><hr />
        <a href="signup.php" style="float:right;" class="btn btn-large">Sign Up for Hospitals</a>

        <a href="fpass.php">Lost your Password ? (Hospitals)</a><hr />
		        <a href="signup_receivers.php" style="float:right;" class="btn btn-large">Sign Up for Receivers</a>
        <a href="fpass_receivers.php">Lost your Password ? (Receivers) </a>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  <script>
         $(document).keydown(function(event){
             if(event.keyCode==123){
             return false;
            }
         else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
               return false;  //Prevent from ctrl+shift+i
            }
         });
         $(document).on("contextmenu",function(e){        
         	   e.preventDefault();
         	});
      </script>
</html>