<?php
//this page is reached through delete_student.php
//the roll no. of student to be de-allocated is entered in the form in delete_student.php page and is submit action takes it here
//the whole detail will not be deleted from student table, instead end_date will be added in the corresponding row of room_allotment table

session_start();

include "../include/db.inc.php";
include "../include/warning.php";


//echo $_POST['roll'];
//die();

if(isset($_REQUEST['roll']))
{
	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	$end_date=(isset($_POST['end_date']))?trim($_POST['end_date']):'';

	$end_date_parts = explode('-', $end_date);
	
	$end_date_month = $end_date_parts[1];		//for fetching the month entered by admin
	$end_date_day = $end_date_parts[2];			//for fetching the day entered by admin
	
	$date_valid_flag = 1;	//this flag is to check if the end_date input by user is correct or not | 1 for correct, 0 for incorrect
	
	if($end_date_month == 2)	// for february (NO CONDITION is there to check if the year is a LEAP YEAR)
	{
		if( ($end_date_day < 1) || ($end_date_day > 29) )
		{
			$date_valid_flag = 0;	//means end_date is invalid
		}
	}
	
	//for checking the end_date is valid or not
	if( ($end_date_month > 0) && ($end_date_month < 13) && ($end_date_day > 0) && ($end_date_day < 32))
	{
		if( ($end_date_month == 4) || ($end_date_month == 6) || ($end_date_month == 9) || ($end_date_month == 11) )
		{
			if($end_date_day == 31)
			{
				$date_valid_flag = 0;	//means end_date is invalid
			}
		}
	}
	else
	{
		$date_valid_flag = 0;	//means end_date is invalid
	}
	

	if($date_valid_flag == 1)	//if end_date is valid, then only proceed
	{
	
		$check_entry_in_stu = mysql_query('SELECT `roll` FROM `student` WHERE `roll`="'.$roll.'"; ');   
		
		if( !(mysql_num_rows($check_entry_in_stu) == FALSE) )	//FALSE means there is no entry of this roll no. in database
		{
			$query = mysql_query("SELECT `start_date`, `end_date` FROM `room_allotment` WHERE `roll` = '".$roll."' ORDER BY `end_date` DESC ; ");
			
			//order by end_date 
			
			//there will be many entries in the room_allotment table for a roll no. as he may have changed hostel sometimes and he may have left the hostel and joined again
			//so we have to check the end_date which is more than the current_date, i.e., the entry which denotes that student is present in the hostel, this will be modified, this end_date will be changed to what the Super Admin has entered
			
			$start_date_flag = 0;
			
			while($row_query = mysql_fetch_array($query))
			{
				if($end_date < $row_query['end_date'])
				{
					$start_date = $row_query['start_date'];
					$start_date_flag = 1;
					break;
				}	
			}//end of while
			
			if($start_date_flag == 1)
			{
				$initial_flag = "i";
				
				
				## error in code ### ## sushant sagar ##
				
				#########################################
				
				#######################   FINAL DEALLOCATION QUERY   #######################
				$update_end_date = mysql_query("UPDATE `room_allotment` SET `end_date`='".$end_date."', `flag`='".$initial_flag."' WHERE `start_date`='".$start_date."' ; ");
				
				if( $update_end_date > 0 )
				{
					//echo "De-allocated Successfully";
					header('location:delete_student.php?st=1');
				}
				else
				{
					//echo "Server Error!!! Student Not De-allocated (database not updated)";
					header('location:delete_student.php?st=2');
				}
			}
			else
			{
				//echo "Student is already de-allocated!";
				header('location:delete_student.php?st=5');
			}
		}
		else
		{
			//echo "No such roll exists!!!";
			header('location:delete_student.php?st=3');
		}
		/*
		$output=  mysql_num_rows($getresult);
	
		if($output)
		{						
			$query='delete from `student` where `roll`="'.$roll.'"';
			$result=mysql_query($query,$db) or die(mysql_error());
			
			if($result > 0)//if exits then
				header('location:delete_student.php?st=1');
			else
				header('location:delete_student.php?st=0');
		}
		else
		{
			header('location:delete_student.php?st=3');
		}
		*/
	}//end of $date_valid_flag == 1
	else
	{
		//echo "The format of End Date entered was incorrect!!!";
		header("LOCATION:delete_student.php?st=4");
	}
}
  
	
?>