<?php
//this page is the process page of reg_student.php
//when the form is submitted from reg_student.php it directs it here to process it.
//it basically updates the data to room_allocation1 table

session_start();



include '../include/db.inc.php';
//filter incoming values
include '../include/warning.php';
if($_POST['Submit'])
{
	$name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
	$hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';
	
	$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';
	
	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	
	$room=(isset($_POST['room']))?trim($_POST['room']):'';
	
	$start_date=(isset($_POST['start_date']))?trim($_POST['start_date']):'';
	
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
	
	//to check if the end_date entered by the user is more than the start_date(automatically fetched by the system)
	if($start_date > $end_date)
	{
		$date_valid_flag = 0;	//means end_date is invalid
	}
	
	
	
	if($date_valid_flag == 1)	//if end_date is valid, then only proceed
	{
		//we have to check the end_date now.
		//if the end_date provided in the table is past date of current start_date, then only the student would be alloted the room

		$date_flag = 1;		//to check if the end_date is before current start_date or not, if it is not, this will be set to 0
		
		$query = mysql_query("SELECT `end_date`,`reason` FROM `room_allocation1` WHERE `roll` = '".$roll."' ; ");
		
		if( mysql_num_rows($query) == FALSE ) //FALSE means there is no entry of this roll no. in database (i.e., new student)
		{
			$date_flag = 1; 			//it is okay to insert since there is no entry at all
		}
		else		//there is atleast one entry in the database, i.e., the student is either changing the hostel or coming again after leaving the hostel
		{
			while($row_query = mysql_fetch_array($query))
			{
				//echo $start_date."        ----        ".$row_query['end_date']."<br />";
				if($start_date < $row_query['end_date'] || $row_query['reason']==1)
				{
					//echo $start_date."        XXXX        ".$row_query['end_date']."<br />";
					$date_flag = 0;		//it is not okay to insert into database as the student is already assigned a hostel
					echo $row_query['reason'];					//first he/she will have to leave the hostel, then only he/she can be alloted a new one
					break;
				}	
			}//end of while
		}
		
		if($date_flag == 0)
		{
			//echo "Fail!!! Hostel already alloted";
			header('location:reg_student.php?st=3');
		}
		else
		{
			$initial_flag = "i";
			$q="SELECT student_id FROM student WHERE roll='".$roll."' AND validity_date>NOW()";
			$q_run=mysql_query($q,$db);
			if(mysql_num_rows($q_run)==FALSE)
			{
				echo 'not ok.';
			}
			else{
				$re=mysql_fetch_assoc($q_run);
			}
			$query='insert into room_allocation1(student_id,hostel_id, roll, room, start_date, end_date, flag) values ("'.$re['student_id'].'","'.mysql_real_escape_string($hostel,$db).'",
												  '.' "'.mysql_real_escape_string($roll,$db).'",
												  '.' "'.mysql_real_escape_string($room,$db).'",
												  '.' "'.mysql_real_escape_string($start_date,$db).'",
												  '.' "'.mysql_real_escape_string($end_date,$db).'",
												  '.' "'.$initial_flag.'")';
		
		
			$query3 = mysql_query('select student_roll from student_login where student_roll="'.$roll.'" ');
			if( !(mysql_num_rows($query3) > 0) )
			{
			
				$query2='insert into student_login(student_roll,password)values("'.mysql_real_escape_string($roll,$db).'",
																	 '.' "'.mysql_real_escape_string($roll,$db).'")';
				
				$result2=mysql_query($query2,$db) or die(mysql_error());
			}
		
			$result=mysql_query($query,$db) or die(mysql_error());
			if($result>0)
			{
							#$string=$_POST['Message'];
							#$roll=$_POST['number'];
							/*require_once('connect.php'); //connecting to the server
							$query  ="SELECT name,branch,permanent_mobile FROM student WHERE roll=:roll";
							$sth = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
							$excute=$sth->execute(array(':roll' => $roll));
							
							if(! $excute )
							{
							exit;
							} 
	
							$result=$sth->fetchall(); // we have to count the no of users with this email id
							
							$row = $result[0];
							$name = $row['name'];
							$branch = $row['branch'];
							$tele = $row['permanent_mobile'];
							if( $tele != '0000000000'){
							$string.= "E-Allotment Ticket\r\n".$name." - ".$roll."\r\nHostel: ".$hostel." Room: ".$room.".\r\nWelcome to Hostel. KIIT University.\r\n-Office of the Dy.Registrar (H)";
							//echo '<a href="http://sms.osmosis.co.in/sendsms?uname=kiithostel&pwd=kiit1234&senderid=KIITHL&to=', urlencode($tele),'&msg=', urlencode($string),'&route=T">Send</a>';
		?>
							
	<script type="text/javascript">
	//function openCentralWindow(url)
	//{
	var width=250;
	var height=250;//defining size of the window of 3rd party sms api reply
	var url="http://sms.osmosis.co.in/sendsms?uname=kiithostel&pwd=kiit1234&senderid=KIITHL&to= <?php echo urlencode($tele); ?> &msg= <?php echo urlencode($string); ?> &route=T";
	var windowFeatures = "width=" + width + ",height=" + height +",status,resizable";
    myWindow = window.open(url, "Send sms", windowFeatures);
	//}
	</script>
		
			<?php	//echo "Success!!! Hostel Alloted";
			echo 'Message sent. <a href="reg_student.php?st=1">Click here</a> to go back.';
			}
			else{
			echo 'Contact no not available. <a href="reg_student.php?st=1">Click here</a> to go back.';
			} */
			
			header("LOCATION:reg_student.php?st=1"); ## message part not applied.
			}#end of parent if block when result > 0 
			else
			{
				//echo "Failed to insert in database";
				header("LOCATION:reg_student.php?st=0");
			}
		}
	}
	else
	{
		//echo "The format of End Date entered was incorrect!!!";
		header("LOCATION:reg_student.php?st=4");
	}
}
else
{
   header("LOCATION:reg_student.php");

}

?>