<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
?>
<body oncontextmenu="return false">
Don't Try This!!!
</body>