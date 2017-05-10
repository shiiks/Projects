<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Online Portal Where You Can Access Your Academics And Hostel Notices Anytime.">
    <meta name="author" content="Shikhar Saran Srivastava">

    <title>E-Notice Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="../img/Noticeboardlogo.jpg" type="image/jpg" sizes="16x16">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="">
  <meta name="apple-mobile-web-app-title" content="E-notice Board">
  <meta name="theme-color" content="#f05f40">

<meta name="msapplication-navbutton-color" content="#f05f40">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#f05f40">
<meta name="apple-mobile-web-app-status-bar-style" content="#f05f40">
  <link rel="apple-touch-icon" href="../img/Noticeboardlogo.jpg">
  <meta name="msapplication-TileImage" content="../img/Noticeboardlogo.jpg">
  <meta name="msapplication-TileColor" content="#f05f40">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
*{
	margin:0;
	padding:0;
}
.content{
	text-align:center;
	margin-left:20px;
}
.middle
{
	display:inline-block;
	position:absolute;
	top:200px;
	left:30px;
}

img
{
	width:200px;
	height:197px;
	margin-left:3px;
	
}
img:hover
{
	cursor:pointer;
	border:1px solid black;
}
.down a
{
	text-decoration:none;
	margin-top:50px;
	margin-left:250px;
	
}

.down{
margin-top:-200px;	
margin-bottom:90px;
border:3px solid black;
height:203px;
width:700px;
}
.matter{
	margin-left:230px;
}
.down h3
{
	margin-left:230px;
}
</style>
</head>

<body oncontextmenu="return false">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">E-Notice Board</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
          
                        <li><a href="logout.php?logout=true"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					<div class="content">
                      <h4>Select Hostel,Branch,Year</h4>
						<form action="home.php" method="POST">
						<label>Hostel</label><br/>
						<input type="radio" name="hostel[]" value="K.P-6">K.P-6</input><br/>
						<input type="radio" name="hostel[]" value="K.P-9">K.P-9</input><br/>
						<input type="radio" name="hostel[]" value="Q.C-4">Q.C-4</input><br/>
						<label>Branch</label><br/>
						<input type="radio" name="branch[]" value="CSE">CSE</input><br/>
						<input type="radio" name="branch[]" value="I.T">I.T</input><br/>
						<label>YEAR</label><br/>
						<input type="radio" name="year[]" value="2011">2011</input><br/>
						<input type="radio" name="year[]" value="2012">2012</input><br/>
						<input type="radio" name="year[]" value="2013">2013</input><br/>
						<input type="submit" value="See Notices"/>
						</form>
   						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
			</div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper" style="height:2506px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Notice Board</h1>
						<?php
if(isset($_POST['hostel']) && isset($_POST['branch']) && isset($_POST['year']))
{
	if(!empty($_POST['hostel']) && !empty($_POST['branch']) && !empty($_POST['year']))
	{
				$arrayName = $_POST['hostel'];
				$arrayName2 = $_POST['branch'];
				$arrayName3 = $_POST['year'];
				$hostel=implode(",",$arrayName);
				$branch=implode(",",$arrayName2);
				$year=implode(",",$arrayName3);
				$stmt2=$DB_con->prepare("SELECT doc,summary FROM doc WHERE find_in_set(:hostel, hostel) > 0 AND find_in_set(:branch, branch) AND find_in_set(:year, year) ORDER BY user_id DESC;");
				$stmt2->execute(array(":hostel"=>$hostel,":branch"=>$branch,":year"=>$year));
					?>
					<div class="middle">
					<?php
					while($userRow2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
					if (!empty($userRow2['doc'])){
						?>						
						<img src="<?php print($userRow2['doc']); ?>"/>
						<div class="down">
						<h3>Description</h3><br/>
						<div class="matter"><?php print($userRow2['summary']); ?></div>
						<a href="<?php print($userRow2['doc']); ?>" target="_blank" class="btn btn-primary btn-xl" >View</a>
						<a href="<?php print($userRow2['doc']); ?>" class="btn btn-primary btn-xl" download>Download</a>
						</div>
						<?php
					}
					else 
					{
						echo "No records.";
					}
				}?>
					</div>
					<?php
				
			}
			else {
				echo "No Notice Found.";
			}
}
else {
	echo "Please fill in all fields.";
}

?>
</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
