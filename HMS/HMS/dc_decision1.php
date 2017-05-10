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

						<h3>DC Decision</h3>
						<form method="POST">
                        Roll:<?php echo $result['Roll'];  ?> &nbsp &nbsp &nbsp &nbsp
						<?php echo $result['photo'];  ?><br><br>
						Name:<?php echo $result['name'];  ?><br><br>
						Hostel:<?php echo $result['hostel_id'];  ?><br><br>
						Room No.:<?php echo $result['room'];  ?><br><br>
						Date:<?php echo $result['reporting_date'];  ?><br><br>
						Parent Call:<input type="checkbox" name="indis[]" value="parent_call"/><br><br>
						Fine:<input type="checkbox" name="indis[]" value="fine"/><br><br>
						DC:<input type="checkbox" name="indis[]" value="dc"/><br><br>
						Debarred:<input type="checkbox" name="indis[]" value="debarred"/><br><br>
						Suspension:<input type="checkbox" name="indis[]" value="suspension"/><br><br>
						<input type="submit" name="Sssubmit" value="submit"/>
						
						</form>
						<?php
							if(!empty($_POST['Sssubmit']))
							{
								foreach($_POST['indis'] as $check)
								{
									if($check=='dc')
									{
										?>
										<script>window.location="decision.php";</script>
										<?php
									}
									else
									{
										?>
										<script>window.location="fine.php";</script>
										<?php
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