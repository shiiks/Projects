

<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();


include ('../include/db.inc.php');
include('../include/warning.php');   //this will take to the login page if the user has not logged in
error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);



$query="SELECT s.student_id,r.roll FROM student s,room_allocation1 r WHERE r.roll=s.roll";
$query_run=mysql_query($query,$db);
if(mysql_num_rows($query_run)==FALSE)
{
	echo 't';
}
else
{
	
	while($result=mysql_fetch_array($query_run))
	{
		$query2="UPDATE room_allocation1 SET student_id='".$result['student_id']."' WHERE roll='".$result['roll']."'";
		mysql_query($query2,$db) or die(mysql_error());
	}
}
?>
<script type='text/javascript'>
							function check(){
                        
                        <?php  if($_SESSION['s_admin_username'] =="admin12"){ ?>
                        return true;
                        <?php } else {?>
                        return false;
                        <?php } ?>
						}
						
</script>