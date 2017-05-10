<?php
error_reporting(E_ALL ^ E_NOTICE);

if($_REQUEST['err'] == 5)
    $mes = "you have to login first";

else if($_REQUEST['err'] == 3)
    $mes = "Incorrect Username/Password, Try Again.";

else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Login Page</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<?php
include "scripts/validation.php";
?>
<form id="loginform" action="login.php" method="post" name="loginindex">
		<fieldset>
		
			<legend>Log in</legend>
			
			<label for="login">UserName</label>
			<input type="text" id="login" name="s_ad_username"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			<label for="remember_me" style="padding: 0;">Remember me?</label>
			<input type="checkbox" id="remember_me" style="position: relative; top: 3px; margin: 0; " name="remember_me"/>
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" name="login_submit" value="Log in" style="margin: -20px 0 0 287px;" class="button"   />	
		</fieldset>
	</form>
<script type='text/javascript'>
// <![CDATA[
var loginformValidator = new Validator("loginform");

loginformValidator.EnableOnPageErrorDisplay();
loginformValidator.SetMessageDisplayPos("right");

loginformValidator.EnableMsgsTogether();
loginformValidator.addValidation("s_ad_username","req","Please fill in username");
loginformValidator.addValidation("password","req","Please fill in password");
loginformValidator.addValidation("password","alnum","The input for password should be a valid alpha-numeric value");

// ]]>
</script>


	
</body>

</html>