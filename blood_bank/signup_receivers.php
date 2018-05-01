<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
require_once 'class.receivers.php';

$reg_user = new RECEIVERS();

//To check if user is logged in or not
if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('available_blood_sample.php');
}

//After the button is clicked
if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$blood_group= trim($_POST['txtblood']);
	$code = md5(uniqid(rand()));//Generating a unique Random number
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_receivers WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$blood_group,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to Blood Bank System!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/blood_bank/verify_receivers.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";//email content
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup | Blood Bank System</title>
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
				<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
			<select class="input-block-level" name="txtblood" selected="1" required>
			  <option value="">Select Blood Group</option>
			  <option value="A+">A+</option>
			  <option value="A-">A-</option>
			  <option value="B+">B+</option>
			  <option value="B-">B-</option>
			  <option value="O+">O+</option>
			  <option value="O-">O-</option>
			  <option value="AB+">AB+</option>
			  <option value="AB-">AB-</option>
			</select>

     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
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