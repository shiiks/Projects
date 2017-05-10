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
            <title >HMS | DC Decision</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<?php

$query="SELECT i.Ticket_no,i.Roll,i.reporting_date,i.Indisciplinary_desc,r.hostel_id,s.branch,s.name FROM indisciplinary_dc_reports i,room_allocation1 r,student s WHERE i.Forward_status=1 AND i.roll=r.roll AND i.roll=s.roll AND r.end_date>NOW() AND i.Closure_status=0 AND DC_Date IS NULL";
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
						<th>Indisplinary desciption</th>
						<th>Date Of Activity</th>
						<th>Action</th>
						</tr>
						<?php
							while($ticket=mysql_fetch_assoc($query_run))
	                        {
								
						?>
						<tr>
							<td><?php echo $ticket1=$ticket['Ticket_no']; $_SESSION['Ticket_no']=$ticket1; ?></td>
							<td><?php echo $ticket['name']; ?></td>
							<td><?php echo $_SESSION['roll']=$ticket['Roll']; ?></td>
							<td><?php echo $ticket['branch']; ?></td>
							<td><?php echo $ticket['hostel_id']; ?></td>
							<td><?php echo $ticket['Indisciplinary_desc']; ?></td>
							<td><?php echo $ticket['reporting_date']; ?></td>
							<td><form method="POST"/>
							    <input id="actionyes" name="yes" type="submit" value="Action"/>
								<input id="actionno" name="no" type="submit" value="No Action"/>
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

if(isset($_POST['yes']))
{
		$mesg="Request Has Been Submited.";
		?>
	    <script>var r=confirm('<?php echo $mesg; ?>');
        if (r == true) {
			window.location="dc_decision1.php";
		}
		else
		{
			window.location="index.php";
		}
	   </script>
		<?php
}

if(isset($_POST['no']))
{
	$query5="UPDATE indisciplinary_dc_reports SET Closure_status=1 WHERE Ticket_no='".$ticket1['Ticket_no']."'";
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