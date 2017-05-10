<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel_backup";

// Create connection
$dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
// Check connection
if(!$dbh)
{
  header('LOCATION:error.html');
  exit;
}
 ?>