
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<link rel="icon" href="../img/Noticeboardlogo.jpg" type="image/jpg" sizes="16x16">
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<div class="header">
	<div class="left">
    	<label><a>Welcome : <?php print($userRow['user_name']); ?></a></label>
    </div>
    <div class="right">
    	<label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
