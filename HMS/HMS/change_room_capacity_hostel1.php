<?php
include('../include/db.inc.php');
include('../include/warning.php');


if(isset($_POST['submit']))
{
	$hostel = (isset($_POST['hostel_name'])) ? $_POST['hostel_name'] : '';
	$room_capacity = (isset($_POST['room_capacity'])) ? $_POST['room_capacity'] : '';
     
	 $query1 = 'update hostel_room set room_capacity = "'. $room_capacity.'" WHERE ' .
                  'hostel_id = "' . $hostel. '"';
				  
	 $getresult=mysql_query($query1) or die(mysql_error());  
							
		if($getresult > 0)//if exits then
		header('location:change_room_capacity.php?st=1');
		else
	    header('location:change_room_capacity.php?st=0');
}
  
?>