<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
require_once 'class.receivers.php';
$user = new RECEIVERS();

//For Checking user is logged in or not
if($user->is_logged_in()!="")
{
	$user->redirect('request.php');
}

//After the button is clicked
if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM tbl_receivers WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);//encoding the userid
		$code = md5(uniqid(rand())); //a unique random number
		
		$stmt = $user->runQuery("UPDATE tbl_receivers SET tokenCode=:token WHERE userEmail=:email");//updating the tokencode to Y
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='http://localhost/blood_bank/resetpass_receivers.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				   "; //email content
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Forgot Password</h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
                <?php
			}
			?>
        
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
     	<hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generate new Password</button>
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