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
					$email_message .= "We hope to see you in March!\n\n";
					$email_message .= "Regards\n";
					$email_message .= "CELT 2016\n";
					
					$to = $umail ;
					$subject = "Password Verification";
					$headers = "From: CELT 2016 <celtindia@celtindia.org>\r\n";
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
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('metaheader.php');?>

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/style1.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set2.css" />
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
<link rel="stylesheet" href="css/mains.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</head>
<body>
<div id="wrap"> 
  
  <!-- Header -->
  <header> 
    <?php include('header.php');?>
  </header>
  <!-- Header End --> 
  
  <!--======= HOME MAIN SLIDER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.3">
    <div class="overlay-gr">
      <div class="container">
        <h2>Sign Up / Sign In</h2>
        <p>Sign Up If U Don't Have A Account</p>
      </div>
    </div>
  </section>
  
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li><a href="http://www.celtindia.org/index.php">Home</a></li>
    <li class="active">Apply</li>
    <li class="active">Sign Up</li>
  </ol>
  
   <div class="content"> 
      <section class="sec-100px history" style="background:#FFFFFF;">
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
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                 </div>
                 <?php
			}
			?>
			<section class="content bgcolor-1">
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="txt_uname" type="text" id="input-1" value="<?php if(isset($error)){echo $uname;}?>" />
					<label class="input__label input__label--nao" for="input-1">
						<span class="input__label-content input__label-content--nao">Enter Username</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>			
		
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="txt_umail" type="email" id="input-2" value="<?php if(isset($error)){echo $umail;}?>" />
					<label class="input__label input__label--nao" for="input-2">
						<span class="input__label-content input__label-content--nao">Enter E-Mail ID</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="txt_upass" type="password" id="input-3" required />
					<label class="input__label input__label--nao" for="input-3">
						<span class="input__label-content input__label-content--nao">Enter Password</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
			<section>
            
            <div class="clearfix"></div><hr />
			
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup" style="text-align:center;width:auto;>
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
    
			</div>
            <br />
            <p style="color:black;">have an account ! <a href="index.php">Sign In</a></p>
        </form>
       </div>
</div>
</section>
</div>
<footer>
   <?php include 'footer.php' ?>
  </footer>
</div>
<!-- Wrap End --> 

<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.stellar.min.js"></script> 
<script src="js/jquery.magnific-popup.min.html"></script> 
<script src="js/smooth-scroll.js"></script> 
<script src="js/jquery.isotope.min.html"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/main1.js"></script> 
<script src="js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
</body>
</html>