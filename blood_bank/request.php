<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();

require_once 'class.receivers.php';

$user_home = new RECEIVERS();


if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}


$stmt = $user_home->runQuery("SELECT * FROM tbl_receivers WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['userEmail']!=$_SESSION['hosorrec'])
{
	$user_home->redirect('home.php?notallowed');
}
$id = $_GET['id'];
//echo $id;
$stmt2 = $user_home->runQuery("SELECT * FROM blood_info WHERE id=:id");
$stmt2->execute(array(":id"=>$id));
$userrow = $stmt2->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['btn-submit']))
{
	$id=trim($_SESSION['userSession']);
	$name = trim($_POST['name']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$mobno = trim($_POST['mobno']);
	$blood_type = trim($userrow['blood_type']);
	$email = trim($row['userEmail']);
	$details = trim($_POST['details']);
	
	if($user_home->request($id,$name,$gender,$age,$mobno,$blood_type,$email,$details))
		{				
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an request to the hospital.
                   Wait for approval we will contact you soon. 
			  		</div>
					";
		}
		else
		{
			$msg= "<div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  Please wait for your earlier request to approve.
			  </div>";
		}
}		
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Request Blood Information</title>
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
							   <li>
                                <a href="available_blood_sample.php">Available Blood Sample</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
		<h1>Request Blood</h1>
		<form class="form-signin" method="post">
    				<?php if(isset($msg)) echo $msg;  ?>
        <input type="text" class="input-block-level" placeholder="Name" name="name" required />
        <input type="radio" class="input-block-level" name="gender" value="Male">Male
        <input type="radio" class="input-block-level" name="gender" value="Female">Female
        <input type="radio" class="input-block-level" name="gender" value="Other">Other
        <input type="number" class="input-block-level" placeholder="Age" name="age" required />
        <input type="number" class="input-block-level" placeholder="Mobile Number" name="mobno" required/>
        <input type="text" class="input-block-level" placeholder="<?php echo $userrow['blood_type']; ?>" name="blood_type" disabled />
        <input type="email" class="input-block-level" placeholder="<?php echo $row['userEmail']; ?>" name="blood_type" disabled />
        <input type="text" class="input-block-level" placeholder="other details" name="details" />
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
