<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

session_start();
require_once 'class.user.php';
require_once 'class.receivers.php';
$user = new USER();
$receivers = new RECEIVERS();

//To check if user is logged in or not
if(!$user->is_logged_in())
{
	$user->redirect('index.php');
}

//To check if user is logged in or not
if(!$receivers->is_logged_in())
{
	$user->redirect('index.php');
}

//To check if user is logged in or not
if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}

//To check if user is logged in or not
if($receivers->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}
?>