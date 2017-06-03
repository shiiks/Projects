<?php
if(isset($_SESSION['user'])){
 $sqlm=$this->conn->prepare("SELECT name FROM chatters WHERE name=?");
 $sqlm->execute(array($_SESSION['user']));
 if($sqlm->rowCount()!=0){
  $sql=$this->conn->prepare("UPDATE chatters SET seen=NOW() WHERE name=?");
  $sql->execute(array($_SESSION['user']));
 }else{
  $sql=$this->conn->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($_SESSION['user']));
 }
}


$sql=$this->conn->prepare("SELECT * FROM chatters");
$sql->execute();
while($r=$sql->fetch()){
 $curtime=strtotime(date("Y-m-d H:i:s",strtotime('-25 seconds', time())));
 if(strtotime($r['seen']) < $curtime){
  $kql=$this->conn->prepare("DELETE FROM chatters WHERE name=?");
  $kql->execute(array($r['name']));
 }
}
?>
