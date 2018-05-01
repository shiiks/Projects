<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
require_once 'class.user.php';
$user_home = new USER();

//For checking user is logged in or not
if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}


$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['userEmail']!=$_SESSION['hosorrec'])//To check Hospital or Receivers
{
	session_destroy();//not allowed msg
	$user_home->redirect('index.php');
}

//After the button is clicked
if(isset($_POST['btn-submit']))
{
	$blood_type = trim($_POST['txtblood']);
	$units = trim($_POST['units']);
	$details = trim($_POST['details']);
	if($user_home->add_blood_info($blood_type,$units,$details))
	{
		$user_home->redirect('available_blood_sample.php');
	}
}
?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="home.php">Home</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
								<?php echo $row['userEmail']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="home.php">Blood Bank System</a>
                            </li>
                            <li class="dropdown">
                                <a href="available_blood_sample.php" >Available Blood Sample 
                                </a>
                            </li>
                            <li>
                                <a href="blood_info.php">Add Blood Information</a>
                            </li>
							<li>
                                <a href="view_request.php">View request for blood</a>
                            </li>
                            
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
		<h1>Add Blood Info</h1>
		<form class="form-signin" method="post">
        <select class="input-block-level" name="txtblood" selected="1" required>
			  <option value="">Select Blood Group</option>
			  <option value="A+">A+</option>
			  <option value="A-">A-</option>
			  <option value="B+">B+</option>
			  <option value="B-">B-</option>
			  <option value="O+">O+</option>
			  <option value="O-">O-</option>
			  <option value="AB+">AB+</option>
			  <option value="AB-">AB-</option>
			</select>
        <input type="number" class="input-block-level" placeholder="Number of units" name="units" required />
        <input type="text" class="input-block-level" placeholder="Other details" name="details" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-submit">Submit</button>
      </form>
		</div>
        <!--/.fluid-container-->
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>
<script>
         $(document).keydown(function(event){
             if(event.keyCode==123){
             return false;
            }
         else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
               return false;  //Prevent from ctrl+shift+i
            }
         });
         $(document).on("contextmenu",function(e){        
         	   e.preventDefault();
         	});
      </script>
</html>