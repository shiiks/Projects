<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();


include ('../include/db.inc.php');
include('../include/warning.php');   //this will take to the login page if the user has not logged in
error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Deallocation Pending Requset</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<?php

$query="SELECT d.ticket_no,d.roll,d.sl_no,d.dealloc_desc,d.hostel_id,d.Room,s.branch,s.name FROM room_deallocation d,student s WHERE d.student_id=s.student_id AND d.closure_status=0";
$query_run=mysql_query($query,$db);
if(mysql_num_rows($query_run)==FALSE)
{
	$mesg="No Pending Records.";
	?>
	<script>
		var r=confirm('<?php echo $mesg; ?>');
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
	
?>
</head>
   <body>
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'active';
			include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    
						<?php
                        include "scripts/validation.php";
                        ?>

						<h3>Pending Request</h3>
						<table border="1" width="100%">
						<tr>
						<th>Ticket No</th>
						<th>Name</th>
						<th>Roll</th>
						<th>Branch</th>
						<th>Hostel</th>
						<th>Deallocation Description</th>
						<th>Room</th>
						<th>Deallocation Type</th>
						<th>Action</th>
						</tr>
						<?php
							while($ticket=mysql_fetch_assoc($query_run))
	                        {
								 $sl_no=$ticket['sl_no']; 
						?>
						<tr>
							<td><?php echo $ticket1=$ticket['ticket_no']; ?></td>
							<td><?php echo $ticket['name']; ?></td>
							<td><?php echo $ticket['roll']; ?></td>
							<td><?php echo $ticket['branch']; ?></td>
							<td><?php echo $ticket['hostel_id']; ?></td>
							<td><?php echo $ticket['dealloc_desc']; ?></td>
							<td><?php echo $ticket['Room']; ?></td>
							<td><form method="POST">
									Room/Hostel Change:<input id="change" type="radio" name="dealloc" value="roomchange"/><br>
								    &nbsp Leave Hostel:<input id="leave" type="radio" name="dealloc" value="hostelleave"/>
						            </td>
							<td>
							    <input id="actionyes" name="yes" type="submit" value="Approve"/>
								<input id="actionno" name="no" type="submit" value="Reject"/>
								</form>
							</td>
						</tr>
						<?php
							}
							?>
					<?php
                        }
				    ?>
					<?php

if($_POST['yes'])
{
	$check=$_POST['dealloc'];
	if($check=="roomchange")
	{
		$query4="UPDATE room_deallocation SET closure_status=1,Approval_status=1,Approval_emp='".$_SESSION['s_admin_username']."',Dealloc_type=7,Dealloc_date=NOW() WHERE ticket_no='".$ticket1."'";
		$query6="UPDATE room_allocation1 SET end_date=NOW(),reason=7 WHERE sl_no='".$sl_no."'";
	}
	else if($check=="hostelleave")
	{
		$query4="UPDATE room_deallocation SET closure_status=1,Approval_status=1,Approval_emp='".$_SESSION['s_admin_username']."',Dealloc_type=3,Dealloc_date=NOW() WHERE ticket_no='".$ticket1."'";
		$query6="UPDATE room_allocation1 SET end_date=NOW(),reason=3 WHERE sl_no='".$sl_no."'";
	}
	else
{
	echo 'Please Select The Radiobox.';
}
	
	if($query4_run=mysql_query($query4,$db) && $query6_run=mysql_query($query6,$db))
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
}


else if($_POST['no'])
{
	$query5="UPDATE room_deallocation SET closure_status=1,Approval_status=0,Approval_emp='".$_SESSION['s_admin_username']."' WHERE ticket_no='".$ticket1."'";
	if($query5_run=mysql_query($query5,$db))
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
	echo "Try Again Later.";
}
}
?>
						</table>
						
						<script type='text/javascript'>
							function check(){
                        
                        <?php  if($_SESSION['s_admin_username'] =="admin12"){ ?>
                        return true;
                        <?php } else {?>
                        return false;
                        <?php } ?>
						}
						
						</script>
						
                        </div>	                    
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>  
    </body>
</html> 