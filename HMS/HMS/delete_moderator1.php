			<?php 
			session_start();
			include "../include/db.inc.php";
			include "../include/warning.php";
                    if(isset($_REQUEST['hostel']))
                         {
							$hostel = (isset($_REQUEST['hostel'])) ? $_REQUEST['hostel'] : '';
							$getadmin_id = 'select admin_id from `admin` where hostel="'.$hostel.'"';   
							$getresult=mysql_query($getadmin_id) or die(mysql_error());
							$record=  mysql_fetch_array($getresult);
							$output=  mysql_num_rows($getresult);
							if($output){						
									$query='delete from `admin_login` where `admin_id`="'.$record['admin_id'].'"';
									$result=mysql_query($query,$db) or die(mysql_error());
									if($result > 0)//if exits then
									header('location:delete_moderator.php?st=1');
									else
									header('location:delete_moderator.php?st=0');
									}
								 else
								header('location:delete_moderator.php?st=3');
					       }
					  
					    
			        ?>