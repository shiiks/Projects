<?php

session_start();
include '../include/db.inc.php';
include '../include/warning.php';
if($_POST['Submit']){
	
$name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';//c
$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';//c
$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';//c
$room=(isset($_POST['room']))?trim($_POST['room']):'';//current
$hostel_id=(isset($_POST['hostel_id']))?trim($_POST['hostel_id']):'';// cuurent


$temp_room=(isset($_POST['temp_room']))?trim($_POST['temp_room']):'';
$temp_hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';//changed
$st_date=(isset($_POST['st_date']))?trim($_POST['st_date']):'';
$end_date=(isset($_POST['end_date']))?trim($_POST['end_date']):'';

//echo $hostel_id.$temp_hostel;

	if($hostel_id == $temp_hostel)
		{
			 header("LOCATION:temp_hstlShiftin.php?st=2");
		}
	else
		{
		
				$query="select `tra_roll` from `tem_room_allotment` where `tra_roll`='$roll'";
				$result=mysql_query($query,$db) or die(mysql_error());
				if(mysql_num_rows($result)>0)
				{
					$sql = 'UPDATE `tem_room_allotment` SET `tra_roll` = "'.$roll.'", `tra_room`="'.$temp_room.'", `curr_hostel_id`="'.$hostel_id.'", `curr_room`="'.$room.'", `tra_hostel_id`="'.$temp_hostel.'", `tra_branch`="'.$branch.'", `st_date`="'.$st_date.'", `end_date`="'.$end_date.'"';
					$result=mysql_query($sql,$db) or die(mysql_error());
					if($result>0)
						 header("LOCATION:temp_hstlShiftin.php?st=1");
					else
						 header("LOCATION:temp_hstlShiftin.php?st=0");		
				}
				
				else
				{
					$sql = 'INSERT INTO `tem_room_allotment` (`Sno`, `tra_roll`, `tra_room`, `curr_hostel_id`, `curr_room`, `tra_hostel_id`, `tra_branch`, `st_date`, `end_date`) 
					VALUES (NULL, "'.$roll.'", "'.$temp_room.'", "'.$hostel_id.'", "'.$room.'", "'.$temp_hostel.'", "'.$branch.'", "'.$st_date.'", "'.$end_date.'")'; 
					$result=mysql_query($sql,$db) or die(mysql_error());
					if($result>0)
						 header("LOCATION:temp_hstlShiftin.php?st=1");
					else
						 header("LOCATION:temp_hstlShiftin.php?st=0");
				}
		}

}
else
   header("LOCATION:temp_hstlShiftin.php");


?>
