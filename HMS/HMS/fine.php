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

    </head>
   <body >
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
						
						
						$q="SELECT i.Roll,i.reporting_date,r.hostel_id,r.room,s.name,s.photo FROM indisciplinary_dc_reports i,room_allocation1 r,student s WHERE i.Forward_status=1 AND i.roll='".$_SESSION['roll']."' AND i.roll=r.roll AND i.roll=s.roll AND r.end_date>NOW() AND i.Closure_status=0 AND DC_Date IS NULL";
						$q_run=mysql_query($q,$db);
						if(mysql_num_rows==FALSE)
						{
							echo "error";
						}
						else
						{
							$result=mysql_fetch_array($q_run);
						}
						
                        ?>

						<h3>Decision</h3>
						<form method="POST">
                        Roll:<?php echo $result['Roll'];  ?> &nbsp &nbsp &nbsp &nbsp
						<?php echo $result['photo']; ?><br><br>
						Name:<?php echo $result['name'];  ?><br><br>
						Hostel:<?php echo $result['hostel_id'];  ?><br><br>
						Room No.:<?php echo $result['room'];  ?><br><br>
						Date:<?php echo $result['reporting_date'];  ?><br><br>
						Parent Call:<input type="checkbox" name="indis[]" value="parent_call"/><br><br>
						Fine:<input type="checkbox" name="indis[]" value="fine"/><br><br>
						Debarred:<input type="checkbox" name="indis[]" value="debarred"/><br><br>
						Suspension:<input type="checkbox" name="indis[]" value="suspension"/><br><br>
						<input type="submit" name="submit" value="submit"/>
						
						</form>
						<?php
							if(!empty($_POST['submit']))
							{
								foreach($_POST['indis'] as $check)
								{
									if($check=='fine')
									{
										?>
										Amount:<input type="text" name="amount" />
										<input type="submit" name="Submit" value="submit"/>
										<?php
										if(!empty($_POST['amount']))
									{
									$amount=$_POST['amount'];
									$quer="SELECT student_id FROM student WHERE roll='".$_SESSION['roll']."' AND validity_date>NOW()";
									$quer_run=mysql_query($quer,$db);
									if(mysql_num_rows($quer_run)==FALSE)
									{
										echo "No Fine";
									}
									else
									{
										$student_id=mysql_fetch_array($quer_run);
									}
									$mesg="Your request has been submitted.";
									$queryy="INSERT INTO fine_imposed(student_id,roll,emp_id,Fine_amount,indisiplinary_ticket) VALUES ('".$student_id['student_id']."','".$_SESSION['roll']."','".$_SESSION['s_admin_username']."','".$amount."','".$_SESSION['Ticket_no']."')";
									$query8="UPDATE indisciplinary_dc_reports SET Closure_status=1 WHERE Ticket_no='".$_SESSION['Ticket_no']."'";
									$queryy_run=mysql_query($queryy,$db);
									$query8_run=mysql_query($query8,$db);
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
									
								}
								else if($check=='parent_call')
								{
									echo 'done';	
								}
								else if($check=='suspension')
								{
								$query="SELECT sl_no,hostel_id,room,student_id FROM room_allocation1 WHERE Roll='".$_SESSION['roll']."' AND end_date>NOW()";
								$query0="UPDATE indisciplinary_dc_reports SET Closure_status=1 WHERE Ticket_no='".$_SESSION['Ticket_no']."'";
								$query_run=mysql_query($query,$db);
								$query0_run=mysql_query($query0,$db);
								if(mysql_num_rows($query_run)==FALSE)
								{
									echo "error";
								}
								else
								{
									$result=mysql_fetch_assoc($query_run);
			                       ?>
									<form method="POST">
									Debarred:<input id="debar" type="radio" name="dealloc" value="debarred"/><br>
								    &nbsp Suspend:<input id="debar" type="radio" name="dealloc" value="suspension"/>
									<input type="submit" name="Ssubmit" value="Submit" />
						            </form>
											<?php
												if($_POST['Ssubmit'])
												{
													if(!empty($_POST['dealloc']))
													{
														$mesq="Request has Been Submited.";
														if($_POST['dealloc']=="debarred")
														{
															$query2="INSERT INTO room_deallocation(sl_no,hostel_id,student_id,room,roll,Delloc_date,Dealloc_type,status,Approval_emp,indisiplinary_ticket) VALUES ('".$result['sl_no']."','".$result['hostel_id']."','".$result['student_id']."','".$result['room']."','".$_SESSION['roll']."',NOW(),1,1,'".$_SESSION['s_admin_username']."','".$_SESSION['Ticket_no']."')";
											                $query3="UPDATE room_allocation1 SET reason=1,end_date=NOW() WHERE sl_no='".$result['sl_no']."'";
															$query_run2=mysql_query($query2,$db);
															$query_run3=mysql_query($query3,$db);
															
											            }
														else if($_POST['dealloc']=="suspension")
														{
															$query1="INSERT INTO room_deallocation(sl_no,hostel_id,student_id,room,roll,Delloc_date,Dealloc_type,status,Approval_emp,indisiplinary_ticket) VALUES ('".$result['sl_no']."','".$result['hostel_id']."','".$result['student_id']."','".$result['room']."','".$_SESSION['roll']."',NOW(),5,1,'".$_SESSION['s_admin_username']."','".$_SESSION['Ticket_no']."')";
															$query5="UPDATE room_allocation1 SET reason=5,end_date=NOW() WHERE sl_no='".$result['sl_no']."'";
															$query_run4=mysql_query($query4,$db);
															$query_run5=mysql_query($query5,$db);
														}
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
														echo "Please Fill The Fields.";
													}
												}
												else
												{
														echo "Please Submit First.";
												}
								}
								}
							}
							}
						
						?>
  <script>
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
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  