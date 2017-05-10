<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$delegate_form_applied=$row['delegate_form_applied'];
$press_form_applied=$row['press_form_applied'];
$email_id=$row['userEmail'];
$FullName=$row['FullName'];
$userName=$row['userName'];
if(isset($_POST['btn-add']) && !empty($_POST['btn-add']))
			{
				$phone=$_POST['phone'];
				$country_code=$_POST['country_code'];
				if($press_form_applied==1 && $delegate_form_applied==1)
				{
					$apllied_in="Delegate and International";
				}
				else if($press_form_applied==1)
				{
					$apllied_in="Ip";
				}
				else if($delegate_form_applied==1)
				{
					$apllied_in="Delegate";
				}
				$stmt6 = $user_home->runQuery("INSERT INTO phoneinfo(phone,email,country_code,apllied_in)
VALUES(:phone, :email_id, :country_code, :apllied_in)");
$stmt6->bindparam(":phone",$phone);
$stmt6->bindparam(":email_id",$email_id);
$stmt6->bindparam(":country_code",$country_code);
$stmt6->bindparam(":apllied_in",$apllied_in);
if($stmt6->execute()){
$user_home->redirect("home.php");
}
			}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="google-site-verification" content="vnJXae1QIiQ2o83fbX68kFnV26PFb1qObYY6iCNJ_iI"/>
    <meta name="title" content="KIIT INTERNATIONAL MUN 2016">
    <meta name="description" content="The official website of KIITMUN INTL MUN 2016">
    <meta name="keywords"
          content="kiitmun,kiit international mun,MUN,Bhubaneswar,MUN, Bhubaneswar, mun, bhubaneswar, Councils,UNGA,UNHRC,UNSC, UNODC,Marvel,KiiT ,Model,United,Nations, KiiT,kiit,mun">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <!-- KIITMUN,KIIT,MUN -->
    <meta property="og:url" content="http://www.kiitmun.org"/>
    <meta property="og:title" content="KIIT INTERNATIONAL MUN 2016 BETA"/>
    <meta property="og:image" content="http://www.kiitmun.org/img/4.jpg"/>
    <meta property="og:site_name" content="KIIT INTERNATIONAL MUN 2016 "/>
    <meta property="og:description"
          content="To be held this autumn, KIIT International Model UN 2016 shall be the fourth edition of one of the world's largest MUNs. Hosted by KIIT University in Bhubaneswar, better known as the temple city in India, KIIT Intl MUN is considered to be one of the most loved conferences in India and invites applications from Class 9 onwards to Post Graduate students in committees of varying difficulties and topics."/>

    <link rel="shortcut icon" href="assets/images/favicon.png">

    <title>KIITMUN 2016 Dashboard</title>

    <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

    <script src="assets/js/modernizr.min.js"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="KIITMUN 2016">
    <meta name="theme-color" content="#000">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <meta name="msapplication-TileColor" content="#000">

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="../../https@oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../../https@oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

</head>


<body oncontextmenu="return false">

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="../index.html" class="logo"><img style="margin-bottom:-6px;" src="small_logo.png"></img> <span>KIITMUN 2016 </span></a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li>
                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href="default.htm"><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    
                    <?php
                                                        $stmt = $user_home->runQuery('SELECT userPic FROM tbl_users
                    WHERE userID=:uid');
                    $stmt->execute(array(":uid"=>$_SESSION['userSession']));

                    if($stmt->rowCount() > 0)
                    {
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    extract($row);?>
                    <li class="dropdown user-box">
                        <a href="default.htm" class="dropdown-toggle waves-effect waves-light profile "
                           data-toggle="dropdown" aria-expanded="true">
                            <img src="<?php if(!$row['userPic']==''){ echo " user_images/";echo
                            $row['userPic'];}else{echo
                            "kameleon ong.png";}
                            ?>" alt="user-img" class="img-circle user-img">
                            <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                        </a>
                        <?php }} ?>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><i class="md md-face-unlock"></i> Profile</a></li>
                            <li><a href="home.php"><i class="md md-settings"></i> Dashboard</a></li>
                            <!--<li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
                            <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="active">
                        <a href="home.php"><i class="md md-home"></i> <span> Dashboard </span> </a>
                    </li>
                     <li class="active">
                        <a href="https://docs.google.com/spreadsheets/d/12gOPA0RGduOOK2ML42wKKjeTnjK_OsPdTwCijFLPMMU/edit?usp=sharing"><i class="fa fa-flag"></i><span> Country Matrix </span> </a>
                    </li>


                   
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Welcome <?php if(!$FullName==''){echo $FullName.",";}else{echo $userName.",";}?></h4>
            </div>
        </div>
        <!-- THIS WILL BE VISIBLE ONLY IF THERE IS NO EMAIL IN PHONEINFO DATABASE -->
        <?php
		$stmt9 = $user_home->runQuery("SELECT * FROM `phoneinfo` WHERE email=:email_id");
        $stmt9->execute(array(":email_id"=>$email_id));
		$rowo = $stmt9->fetch(PDO::FETCH_ASSOC);
		$phonee=$rowo['phone'];
		
		if($phonee == ""){
       
			
			?>
        	<div class = "row" style="margin-left: 350px; margin-right: 350px">
            <div class="w3-card-12 w3-hover-shadow bg-danger">
            <!--<img src="img_fjords.jpg" alt="Norway">-->
            <div class="w3-container">
            <h1 style="padding-left: 15px; padding-right: 15px; padding-top: 15px; padding-bottom: 15px; text-align: center; color: #fff;"><span class="glyphicon glyphicon-earphone pull-left"></span><span> Add phone number</span></h1>

<!-- BEGINNING OF PHONE NUMBER FORM-->
             <form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" style="color: #fff">Country</label>
    <div class="col-sm-10">
    <!--DISPLAY RESULT BY QUERYING THROUGH THE COUNTRY DATABASE-->
      <select name="country_code" class="form-control">
	 <?php
		$st=$user_home->runQuery("SELECT nicename,phonecode FROM country ORDER BY nicename");
		$st->execute();
		while($rowo2 = $st->fetch(PDO::FETCH_ASSOC)){
	 
		echo '<option>';echo '(+';echo $rowo2['phonecode'];echo ')';echo " "; echo $rowo2['nicename'];'</option>';
		}?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" style="color: #fff">Phone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword3" name="phone" placeholder="Your number">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <p class="pull-left" style="text-align: center; color: #fff; font-weight: bold;">* Adding your number is compulsory</p>
      <input type="submit" name="btn-add" class="btn btn-default pull-right" value="Add number"></input>
    </div>
  </div>
</form>
            </div>
            </div>
            </div>
            <!-- END OF FORM-->
        	<?php
}
else{
        ?>
        <!--MAIN ELEMENTS OF THE WEBPAGE-->
        <div class="row">
      <a href='delegate-form'>      <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow bg-info">
                    <span class="mini-stat-icon"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="mini-stat-info text-right">
                        
                        <?php
                                                                if($delegate_form_applied == 1){
                                                                                                                                            echo "Already Applied";}
                                                                                                                                            else{echo "<span>
                        <span  style='color:white;'>Apply Here</span></span>";}?>
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase text-white m-0">Delegate Form </h5>
                        </div>
                    </div>
                </div>
            </div> </a>

            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bg-purple bx-shadow">
                    <span class="mini-stat-icon"><i class="fa fa-registered"></i></span>
                    <div class="mini-stat-info text-right">
                        
                        <?php
                                                                $stm = $user_home->runQuery("SELECT
                        user_1_name,user_2_name,com1,com1cont1,com1cont2,com2,com2cont1,com2cont2,com3,com3cont1,com3cont2 FROM delegateform WHERE user_1_email=:email_id OR user_2_email=:email_id");
                        $stm->execute(array(":email_id"=>$email_id));
                        if($stm->rowCount() >= 1){
                        $ro = $stm->fetch(PDO::FETCH_ASSOC);
                        if($ro['user_2_name']=="-"){
                        }else
                        {echo $ro['user_2_name'];}?><br><?php
                                                                 echo $ro['user_1_name'];
                                                                 
                                                                }
                                                                 else {
                                                                    echo "Not Registered.";
                                                                 }
                                                                 
                                                                 ?>
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase text-white m-0">Delegates</h5>
                        </div>
                    </div>
                </div>
            </div>            
            

            
            <a href='IP-form'>  <div  class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow bg-info">
                    <span class="mini-stat-icon"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="mini-stat-info text-right">
                        <?php
                                                                if($press_form_applied == 1){
                                                                                                                                            echo "Already Applied";}
                                                                                                                                            else{echo "<span>
                        <span  style='color:white;'>Apply Here</span></span>";}?>
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase text-white m-0">International Press</h5>
                        </div>
                    </div>
                </div>
            </div> </a>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bg-purple bx-shadow">
                    <span class="mini-stat-icon"><i class="fa fa-registered"></i></span>
                    <div class="mini-stat-info text-right">
                        <?php
                                                                $stm = $user_home->runQuery("SELECT user_name
                        FROM ipform WHERE user_email=:email_id");
                        $stm->execute(array(":email_id"=>$email_id));
                        if($stm->rowCount() >= 1){
                        $ro = $stm->fetch(PDO::FETCH_ASSOC);

                        echo $ro['user_name'];
                        }
                        else {
                        echo "Not Registered.";
                        }
                        ?>
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase text-white m-0">International Press</h5>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class = "row">
            <div class="w3-card-12 w3-hover-shadow">
            <!--<img src="img_fjords.jpg" alt="Norway">-->
            <div class="w3-container">
 <?php 
if ($delegate_form_applied == 1)
{ 
$stm = $user_home->runQuery("SELECT
                        user_1_name,user_2_name,com1,com1cont1,com1cont2,com2,com2cont1,com2cont2,com3,com3cont1,com3cont2 FROM delegateform WHERE user_1_email=:email_id");
                        $stm->execute(array(":email_id"=>$email_id));
                        if($stm->rowCount() >= 1){
                        $ro = $stm->fetch(PDO::FETCH_ASSOC);
?>
<button type="button" class="btn btn-primary btn-lg w3-hover-shadow w3-center center" data-toggle="modal" data-target="#myModal" style="margin-bottom:20px;text-align:center;margin-left:-160px;margin-top:20px;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
  Country and Committee details
</button>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel" style="color:#8eaadb">Country and Committee details</h3>
      </div>
      <div class="modal-body">
       <?php 
if ($delegate_form_applied == 1)
{
echo "<ul style='color:#727874' ><li>Applied Committee Preference 1:";echo $ro['com1'];echo "</li>";
                                                                 echo "<li>Applied Country Preference 1:";echo $ro['com1cont1'];echo "</li>";
                                                                 echo "<li>Applied Country Preference 2:";echo $ro['com1cont2'];echo "</li>";
                                                                 echo "<li>Applied Committee Preference 2:";echo $ro['com2'];echo "<br /></li>";
                                                                 echo "<li>Applied Country Preference 1:";echo $ro['com2cont1'];echo "</li>";
                                                                 echo "<li>Applied Country Preference 2:";echo $ro['com2cont2'];echo "</li>";
                                                                 echo "<li>Applied Committee Preference 3:";echo $ro['com3'];echo "</li>";
                                                                 echo "<li>Applied Country Preference 1:";echo $ro['com3cont1'];echo "</li>";
                                                                 echo "<li>Applied Country Preference 2:";echo $ro['com3cont2'];echo "</li></ul>";
}}
?>
      </div>
    </div>
  </div>
</div>


            </div>
            </div>
            </div>
            <br><br>
            <?php
           
            if ($delegate_form_applied == 1 || $press_form_applied == 1) {
                      
            ?>
            <div class = "row" style="margin-left: 350px; margin-right: 350px">
            <div class="w3-card-12 w3-hover-shadow bg-success">
            <!--<img src="img_fjords.jpg" alt="Norway">-->
            <div class="w3-container">
            <h1 style="padding-left: 15px; padding-right: 15px; padding-top: 15px; padding-bottom: 15px; text-align: center; color: #fff;"><span class="glyphicon glyphicon-ok pull-left"></span><span>Registrations successful</span></h1>
            <h4 style="text-align: left; color: #fff;">Dear <?php if(!$FullName==''){echo $FullName.",";}else{echo $userName.",";}?> you have successfully completed the registration procedure. Kindly wait till we release the allotments. </h4>
            </div>
            </div>
            </div>
            <?php
        }
        elseif ($delegate_form_applied == 0 && $press_form_applied == 0) {
        	?>
        	<div class = "row" style="margin-left: 350px; margin-right: 350px">
            <div class="w3-card-12 w3-hover-shadow bg-warning">
            <!--<img src="img_fjords.jpg" alt="Norway">-->
            <div class="w3-container">
            <h1 style="padding-left: 15px; padding-right: 15px; padding-top: 15px; padding-bottom: 15px; text-align: center;"><span class="glyphicon glyphicon-warning-sign pull-left"></span><span> Incomplete Registrations</span></h1>
            <h4 style="text-align: center;">To complete the procedure kindly fill up the Delegate/International Press form at the earliest.</h4>
            </div>
            </div>
            </div>
        	<?php
        }}
            ?>
            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container col-md-3">
                    <div class="row">
                        <div class="col-xs-6">
                            2016 © KIIT INTERNATIONAL MUN
                        </div>
                        <div class="pull-right text-center w3-hover-shadow">
                        </div>
                        <div class="pull-right">
                        <button type="button" class="btn btn-lg w3-hover-shadow" data-toggle="modal" data-target="#myModal1" style="background-color: #03A9F4; color: #fff;"><span class="fa fa-weixin" aria-hidden="true"></span>
  Contact-us
</button>
                            <!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel" style="color:#8eaadb">The WebTeam</h3>
      </div>
      <div class="modal-body">
      <h4><i class="fa fa-envelope" aria-hidden="true"></i> Mail or <i class="fa fa-whatsapp" aria-hidden="true" style="color: green"></i> Whatsapp us regarding any Delegate and International Press form or technical query</h4> <br>
 <h5>Vaibhav Dokania<br><i class="fa fa-envelope" aria-hidden="true"></i> dokania@kiitmun.org<br><i class="fa fa-whatsapp" aria-hidden="true" style="color: green"></i> +91-7749995459</h5><br>     
 <h5>Manajit Pal<br><i class="fa fa-envelope" aria-hidden="true"></i> mono@kiitmun.org<br><i class="fa fa-whatsapp" aria-hidden="true" style="color: green"></i> +91-9776304537</h5><br>

       <h5>Shikhar Srivastava<br><i class="fa fa-envelope" aria-hidden="true"></i> shikhar@kiitmun.org<br><i class="fa fa-whatsapp" aria-hidden="true" style="color: green"></i> +91-8339041831</h5><br>

<h5>Satyaki Sanyal<br><i class="fa fa-envelope" aria-hidden="true"></i> satyaki@kiitmun.org<br><i class="fa fa-whatsapp" aria-hidden="true" style="color: green"></i> +91-9178449492</h5>
      </div>
    </div>
  </div>
</div>

                        </div>
                         <div class="container">

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Guidelines</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="color:#8eaadb">Guidelines:</h3>
        </div>
        <div class="modal-body">
          <p><ul style="color:#60635a">
		  <li>1. Users are required to fill up the Delegate Form for registration in committees as Delegates.</li>
		  <li>2. Users are required to fill up the International Press Form for registration in International Press as Journalist and Photo-Journalist.</li>
		  <li>3. Users can apply either as a Delegate in the committees or as a Journalist/ Photo-Journalist in theInternational Press. Registration in both the forms will not be accepted.</li>
		  <li>4. Once registered, user will receive an auto generated email confirmation. Proceed to the given link to activate the user account.</li>
		  <li>5. User profile customization is allowed only after login is made and confirmed.</li>
		  <li>6. Payment window slots shall be notified through emails. Do not make any payments to

people/portals unless notified. KIIT International MUN 2016 secretariat shall not be responsible for

any losses.</li>
		  <li>7. No registration, under any circumstances, is deemed confirmed till the payment is received.</li>
		  <li>8. Early bird registration assures good country slots. KIIT International MUN 2016 secretariat will not

be responsible in case of any discomfort in the allotment if the registration is late.</li>
		  <li>9. Country upgradation may be made available after the payment is confirmed. KIIT International

MUN 2016 secretariat does not guarantee alterations in any case.</li>
		  <li>10. Double Delegation is allowed for all the committees but
		  <ul>
		  <li>UNSC</li>
		  <li>UNSC-CTC</li>
		  <li>San-Francisco Conference 1945</li>
		  <li>UN Legal</li>
		  <li>International Press (Reuters and Al-Jazeera)</li>
		  </ul></li>
		  <li>Double Delegations are strictly barred for the above mentioned committees.</li>
		  <li>11. Payment encompasses the Delegate charges for three days’ dinner and entry to socials.

Accommodation charges, if required, are to be made separately.</li>
		  <li>12. Payment made exclusively covers the Delegate/s. No friends/family members/acquaintances are

entertained.</li>
		  <li>13. Any changes/alterations are the soul decision of KIIT International MUN 2016 secretariat. No

other body is involved/responsible for the entire event.</li>
		
		  </ul></p>
        </div>
        <div class="modal-footer">
 
        </div>
      </div>
		
    </div>
  </div>
  
</div>
                        
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div-->
        <!-- end container -->


    </div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.app.js"></script>

    <!-- moment js  -->
    <script src="assets/plugins/moment/moment.js"></script>

    <!-- counters  -->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- sweet alert  -->
    <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>


    <!-- flot Chart -->
    <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
    <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>

    <!-- todos app  -->
    <script src="assets/pages/jquery.todo.js"></script>

    <!-- chat app  -->
    <script src="assets/pages/jquery.chat.js"></script>

    <!-- dashboard  -->
    <script src="assets/pages/jquery.dashboard.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>

</body>
</html>
