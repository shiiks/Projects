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

		if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
		{
			$id = $_GET['edit_id'];
			$stmt_edit = $user_home->runQuery('SELECT userName, userProfession, userPic, FullName FROM tbl_users WHERE userID =:uid');
			$stmt_edit->execute(array(':uid'=>$id));
			$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
			extract($edit_row);
		}
		else
		{
			header("Location: profile.php");
		}



		if(isset($_POST['btn_save_updates']))
		{
			$FullName = $_POST['FullName'];// user name
			$userjob = $_POST['user_job'];// user email

			$imgFile = $_FILES['user_image']['name'];
			$tmp_dir = $_FILES['user_image']['tmp_name'];
			$imgSize = $_FILES['user_image']['size'];

			if($imgFile)
			{
				$upload_dir = 'user_images/'; // upload directory
				$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
				$userpic = rand(1000,1000000).".".$imgExt;
				if(in_array($imgExt, $valid_extensions))
				{
					if($imgSize < 5000000)
					{
						unlink($upload_dir.$edit_row['userPic']);
						move_uploaded_file($tmp_dir,$upload_dir.$userpic);
					}
					else
					{
						$errMSG = "Sorry, your file is too large it should be less then 5MB";
					}
				}
				else
				{
					$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				}
			}
			else
			{
				// if no image selected the old image remain as it is.
				$userpic = $edit_row['userPic']; // old image from database
			}


			// if no error occured, continue ....
			if(!isset($errMSG))
			{
				$stmt = $user_home->runQuery('UPDATE tbl_users
										     SET FullName=:FullName,
											     userProfession=:ujob,
											     userPic=:upic
									       WHERE userID=:uid');
				$stmt->bindParam(':FullName',$FullName);
				$stmt->bindParam(':ujob',$userjob);
				$stmt->bindParam(':upic',$userpic);
				$stmt->bindParam(':uid',$id);

				if($stmt->execute()){
					?>
	                <script>
					alert('Successfully Updated ...');
					window.location.href='profile.php';
					</script>
	                <?php
				}
				else{
					$errMSG = "Sorry Data Could Not Updated !";
				}

			}


		}

	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
       
      

        <link rel="shortcut icon" href="assets/images/favicon.png">

        <title>KIITMUN 2016 Dashboard</title>
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
                                   <!-- <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
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
                        
                        <h4 class="page-title">Welcome <?php if(!$FullName==''){echo $FullName;}else{echo $userName;}?></h4>
                    </div>
                </div>
                <div class="row">
									<div class="clearfix"></div>

	<form method="post" enctype="multipart/form-data" class="form-horizontal">


	    <?php
		if(isset($errMSG)){
			?>
	        <div class="alert alert-danger">
	          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
	        </div>
	        <?php
		}
		?>


		<table class="table table-bordered table-responsive">

	    <tr>
	    	<td><label class="control-label">Full Name</label></td>
	        <td><input class="form-control" type="text" name="FullName" value="<?php echo $FullName; ?>" required /></td>
	    </tr>

	    <tr>
	    	<td><label class="control-label">Position</label></td>
	        <td><input class="form-control" type="text" name="user_job" value="<?php echo $userProfession; ?>" required /></td>
	    </tr>
      <?php
      $stmt = $user_home->runQuery('SELECT userPic FROM tbl_users WHERE userID=:uid');
      $stmt->execute(array(":uid"=>$_SESSION['userSession']));

      if($stmt->rowCount() > 0)
      {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
          extract($row);?>
	    <tr>
	    	<td><label class="control-label">Profile Img.</label></td>
	        <td>
	        	<p><img src="<?php if(!$row['userPic']==''){ echo "user_images/";echo $row['userPic'];}else{echo "kameleon ong.png";}}} ?>" height="150" width="150" /></p>
	        	<input class="input-group" type="file" name="user_image" accept="image/*" />
	        </td>
	    </tr>

	    <tr>
	        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
	        <span class="glyphicon glyphicon-save"></span> Update
	        </button>

	        <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

	        </td>
	    </tr>

	    </table>

	</form>

</div>
           

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
