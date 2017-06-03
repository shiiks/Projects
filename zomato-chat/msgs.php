<?php
require_once 'class.user.php';
$user_home=new USER();

$sql=$user_home->runQuery("SELECT * FROM messages");
$sql->execute();
while($r=$sql->fetch()){
 echo "<div class='msg' style='margin-bottom:7px' title='{$r['posted']}'><span class='name'>{$r['name']}</span> : <span class='msgs'>{$r['msg']}</span></div>";
}

?>
