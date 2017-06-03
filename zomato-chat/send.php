<?php
require_once 'class.user.php';
$user_home=new USER();
session_start();
if(!($user_home->is_logged_in()) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
 die("<script>window.location.reload()</script>");
}
if($user_home->is_logged_in() && isset($_POST['msg'])){
 $msg=htmlspecialchars($_POST['msg']);
 if($msg!=""){
  $sql=$user_home->runQuery("INSERT INTO messages (name,msg,posted) VALUES (?,?,NOW())");
  $sql->execute(array($_SESSION['user'],$msg));
 }
}
?>
