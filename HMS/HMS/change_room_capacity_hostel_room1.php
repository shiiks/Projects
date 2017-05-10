<?php
include('../include/db.inc.php');
include('../include/warning.php');


if(isset($_POST['submit']))
{
	$hostel = (isset($_POST['hostel'])) ? $_POST['hostel'] : '';
	$room_capacity = (isset($_POST['room_capacity'])) ? $_POST['room_capacity'] : '';
	$hostel_room = (isset($_POST['room'])) ? $_POST['room'] : '';
	
	
	$gethostel_room='select * from `hostel_room` where hostel_id="'.$hostel.'" and room_id="'.$hostel_room.'"';
	$getresult=mysql_query($gethostel_room) or die(mysql_error());
	$output=  mysql_num_rows($getresult);
	
	if($output){
		 $query = 'update hostel_room set room_capacity = "'. $room_capacity.'" WHERE ' .
                  'hostel_id = "' . $hostel. '" and room_id="'.$hostel_room.'"';
        $result=mysql_query($query,$db) or die(mysql_error());	   							
		if($getresult > 0)//if exits then
		header('location:change_room_capacity.php?st=1');
		else
	    header('location:change_room_capacity.php?st=0');
           }
	else
	   	    header('location:change_room_capacity.php?st=3');
}
  
?>






						
									$query='delete from `admin_login` where `admin_id`="'.$record['admin_id'].'"';
									$result=mysql_query($query,$db) or die(mysql_error());
									if($result > 0)//if exits then
									header('location:delete_moderator.php?st=1');
									else
									header('location:delete_moderator.php?st=0');
									}
								 else
								header('location:delete_moderator.php?st=3');
					       }
					  
					    