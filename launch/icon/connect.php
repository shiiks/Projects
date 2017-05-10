<?php
$DB_host = "205.147.99.13";
$DB_user = "celtindia";
$DB_pass = "celt6102kiit";
$DB_name = "celtindia";

try
{
	$dbh = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once 'class.members.php';
include_once 'class.users.php';
$user = new MEMBERS($dbh);
$user1 = new USER($dbh);
?>