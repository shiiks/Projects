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
  $FullName= $row['FullName'];
  $userName=$row['userName'];
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $user_home->runQuery('SELECT userPic FROM tbl_users WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);

		// it will delete an actual record from db
		$stmt_delete = $user_home->runQuery('DELETE FROM tbl_users WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();

		header("Location: profile.php");
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="google-site-verification" content="vnJXae1QIiQ2o83fbX68kFnV26PFb1qObYY6iCNJ_iI" />
        <meta name="title" content="KIIT INTERNATIONAL MUN 2016">
<meta name="description" content="The official website of KIITMUN INTL MUN 2016">
<meta name="keywords" content="kiitmun,kiit international mun,MUN,Bhubaneswar,MUN, Bhubaneswar, mun, bhubaneswar, Councils,UNGA,UNHRC,UNSC, UNODC,Marvel,KiiT ,Model,United,Nations, KiiT,kiit,mun">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<!-- KIITMUN,KIIT,MUN -->
<meta property="og:url" content="http://www.kiitmun.org"/>
<meta property="og:title" content="KIIT INTERNATIONAL MUN 2016 BETA"/>
<meta property="og:image" content="http://www.kiitmun.org/img/4.jpg"/>
<meta property="og:site_name" content="KIIT INTERNATIONAL MUN 2016 "/>
<meta property="og:description" content="To be held this autumn, KIIT International Model UN 2016 shall be the fourth edition of one of the world's largest MUNs. Hosted by KIIT University in Bhubaneswar, better known as the temple city in India, KIIT Intl MUN is considered to be one of the most loved conferences in India and invites applications from Class 9 onwards to Post Graduate students in committees of varying difficulties and topics."/>

 

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
<script>

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
                            $stmt = $user_home->runQuery('SELECT userPic FROM tbl_users WHERE userID=:uid');
                            $stmt->execute(array(":uid"=>$_SESSION['userSession']));

                            if($stmt->rowCount() > 0)
                            {
                              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                              {
                                extract($row);?>
                            <li class="dropdown user-box">
                                <a href="default.htm" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php if(!$row['userPic']==''){ echo "user_images/";echo $row['userPic'];}else{echo "kameleon ong.png";} ?>" alt="user-img" class="img-circle user-img">
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

                    </div>
                </div>
            </div>
        </header>



        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                       
                        <h4 class="page-title">Welcome <?php if(!$FullName==''){echo $FullName;}else{echo $userName;}?></h4>
                    </div>
                </div>
                <div class="row"  style="margin-left:500px; width:100%;">
                <?php

                	$stmt = $user_home->runQuery('SELECT userID, userName, userProfession, userPic, FullName FROM tbl_users where userID=:uid');
                	$stmt->execute(array(":uid"=>$_SESSION['userSession']));

                	if($stmt->rowCount() > 0)
                	{
                		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                		{
                			extract($row);
                			?>
                			<div class="col-xs-3">
                				<h4 class="page-title" style="margin-left:-20px;text-align:center;"><?php if(!$FullName==''){echo $row['FullName'];}else{echo $userName;} echo " &nbsp;/&nbsp;"; if(!$userProfession){echo "None";}else{echo $userProfession;} ?></h4>
                				<img src="<?php if(!$row['userPic']==''){ echo "user_images/";echo $row['userPic'];}else{echo "kameleon ong.png";} ?>" class="img-circle" width="270px" height="270px" />
                				<p class="page-header">
                				<span>
                				<a style="margin-left:100px;"class="btn btn-info" href="editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                				<?php /*<a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>*/?>
                				</span>
                				</p>
                			</div>
                			<?php
                		}
                	}
                	else
                	{
                		?>
                        <div class="col-xs-12">
                        	<div class="alert alert-warning">
                            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                            </div>
                        </div>
                        <?php
                	}

                ?>
      


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2016 © KIIT INTERNATIONAL MUN
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
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
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

    </body>
</html>
