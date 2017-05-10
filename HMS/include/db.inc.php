<?php
//error_reporting(E_ALL ^ E_NOTICE);

define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB','dbse');
$db=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD)
or die('Unable to connect.Check your connection parameters.');
mysql_select_db(MYSQL_DB,$db) or die(mysql_error($db)); 

?>


