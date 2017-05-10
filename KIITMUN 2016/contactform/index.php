<?php
include '../portal/core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KIITMUN | Contact Form</title>
	<script  src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
	<!--[if IE]><script>
	$(document).ready(function() { 

$("#form_wrap").addClass('hide');

})

</script><![endif]-->

<style>


body, div, h1,h2, form, fieldset, input, textarea, footer,p {
	margin: 0; padding: 0; border: 0; outline: none;
}



body {color: #fff;
    background: rgba(0,0,0, 0.2) url("images/bg.jpg") no-repeat center center fixed;
	-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/bg.jpg', sizingMethod='scale');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/bg.jpg', sizingMethod='scale')";}
p { font-size:24px;}
#wrap {width:530px; margin:20px auto 0; height:1000px;}
h1 {margin-bottom:20px; text-align:center;font-size:48px;  }


	#form_wrap { overflow:hidden; height:446px; position:relative; top:0px;
		-webkit-transition: all 1s ease-in-out .3s;
		-moz-transition: all 1s ease-in-out .3s;
		-o-transition: all 1s ease-in-out .3s;
		transition: all 1s ease-in-out .3s;}
	
	#form_wrap:before {content:"";
		position:absolute;
		bottom:128px;left:0px;
		background:url('images/before.png');
		width:530px;height: 316px;}
	
	#form_wrap:after {content:"";position:absolute;
		bottom:0px;left:0;
		background:url('images/after.png');
		width:530px;height: 260px; }

	#form_wrap.hide:after, #form_wrap.hide:before {display:none; }
	#form_wrap:hover {height:776px;top:-200px;}


	form {background:#f7f2ec url('images/letter_bg.png'); 
		position:relative;top:200px;overflow:hidden;
		height:200px;width:400px;margin:0px auto;padding:20px; 
		border: 1px solid #fff;
		border-radius: 3px; 
		-moz-border-radius: 3px; -webkit-border-radius: 3px;
		box-shadow: 0px 0px 3px #9d9d9d, inset 0px 0px 27px #fff;
		-moz-box-shadow: 0px 0px 3px #9d9d9d, inset 0px 0px 14px #fff;
		-webkit-box-shadow: 0px 0px 3px #9d9d9d, inset 0px 0px 27px #fff;
		-webkit-transition: all 1s ease-in-out .3s;
		-moz-transition: all 1s ease-in-out .3s;
		-o-transition: all 1s ease-in-out .3s;
		transition: all 1s ease-in-out .3s;}


		#form_wrap:hover form {height:530px;}

		label {
			margin: 11px 20px 0 0; 
			font-size: 16px; color: #b3aba1;
			text-transform: uppercase; 
			text-shadow: 0px 1px 0px #fff;
		}

		input[type=text], textarea {
			font: 14px normal normal uppercase helvetica, arial, serif;
			color: #7c7873;background:none;
			width: 380px; height: 36px; padding: 0px 10px; margin: 0 0 10px 0;
			border:1px solid #f8f5f1;
			-moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;
			-moz-box-shadow: inset 0px 0px 1px #726959;
			-webkit-box-shadow:  inset 0px 0px 1px #b3a895; 
			box-shadow:  inset 0px 0px 1px #b3a895;
		}	

		textarea { height: 80px; padding-top:14px;}

		textarea:focus, input[type=text]:focus {background:rgba(255,255,255,.35);}

		#form_wrap input[type=submit] {
			position:relative;font-family: 'YanoneKaffeesatzRegular'; 
			font-size:24px; color: #7c7873;text-shadow:0 1px 0 #fff;
			width:100%; text-align:center;opacity:0;
			background:none;
			cursor: pointer;
			-moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; 
			-webkit-transition: opacity .6s ease-in-out 0s;
			-moz-transition: opacity .6s ease-in-out 0s;
			-o-transition: opacity .6s ease-in-out 0s;
			transition: opacity .6s ease-in-out 0s;
		}

		#form_wrap:hover input[type=submit] {z-index:1;opacity:1;
			-webkit-transition: opacity .5s ease-in-out 1.3s;
			-moz-transition: opacity .5s ease-in-out 1.3s;
			-o-transition: opacity .5s ease-in-out 1.3s;
			transition: opacity .5s ease-in-out 1.3s;}

			#form_wrap:hover input:hover[type=submit] {color:#435c70;}

</style>
</head>
<body>
	<div id="wrap">
		<h1 style="text-align: center;">Send a message</h1>
		<p id="error" style="color: red; text-align: center;"></p>
		<div id='form_wrap'>
			<form method="POST" action="">
				<p style="color:#212121;">Hello KEMUN,</p>
				<label for="email" style="color:#455a64;">Your Message : </label>
				<textarea  name="message" value="Your Message" id="message" required><?php
				if (isset($_POST['message'])) {
					echo form_input($_POST['message']);
				}
				?></textarea>
				<p style="color:#212121;">Best,</p>	
				<label for="name" style="color:#455a64;">Name: </label>
				<input type="text" name="name" id="name" value ="<?php 
	  					if (isset($_POST['name'])) {
	  						echo form_input($_POST['name']);
	  					}
	  					?>" required/>
				<label for="email" style="color:#455a64;">Email: </label>
				<input type="text" name="email" id="email" value="<?php
				if (isset($_POST['email'])) {
					echo form_input($_POST['email']);
				}
				?>" required/>
				<input type="submit" name ="submit" value="Now, I send, thanks!" />
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$errors = 0;
	$arr[] = array();
	if (isset($_POST['name']) && !empty($_POST['name'])) {
			$name = $_POST['name'];
			$name = form_input($name);
			if (validate_name($name)) {
				array_push($arr, $name);
				$array[0] = $name;
			}else{
				echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Only letters and white space allowed in name';</script>";
$errors++;
}

}
else
{
    echo
    "<script type='text/javascript'>document.getElementById('error').innerHTML='Please fill in your name';</script>";
$errors++;
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
$useremail = $_POST['email'];
$useremail = form_input($useremail);

if (validate_email(form_input($useremail))) {

array_push($arr, $useremail);
$array[1] = $useremail;
}
else{
echo "
<script type='text/javascript'>document.getElementById('error').innerHTML = '<br>Please check your email format';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('error').innerHTML = '<br>Please fill in your email';</script>";
$errors++;
}
if (isset($_POST['message']) && !empty($_POST['message'])) {
$useraddress = $_POST['message'];
$useraddress = form_input($useraddress);
array_push($arr, $useraddress);
$array[2] = $useraddress;
}
else{
echo "
<script type='text/javascript'>document.getElementById('error').innerHTML = 'Message cannot be empty';</script>";
$errors++;
}
if ($errors == 0) {
	add_ques($array);
}
			}
			?>
		</div>
	</div>
</body>
</html>