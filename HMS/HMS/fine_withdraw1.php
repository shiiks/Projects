<?php
//this page is the process page of reg_student.php
//when the form is submitted from reg_student.php it directs it here to process it.
//it basically updates the data to room_allocation1 table

session_start();



include '../include/db.inc.php';
//filter incoming values
include '../include/warning.php';
?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Fine Withdrawl</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<?php
if($_POST['Submit'])
{
	
	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	$query="SELECT student_id from student where roll='".$roll."' and validity_date>NOW();";
	$query_run=mysql_query($query,$db);
	if(mysql_num_rows($query_run)==FALSE)
	{
		echo "No  student id Records";
	}
	else
	{
		$student_id=mysql_fetch_array($query_run);
		
	}
	$query2="SELECT f.ticket_no,f.Fine_amount,f.student_id,f.roll,f.emp_id,i.Indisciplinary_desc,i.reporting_date FROM fine_imposed f, indisciplinary_dc_reports i WHERE i.student_id='".$student_id['student_id']."' AND f.student_id='".$student_id['student_id']."' AND f.payment_status=0 AND f.Withdraw_status=0";
	$query2_run=mysql_query($query2,$db);
	if(mysql_num_rows($query2_run)==FALSE)
	{
		echo "No Records";
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

						<h3>Student Details Having Fine</h3>
						<table border="1" width="100%">
						<tr>
						<th>Ticket No</th>
						<th>Roll</th>
						<th>Fine Amount</th>
						<th>Indisplinary desciption</th>
						<th>Date Of Activity</th>
						<th>Action</th>
						</tr>
						<?php
							while($result=mysql_fetch_assoc($query2_run))
	                        {
								
						?>
						<tr>
							<td><?php echo $ticket=$result['ticket_no'];$_SESSION['ticket_no']=$ticket;?></td>
							<td><?php echo $result['roll']; ?></td>
							<td><?php echo $result['Fine_amount']; ?></td>
							<td><?php echo $result['Indisciplinary_desc']; ?></td>
							<td><?php echo $result['reporting_date']; ?></td>
							<td><form method="POST"/>
							    <input id="actionyes" name="yes" type="submit" value="Withdrawl"/>
								<input id="actionno" name="no" type="submit" value="Change Fine"/>
								</form>
							</td>
						</tr>
						<?php
							}
							?>
					<?php
                        }
}
				    ?>
					<?php

if($_POST['yes'])
{
	    $query3="UPDATE fine_imposed SET Withdraw_status=1 where ticket_no='".$_SESSION['ticket_no']."'";
		$query3_run=mysql_query($query3,$db);
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

else if($_POST['no'])
{
	header('Location:change_date.php');
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