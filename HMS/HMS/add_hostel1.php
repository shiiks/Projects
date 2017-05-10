<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />

    </head>
   <body>
        <div class="page">
            <?php 
			include "top.php";
			$Add = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <?php
					$hostel_id=(isset($_POST['hostel_id']))?trim($_POST['hostel_id']):'';
					$hostel_name=(isset($_POST['hostel_name']))?trim($_POST['hostel_name']):'';
					$hostel_capacity=(isset($_POST['hostel_capacity']))?trim($_POST['hostel_capacity']):'';
					$hostel_location=(isset($_POST['hostel_location']))?trim($_POST['hostel_location']):'';
					
					$query='insert into hostel(hostel_id,hostel_name,hostel_capacity,hostel_location) values ("'.mysql_real_escape_string($hostel_id,$db).'",
                                          '.' "'.mysql_real_escape_string($hostel_name,$db).'",
                                          '.' "'.mysql_real_escape_string($hostel_capacity,$db).'",
                                           '.' "'.mysql_real_escape_string($hostel_location,$db).'")';
										  					
	
                       $result=mysql_query($query,$db) or die(mysql_error());
					   
					   
					   if($result>0)
					     {
							 header("Location:add_hostel.php?msg=5");
						  $msg=5;
						 }
					?>
                    
                    </div>

                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  