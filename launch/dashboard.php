<?php
session_start();
include_once 'connect.php';
if(!$user1->is_loggedin())
{
	$user1->redirect('login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $dbh->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php print($userRow['user_name']); ?>&nbsp <a style="color:white;" href="logout1.php?logout=true"><i class="glyphicon glyphicon-user"></i> &nbsp Log Out</a>
			