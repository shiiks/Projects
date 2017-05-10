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
            <title >HMS | Decision</title>
			
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
						<form method="POST" enctype="multipart/form-data" action="new_decision.php">
                        Roll:<?php echo $result['Roll'];  ?> &nbsp &nbsp &nbsp &nbsp
						<?php echo $result['photo'];  ?><br><br>
						Name:<?php echo $result['name'];  ?><br><br>
						Hostel:<?php echo $result['hostel_id'];  ?><br><br>
						Room No.:<?php echo $result['room'];  ?><br><br>
						Date:<?php echo $result['reporting_date'];  ?><br><br>
						Status:<textarea name="desc"></textarea><br><br>
						All Hostel:<input type="checkbox" name="hostel" value="all_hostel"/>
						Specific:<input type="checkbox" name="hostel" value="specific"/><br><br>
						Upload File:<input type="file" name="fileToUpload" id="fileToUpload"/><br><br>
						Enter date of DC:<input type="date" name="dc_date" /><br><br>
						<input type="submit" name="submit" value="Submit"/>
						</form>
						<?php
							if(isset($_POST['submit']))
							{
								$target_dir = "dcuploads/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								// Check if image file is a actual image or fake image

								// Check if file already exists
								if (file_exists($target_file)) {
									echo "Sorry, file already exists.";
									$uploadOk = 0;
								}
								// Check file size
								if ($_FILES["fileToUpload"]["size"] > 500000) {
									echo "Sorry, your file is too large.";
									$uploadOk = 0;
								}
								// Allow certain file formats
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "pdf" && $imageFileType != "doc") {
									echo "Sorry, only JPG, JPEG, PNG, DOC & PDF files are allowed.";
									$uploadOk = 0;
								}
								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
									echo "Sorry, your file was not uploaded.";
								// if everything is ok, try to upload file
								} else {
									if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
										echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
								}
								if($_POST['dc_date'] && $_POST['desc'])
								{
									if(!empty($_POST['dc_date']) &&!empty($_POST['desc']))
									{
										$query9="UPDATE indisciplinary_dc_reports SET DC_Date='".$_POST['dc_date']."' WHERE Ticket_no='".$_SESSION['Ticket_no']."'";
									    $query9_run=mysql_query($query9,$db);
										$query10="INSERT INTO indisciplinary_dc_reports ('dc_action') VALUES ('".$_POST['dc_date']."') WHERE Ticket_no='".$_SESSION['Ticket_no']."'";
										$query10_run=mysql_query($query10,$db);
										header('Location:decision2.php');
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