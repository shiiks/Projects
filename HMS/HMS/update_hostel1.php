
                    <?php
					session_start();
					if($_POST['submit']){
						
					include('../include/db.inc.php');
					include('../include/warning.php');
					$file_name = (isset($_FILES['hostel_image']['name']))?trim($_FILES['hostel_image']['name']):'';
					$hostel_Sno=(isset($_POST['hostel_Sno']))?trim($_POST['hostel_Sno']):'';
					$hostel_id=(isset($_POST['hostel_id']))?trim($_POST['hostel_id']):'';
					$hostel_name=(isset($_POST['hostel_name']))?trim($_POST['hostel_name']):'';
					$hostel_capacity=(isset($_POST['hostel_capacity']))?trim($_POST['hostel_capacity']):'';
					$hostel_location=(isset($_POST['hostel_location']))?trim($_POST['hostel_location']):'';
					$description=(isset($_POST['hostel_desc']))?trim($_POST['hostel_desc']):'';
					$new_file_name = $hostel_id.'.jpg';
					$flag="i";

					  if($file_name!=""){
						move_uploaded_file($_FILES['hostel_image']['tmp_name'], "../../E-HelpDesk/images/".$new_file_name);
					   $query='update `hostel` set `hostel_id`="'.mysql_real_escape_string($hostel_id,$db).'",
					                    `hostel_name`="'.mysql_real_escape_string($hostel_name,$db).'",
										`hostel_capacity`="'.mysql_real_escape_string($hostel_capacity,$db).'",
										`description`="'.mysql_real_escape_string($description,$db).'",
										`photo`="'.mysql_real_escape_string($new_file_name,$db).'",
										`hostel_location`="'.mysql_real_escape_string($hostel_location,$db).'",
										`flag`="'.$flag.'"
										 where `Sno` ="'.$hostel_Sno.'"';
					   }
					   else{
						 $query='update `hostel` set `hostel_id`="'.mysql_real_escape_string($hostel_id,$db).'",
					                    `hostel_name`="'.mysql_real_escape_string($hostel_name,$db).'",
										`hostel_capacity`="'.mysql_real_escape_string($hostel_capacity,$db).'",
										`description`="'.mysql_real_escape_string($description,$db).'",
										`hostel_location`="'.mysql_real_escape_string($hostel_location,$db).'",
										`flag`="'.$flag.'"
										 where `Sno` ="'.$hostel_Sno.'"';
					   }
					 

                       $result=mysql_query($query,$db) or die(mysql_error());
					   
					   if($result>0)
							 header("Location:hostel_details.php?msg=4");
					}
					?>
                    
                  