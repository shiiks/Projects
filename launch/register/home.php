<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('register/index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE>
<html>
<head>
<?php include('metaheader.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
 
<!-- Page Wrap -->
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
        <h2>Dashboard</h2>
        <p>Welcome</p>
      </div>
    </div>
  </section>
  
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Apply</li>
    <li class="active">Dashboard</li>
  </ol>
  
   
  <!-- CONTENT START -->
  <div class="content"> 
      <section class="sec-100px history" style="background:#FFFFFF;">
      <div class="container">
	  
	  <h4>welcome : <?php print($userRow['user_name']); ?></h4>
		<i class="glyphicon glyphicon-hand-right">&nbsp <a href="register/celt_form.php">Apply For CELT 2016 here.</a></i><br /><br />
		<i class="glyphicon glyphicon-hand-right">&nbsp <a href="register/ambassdor_form.php">Apply For Concalve Campus Ambassador here.</a></i><br /><br />
		<i class="glyphicon glyphicon-hand-right">&nbsp <a href="register/investor_form1.php">Apply For Investor Pitch here.</a></i><br /><br />
		<i class="glyphicon glyphicon-hand-right">&nbsp <a href="http://interncamp.ecell.org.in">Apply For Internship Camp Click here.</a></i><br /><br />
		<label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
      </div>
    </section>
	</div>
  
  <!--======= Footer =========-->
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

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/main1.js"></script> 
</body>
</html>