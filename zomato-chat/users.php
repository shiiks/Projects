<?php
require_once 'class.user.php';
$user_home=new USER();
echo "<h2>Users</h2>";
$sql=$user_home->runQuery("SELECT name FROM chatters");
$sql->execute();		
while($r=$sql->fetch()){
 echo "<div class='user'>{$r['name']}</div>";
}
?>
