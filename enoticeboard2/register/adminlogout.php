	<?php
require_once 'dbconfig.php';

if($_SESSION['user_session']!="")
{
	$admin->redirect('adminhome.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	$admin->logout();
	$admin->redirect('admin.php');
}
if(!isset($_SESSION['user_session']))
{
	$admin->redirect('admin.php');
}