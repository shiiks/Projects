<?php
require 'database/database.php';
include 'functions/user.php';
include 'functions/general.php';
if (logged_in()===true) {
	$user_id = $_SESSION['userSession'];
	}
?>