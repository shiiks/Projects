<?php

session_start();

$roll = trim($_REQUEST['roll']);
$end_date = trim($_REQUEST['end_date']);

//echo $roll."    -     ".$end_date;
//die();

include('../include/db.inc.php');


//$date_flag = 1;

$query = mysql_query("SELECT `start_date`, `end_date` FROM `room_allotment` WHERE `roll` = '".$roll."' ORDER BY `end_date` DESC ; ");

if( mysql_num_rows($query) == FALSE ) //FALSE means there is no entry of this roll no. in database (i.e., new student)
{
	//$date_flag = 1; 			//it is okay to insert since there is no entry at all
}
else		//there is atleast one entry in the database, i.e., the student is either changing the hostel or coming again after leaving the hostel
{
	while($row_query = mysql_fetch_array($query))
	{
		//echo $start_date."        ----        ".$row_query['end_date']."<br />";
		if( ($row_query['start_date'] <= $end_date) && ( $end_date <= $row_query['end_date']) )
		{
			$old_start_date = $row_query['start_date'];
			$old_end_date = $row_query['end_date'];
			//echo $start_date."        XXXX        ".$row_query['end_date']."<br />";
			//$date_flag = 0;		//it is not okay to insert into database as the student is already assigned a hostel
								//first he/she will have to leave the hostel, then only he/she can be alloted a new one
			break;
		}	
	}//end of while
}

if($old_start_date != NULL)
{
	//$chk_hostel = ' SELECT `hostel` FROM `admin` WHERE `admin_id`="'.$_SESSION['s_admin_username'].'"; ';

	$moderator_hostel = mysql_fetch_array( mysql_query(' SELECT `hostel` FROM `admin` WHERE `admin_id`="'.$_SESSION['s_admin_username'].'"; ') );
	
	$hostel = $moderator_hostel['hostel'];
	
	if($hostel == "")
		$hostel = "All Hostels";	//since admin can have access of any hostel
	
	
	$stu_hostel = mysql_fetch_array( mysql_query('SELECT `hostel_id`, `room` FROM `room_allotment` WHERE `roll` = "'.$roll.'" AND `start_date`="'.$old_start_date.'" AND `end_date`="'.$old_end_date.'" ; ') );
	
	
	/*************************************************************************************************************
	echo "Admin: ".$_SESSION['s_admin_username']."<br />";
	echo "Old Start Date: ".$old_start_date;
	echo "<br />Old End Date: ".$old_end_date;
	echo "<br />Admin Hostel: ".$hostel;
	echo "<br />Student Hostel: ".$stu_hostel['hostel_id']."<br />";
	**************************************************************************************************************/
	
	if($hostel == "All Hostels" || $hostel == $stu_hostel['hostel_id'])
	{
		$current_hostel = $stu_hostel['hostel_id'];
		$current_room_no = $stu_hostel['room'];
		
		$row_student_details = mysql_fetch_array(mysql_query(' SELECT `name`, `branch`, `photo` FROM `student` WHERE `roll`= "'.$roll.'" ; '));
			
		
		if($row_student_details['photo']!='')
			$photo =$row_student_details['photo'];
		else
			$photo ='user.png';
	
		?>
		<table width="800" border="0" align="center">
		<tbody>
			<tr class="qbullet">
				<td class="qbullet" valign="top" width="41%"><span class="style5">Name (as in University Records)</span></td>
				<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
				<td valign="top" width="30%">
					<span class="style5">
						<input name="name" id="name" type="text" value="<?php echo $row_student_details['name']; ?>" readonly />
					</span>
				</td>
				<td rowspan="3" id="Stu_photo" onclick="window.location='CstuDet.php?roll=<?php echo $roll; ?>'">
					<img src="../../E-helpDesk/StuImages/<?php echo $photo; ?>" height="80px" width="60px" />
				</td>
			</tr>
			<tr class="qbullet">
				<td class="qbullet" valign="top" width="41%"><span class="style5">Name of branch</span></td>
				<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
				<td valign="top" width="30%">
					<span class="style5">
						<input name="branch" id="branch"  type="text" value="<?php echo $row_student_details['branch'];?>" readonly />
					</span>
				</td>
			</tr>
			<tr class="qbullet">
				<td class="qbullet" valign="top" width="41%"><span class="style5">Currrent Hostel Name</span></td>
				<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
				<td valign="top" width="30%">
					<span class="style5">
						<input name="hostel_id" id="hostel_id"  type="text" value="<?php echo $current_hostel; ?>" readonly />
					</span>
				</td>
			</tr>
			<tr class="qbullet">
			<!-- ####################################      ATTENTION     ########################################## 
				 Don't Change the string "Current Room No" written in this <td>, as this (string - "Current Room No")
												is used in transfer_by_roll page
				 ####################################      ATTENTION     ##########################################  -->   
				<td class="qbullet" valign="top" width="41%"><span class="style5">Current Room No</span></td>
				<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
				<td valign="top" width="30%">
					<span class="style5">
						<input name="room" id="room"  type="text" value="<?php echo $current_room_no; ?>" readonly />
					</span>
				</td>
			</tr>
			<tr class="qbullet">
				<td class="qbullet" valign="top" width="41%"><span class="style5">Start Date (in this hostel)</span></td>
				<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
				<td valign="top" width="30%">
					<span class="style5">
						<input name="start_date" id="start_date"  type="text" value="<?php echo $old_start_date; ?>" readonly />
					</span>
				</td>
			</tr>
		</tbody>
		</table>
		<?php
	}
	else
	{
		?>
		<div align="center">
			This student does NOT belong to your hostel.<br />You can't deallocate this student!!!
		</div>
		<?php
	}	
}
else
	{
		?>
		<div align="center">
		<?php echo $roll."<br>".$end_date; 		?>
		<?php echo "maa ka laura"; ?>
			This student does NOT belong to any hostel at this point of time.
		</div>
		<?php
	}
?>