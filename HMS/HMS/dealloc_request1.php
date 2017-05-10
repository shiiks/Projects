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
	$dealloc_desc=(isset($_POST['dealloc']))?trim($_POST['dealloc']):'';
$query="SELECT sl_no,hostel_id,room,student_id FROM room_allocation1 WHERE Roll='".$roll."' AND end_date>NOW()";
$query_run=mysql_query($query,$db);
if(mysql_num_rows($query_run)==FALSE)
{
	echo "error";
}
else
{
$result=mysql_fetch_assoc($query_run);
}
$query2="INSERT INTO `room_deallocation` (sl_no,hostel_id,roll,dealloc_desc,student_id,Req_emp_id,Room,Dealloc_type) VALUES ('".$result['sl_no']."','".$result['hostel_id']."','".$roll."','".$dealloc_desc."','".$result['student_id']."','".$_SESSION['s_admin_username']."','".$result['room']."',7)";

if($query2_run=mysql_query($query2,$db))
{
	$mesg="Request Has Been Submited.";
	?>
	<script>var r=confirm('<?php echo $mesg; ?>');
        if (r == true) {
			window.location="index.php";
		}
		else
		{
			window.location="index.php";
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