<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('../include/db.inc.php');


	
	$hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';

	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	
	$flag="i";


	$update_query=mysql_query('UPDATE `room_allotment` SET `room`="", `hostel_id`="'.$hostel.'",`flag`="'.$flag.'" WHERE `roll`="'.$roll.'"; ');	
	
	if($update_query > 0)
	{
		?>
        <script>
			alert('Hostel for this student has been changed!!!');
		</script>
        <?php
		header("LOCATION:index.php");
	}
	else
	{
		header("LOCATION:transfer_by_roll.php?st=0");
	}


?>