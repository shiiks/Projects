<?php
include('../include/db.inc.php');
session_start();
$msgID = $_REQUEST["msgID"];

$sql= "select `bit` from `indisciplinary_activity` where `roll`='".$msgID."'";
$result = mysql_query($sql);
$r = mysql_fetch_array($result);
$status = $r['bit'];

if($status == 0)
 {
	$query="update `indisciplinary_activity` set `bit`='1' where `roll`='".$msgID."' and `bit`='".$status."'"; 
	 $result1 = mysql_query($query);
     $r1 = mysql_fetch_array($result1);
	 $count=mysql_num_rows($result1);
	 header("LOCATION:update_idiscact.php?st=1");

 }
 else
   {
	  header("LOCATION:update_idiscact.php?st=2"); 
   }
?>