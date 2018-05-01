<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
require_once 'class.user.php';
$user_home = new USER();

//For Checking user is logged in or not
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

$id=trim($_GET['id']);//Getting from URL

//For emailing getting the details
$stmt4 = $user_home->runQuery("SELECT name,email,blood_type FROM requested_blood WHERE id = :id");
$stmt4->execute(array(":id"=>$id));
$userrow = $stmt4->fetch(PDO::FETCH_ASSOC);
$name=$userrow['name'];
$email=$userrow['email'];
$blood_type=$userrow['blood_type'];
//When a blood unit is given -1 the units

$stmt5 = $user_home->runQuery("SELECT units FROM blood_info WHERE blood_type=:blood_type");
$stmt5->execute(array(":blood_type"=>$blood_type));
$userrow = $stmt5->fetch(PDO::FETCH_ASSOC);

if($userrow['units']!=0){//If blood units are not 0
$stmt3 = $user_home->runQuery("UPDATE blood_info SET units = units-1 WHERE blood_type=:blood_type");
$stmt3->bindparam(":blood_type",$blood_type);
$stmt3->execute();

$stmt2 = $user_home->runQuery("DELETE FROM requested_blood WHERE id = :id");//because it is foreign key and primary key that's why deleting it so that it can request more that once.
$stmt2->execute(array(":id"=>$id));

$message = "					
						Hello $name,
						<br /><br />
						Welcome to Blood Bank System!<br/>
						Your request for the blood sample is accepted.<br/>
						<br /><br />
						Contact to hospital soon.
						<br /><br />
						Thanks,";
						
			$subject = "Blood Request Accepted";
						
			if($user_home->send_mail($email,$message,$subject)){	
				$user_home->redirect('view_request.php?accepted');
			}
			else{
				$user_home->redirect('view_request.php?accepted');
			}
}else
{
	$message = "					
						Hello $name,
						<br /><br />
						Welcome to Blood Bank System!<br/>
						Your request for the blood sample is rejected.<br/>
						It can be because of non availability of blood sample.
						<br /><br />
						Contact to hospital soon.
						<br /><br />
						Thanks,";
						
			$subject = "Blood Request Rejected";
						
			if($user_home->send_mail($email,$message,$subject)){	
				$user_home->redirect('view_request.php?rejected');
			}
			else{
				$user_home->redirect('view_request.php?rejected');
			}
}
?>