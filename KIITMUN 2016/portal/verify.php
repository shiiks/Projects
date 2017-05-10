<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];

	$statusY = "Y";
	$statusN = "N";

	$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();

			$msg = "
		           <div class='alert alert-success' style='color:#f0f0f0;''>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='index.php' style='color:#f0f0f0;'>Login here</a>
			       </div>
			       ";
		}
		else
		{
			$msg = "
		           <div class='alert alert-error' style='color:#f0f0f0;'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>sorry !</strong>  Your Account is allready Activated : <a href='index.php' style='color:#f0f0f0;'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error' style='color:#f0f0f0;'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>sorry !</strong>  No Account Found : <a href='signup.php' style='color:#f0f0f0;'>Signup here</a>
			   </div>
			   ";
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Confirm Registration | KIITMUN 2016</title>
    <!-- Bootstrap -->
		<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
		<meta name="google-site-verification" content="vnJXae1QIiQ2o83fbX68kFnV26PFb1qObYY6iCNJ_iI" />
        <meta name="title" content="KIIT INTERNATIONAL MUN 2016">
<meta name="description" content="The official website of KIITMUN INTL MUN 2016">
<meta name="keywords" content="kiitmun,kiit international mun,MUN,Bhubaneswar,MUN, Bhubaneswar, mun, bhubaneswar, Councils,UNGA,UNHRC,UNSC, UNODC,Marvel,KiiT ,Model,United,Nations, KiiT,kiit,mun">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<link rel="shortcut icon" href="assets/images/favicon.png">
<!-- KIITMUN,KIIT,MUN -->
<meta property="og:url" content="http://www.kiitmun.org"/>
<meta property="og:title" content="KIIT INTERNATIONAL MUN 2016"/>
<meta property="og:image" content="http://www.kiitmun.org/img/4.jpg"/>
<meta property="og:site_name" content="KIIT INTERNATIONAL MUN 2016 "/>
<meta property="og:description" content="To be held this autumn, KIIT International Model UN 2016 shall be the fourth edition of one of the world's largest MUNs. Hosted by KIIT University in Bhubaneswar, better known as the temple city in India, KIIT Intl MUN is considered to be one of the most loved conferences in India and invites applications from Class 9 onwards to Post Graduate students in committees of varying difficulties and topics."/>

		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="assets/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/set1.css" />
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<!--<link rel="stylesheet" type="text/css" href="assets/default.css" />-->
		<link rel="stylesheet" type="text/css" href="assets/component.css" />
		<script src="assets/modernizr.custom.js"></script>
		<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="KIITMUN 2016">
  <meta name="theme-color" content="#000">
<meta name="msapplication-navbutton-color" content="#000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000">
  <meta name="msapplication-TileColor" content="#000">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style type="text/css">
    	body{
    		 color: #fff;
    background: rgba(0,0,0, 0.2) url("delegate-form/img/bg.jpg") no-repeat center center fixed;
	-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../img/bg.jpg', sizingMethod='scale');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../img/bg.jpg', sizingMethod='scale')";
    	}

    </style>

  </head>
  <body id="login" oncontextmenu="return false">
    <div class="container">
		<?php if(isset($msg)) { echo $msg; } ?>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
