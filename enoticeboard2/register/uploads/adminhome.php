<?php
include_once 'dbconfig.php';
if(!$admin->is_loggedin())
{
	$admin->redirect('admin.php');
}
$admin_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$admin_id));
$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($adminRow['user_email']); ?></title>
<style>
input{
	margin-bottom:30px;
}
</style>
</head>

<body oncontextmenu="return false">

<div class="header">
	<div class="left">
    	<label><a>Welcome : <?php print($adminRow['user_name']); ?></a></label>
    </div>
    <div class="right">
    	<label><a href="adminlogout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>

<div class="content" style="border:1px blue;">
<h3>Admin Panel</h3>
<form action="info.php" method="POST" enctype="multipart/form-data">
<label for="summary">Summary :</label>
<textarea rows="3" cols="30" name="summary"></textarea><br/>
<label for="file">File Upload :</label><input type="file" style="margin-left:500px;margin-top:20px;" name="fileToUpload" id="fileToUpload"/>
<label for="hostel">Hostel :</label>
<input type="checkbox" name="hostel[]" value="K.P-6">K.P-6</input>
<input type="checkbox" name="hostel[]" value="K.P-9">K.P-9</input>
<input type="checkbox" name="hostel[]" value="Q.C-4">Q.C-4</input><br/>
<label for="branch">Branch :</label>
<input type="checkbox" name="branch[]" value="CSE">CSE</input>
<input type="checkbox" name="branch[]" value="I.T">I.T</input><br/>
<label for="hostel">Year :</label>
<input type="checkbox" name="year[]" value="2011">2011</input>
<input type="checkbox" name="year[]" value="2012">2012</input><br/>
<input type="submit" value="Upload" name="submit"/>
</form>
</div>
</body>
</html>
