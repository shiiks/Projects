<?php
//this page is the process page of reg_student.php
//when the form is submitted from reg_student.php it directs it here to process it.
//it basically updates the data to room_allotment table

session_start();



include '../include/db.inc.php';
//filter incoming values
include '../include/warning.php';
if($_POST['Submit'])
{
	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	$desc_fine=(isset($_POST['fine']))?trim($_POST['fine']):'';
	$query1="SELECT student_id FROM `student` WHERE roll='".$roll."' AND validity_date> NOW()";
	$query2=mysql_query($query1,$db);
	if(mysql_num_rows($query2)==FALSE)
	{
		echo 'Incorrect ROLL';
		
	}
	else
	{
		$result = mysql_fetch_assoc($query2);
		$student_id = $result['student_id'];
	}

$query="INSERT INTO `indisciplinary_dc_reports` (Roll,Indisciplinary_desc,student_id,reporting_date,Reporting_empid) VALUES ('".$roll."','".$desc_fine."','".$student_id."',NOW(),'".$_SESSION['s_admin_username']."')";
if($query_run=mysql_query($query,$db))
{
	$mesg="Request Has Been Submited.";
	?>
	<script>var r=confirm('<?php echo $mesg; ?>');
        if (r == true) {
			window.location="fine_hostel.php";
		}
		else
		{
			window.location="fine_hostel.php";
		}
	</script>
	<?php
	
}
else
{
	echo 'Sorry,We couldn\'t Submit Your Request At This Time.Please Try Again Later.';
}
}
else
{
	die();//change later
}
?>