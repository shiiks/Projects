<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/
session_start();
require_once 'class.user.php';
$user_home = new USER();

//Checking if user is logged in or not
if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['userEmail']!=$_SESSION['hosorrec'])//Checking if hospital or receiver
{
	session_destroy();//not allowed msg
	$user_home->redirect('index.php');
}

$stmt2 = $user_home->runQuery("SELECT * FROM requested_blood");
$stmt2->execute();

if(isset($_GET['accepted'])){
$msg = "
		      <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Accepted !</strong> Mail has been sent to the user.
			  </div>
			  ";
}else if(isset($_GET['rejected'])){
	$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Rejected !</strong> Mail has been sent to the user.It can be because of non availability of blood sample.
			  </div>
			  ";
}
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>View Requests</title>
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
					<?php if(isset($msg)) echo $msg;  ?>
		<h1>Available Blood Request</h1>
		<form method="post">
			<table class="table table-bordered">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Mobile Number</th>
				<th>Blood Type</th>
				<th>Email</th>
				<th>Details</th>
				<th>Approve/Reject</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
				while($userrow=$stmt2->fetch(PDO::FETCH_ASSOC)){
						?><tr><td><?php print($userrow['name']); ?></td><?php
						?><td><?php print($userrow['gender']); ?></td><?php
						?><td><?php print($userrow['age']); ?></td><?php
						?><td><?php print($userrow['mobno']); ?></td><?php
						?><td><?php print($userrow['blood_type']); ?></td><?php
						?><td><?php print($userrow['email']); ?></td><?php
						?><td><?php print($userrow['details']); ?></td>
						<td><!-- passing two values as a parameter-->
							<a href="accept.php?id=<?php print($userrow['id']); ?>" class="btn btn-large btn-primary" name="btn-request">Accept</a> 
							<a href="reject.php?id=<?php print($userrow['id']); ?>" class="btn btn-large btn-primary" name="btn-request">Reject</a> 
						</td>
						</tr>
<?php					
					}
?>

			</tbody>
		  </table>
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