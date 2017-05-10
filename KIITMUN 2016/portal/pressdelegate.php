<?php

	error_reporting( ~E_NOTICE );

  session_start();
	require_once  'class.user.php';
  $user_home = new USER();

  if(!$user_home->is_logged_in())
  {

  		$user_home->redirect('index.php');
  }
	$s = $user_home->runQuery("SELECT press_form_applied FROM tbl_users WHERE press_form_applied=1 AND userId=:uid");
	$s->execute(array(":uid"=>$_SESSION['userSession']));
	$r = $s->fetch(PDO::FETCH_ASSOC);
	if($r['press_form_applied'] == 1){
		$user_home->redirect('index.php');
	}
  $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
  $stmt->execute(array(":uid"=>$_SESSION['userSession']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	$email_id=$row['userEmail'];
	$userName=$row['userName'];
	if(isset($_POST['btn_save_updates']))
	{

		$name_of_delegate=$_POST['name_of_delegate'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$nationality=$_POST['nationality'];
		$mun_experience=$_POST['mun_experience'];
		$other_journalism=$_POST['other_journalism'];
		$institution=$_POST['institution'];
		$yearorgrade=$_POST['yearorgrade'];
		$accommodation_req=$_POST['accommodation_req'];
		$post_applied=$_POST['post_applied'];
		$why_journalism=$_POST['why_journalism'];
		$photo_caption=$_POST['photo_caption'];
	}
	if(!isset($errMSG))
	{
		$user_home->pressregister($email_id,$userName,$name_of_delegate,$gender,$address,$nationality,$mun_experience,$other_journalism,$institution,$yearorgrade,$accommodation_req,$post_applied,$why_journalism,$photo_caption);
	}
	else {
	?><script>alert("Cannot register.")</script><?php
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

        <meta name="author" content="Shikhar Saran Srivastava">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>KIITMUN 2016 Observer Team</title>

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
                            <!--<li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification</li>
                                    <li class="list-group">

                                       <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left">
                                                <em class="fa fa-user-plus fa-2x text-info"></em>
                                             </div>
                                             <div class="media-body clearfix">
                                                <div class="media-heading">New user registered</div>
                                                <p class="m-0">
                                                   <small>You have 10 unread messages</small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left">
                                                <em class="fa fa-diamond fa-2x text-primary"></em>
                                             </div>
                                             <div class="media-body clearfix">
                                                <div class="media-heading">New settings</div>
                                                <p class="m-0">
                                                   <small>There are new settings available</small>
                                                </p>
                                             </div>
                                          </div>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left">
                                                <em class="fa fa-bell-o fa-2x text-danger"></em>
                                             </div>
                                             <div class="media-body clearfix">
                                                <div class="media-heading">Updates</div>
                                                <p class="m-0">
                                                   <small>There are
                                                      <span class="text-primary">2</span> new updates available</small>
                                                </p>
                                             </div>
                                          </div>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                          <small>See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
                            <?php
                            $stmt = $user_home->runQuery('SELECT userPic FROM tbl_users WHERE userId=:uid');
                            $stmt->execute(array(":uid"=>$_SESSION['userSession']));

                            if($stmt->rowCount() > 0)
                            {
                              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                              {
                                extract($row);?>
                            <li class="dropdown user-box">
                                <a href="default.htm" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php if(!$row['userPic']==''){ echo "user_images/";echo $row['userPic'];}else{echo "http://1u88jj3r4db2x4txp44yqfj1.wpengine.netdna-cdn.com/wp-content/uploads/2015/12/camp-pokemon-app-announced4ccg1920jpg-9b3da7_1280w.jpg";} ?>" alt="user-img" class="img-circle user-img">
                                    <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                </a>
<?php }} ?>

                                <ul class="dropdown-menu">
                                    <li><a href="profile.php"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <!--<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
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


                          <!--  <li class="has-submenu">
                                <a href="#"><i class="md md-palette "></i><span> Elements </span> </a>
                                <ul class="submenu">
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="panels.html">Panels</a></li>
                                    <li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                                    <li><a href="progressbars.html">Progress Bars</a></li>
                                    <li><a href="notification.html">Notification</a></li>
                                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-invert-colors-on"></i> <span> Components </span> </a>
                                <ul class="submenu">
                                    <li><a href="grid.html">Grid</a></li>
                                    <li><a href="portlets.html">Portlets</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                    <li><a href="nestable-list.html">Nesteble</a></li>
                                    <li><a href="ui-sliders.html">Sliders </a></li>
                                    <li><a href="gallery.html">Gallery </a></li>
                                    <li><a href="pricing.html">Pricing Table </a></li>
                                    <li><a href="calendar.html">Calendar </a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-redeem"></i> <span> Other </span> </a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#">Icons</a>
                                        <ul class="submenu">
                                            <li><a href="material-icon.html">Material Design</a></li>
                                            <li><a href="ion-icons.html">Ion Icons</a></li>
                                            <li><a href="font-awesome.html">Font awesome</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Forms</a>
                                        <ul class="submenu">
                                            <li><a href="form-elements.html">General Elements</a></li>
                                            <li><a href="form-validation.html">Form Validation</a></li>
                                            <li><a href="form-advanced.html">Advanced Form</a></li>
                                            <li><a href="form-wizard.html">Form Wizard</a></li>
                                            <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                                            <li><a href="code-editor.html">Code Editors</a></li>
                                            <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                            <li><a href="form-xeditable.html">X-editable</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Tables</a>
                                        <ul class="submenu">
                                            <li><a href="tables.html">Basic Tables</a></li>
                                            <li><a href="table-datatable.html">Data Table</a></li>
                                            <li><a href="tables-editable.html">Editable Table</a></li>
                                            <li><a href="responsive-table.html">Responsive Table</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Charts</a>
                                        <ul class="submenu">
                                            <li><a href="morris-chart.html">Morris Chart</a></li>
                                            <li><a href="chartjs.html">Chartjs</a></li>
                                            <li><a href="flot-chart.html">Flot Chart</a></li>
                                            <li><a href="peity-chart.html">Peity Charts</a></li>
                                            <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                                            <li><a href="chart-radial.html">Radial charts</a></li>
                                            <li><a href="other-chart.html">Other Chart</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Maps</a>
                                        <ul class="submenu">
                                            <li><a href="gmap.html"> Google Map</a></li>
                                            <li><a href="vector-map.html"> Vector Map</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Mail</a>
                                        <ul class="submenu">
                                            <li><a href="inbox.html">Inbox</a></li>
                                            <li><a href="email-compose.html">Compose Mail</a></li>
                                            <li><a href="email-read.html">View Mail</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-pages"></i><span>Pages </span> </a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="profile.html">Profile</a></li>
                                            <li><a href="timeline.html">Timeline</a></li>
                                            <li><a href="invoice.html">Invoice</a></li>
                                            <li><a href="email-template.html">Email template</a></li>
                                            <li><a href="contact.html">Contact-list</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="recoverpw.html">Recover Password</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="lock-screen.html">Lock Screen</a></li>
                                            <li><a href="blank.html">Blank Page</a></li>
                                            <li><a href="maintenance.html">Maintenance</a></li>
                                            <li><a href="coming-soon.html">Coming-soon</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                            <li><a href="404_alt.html">404 alt</a></li>
                                            <li><a href="500.html">500 Error</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->

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
                       <?php /* <div class="btn-group pull-right">
                            <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>*/?>
                        <h4 class="page-title">KIITMUN Observer Application Form</h4>
                    </div>
                </div>
                <div class="row">
                  <form method="post" class="form-horizontal">


    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	if(isset($ex)){
		?>
				<div class="alert alert-danger">
					<span class="glyphicon glyphicon-info-sign"><?php echo $ex; ?></span>
				</div>
<?php
	}
	?>


	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">Name of the Delegate</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="text" name="name_of_delegate" value="<?php echo $row['FullName']; ?>" required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Email-Id</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="email" name="email_id"  required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Gender</label><span style="color:red;">&nbsp *</span></td>
        <td>
        	<select name="gender" required>
            <option>Choose...</option>
            <option>Male</option>
            <option>Female</option>
            <option>Do not want to enclose</option>
          </select>
        </td>
    </tr>

    <tr>
      <td><label class="control-label">Address</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="text" name="address"  required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Nationality</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="text" name="nationality"  required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">MUN Experience(s) as member of the Press Team </label><span style="color:red;">&nbsp *</span></td>
        <td><textarea class="form-control" name="mun_experience" required ></textarea></td>
    </tr>

	 <tr>
    	<td><label class="control-label">Other Journalism related experiences. (If none, write ‘NONE’)</label><span style="color:red;">&nbsp *</span></td>
        <td><textarea class="form-control" name="other_journalism" required ></textarea></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Institution</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="text" name="institution" required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Year/Grade</label><span style="color:red;">&nbsp *</span></td>
        <td><input class="form-control" type="text" name="yearorgrade" required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Accommodation required?</label>&nbsp <span style="color:red;">*</span></td>
        <td><select name="accommodation_req" required>
              <option>Choose...</option>
              <option>Yes</option>
              <option>No</option>
            </select>
        </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Post Applying For (SELECT ONE)</label>&nbsp <span style="color:red;">*</span></td>
        <td><select id="2nd" name="post_applied" required>
              <option>Choose...</option>
              <option value="JOURNALIST" >JOURNALIST</option>
              <option value="PHOTO-JOURNALIST" >PHOTO-JOURNALIST</option>
            </select>
        </td>
    </tr>
	</table>
<div class="journalist" style="display:none;">
<table class="table table-bordered table-responsive">
			<tr>
				<td><label class="control-label">If applying as journalist, which would be your news agency preference.<br>In either case,write about why you choose the same over the other. (Minimum 100 Words)</label></td>
				<td><textarea class="form-control" name="why_journalism"></textarea></td>
			</tr>
			</table>
</div>
		<div class="photo_caption" style="display:none;">
		<table class="table table-bordered table-responsive">
			<tr>
				<td><label class="control-label"> If applying as photo-journalist, write a caption for this photo in 50 Words or Less for the following photo :</label>
				<br><img width=500 height=200 src="photo_caption.jpg">
				</td>
				
				<td><textarea rows=10 class="form-control" name="photo_caption"></textarea></td>
			</tr>
			</table>
			</div>



    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Register
        </button>


        </td>
    </tr>



</form>
                </div>

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2016 © KIITMUN.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
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
		</script>
		<script>
		$(document).ready(function() {
				$('#2nd').on('change', function() {
          if(this.value == "JOURNALIST"){ 
		  $(".journalist").show();
		  $(".photo_caption").hide();
		  }
		  else if(this.value == "PHOTO-JOURNALIST")
		  {
			 $(".photo_caption").show(); 
			 $(".journalist").hide();
		  }
        });
            });
			
			
        </script>
        
    </body>
</html>
