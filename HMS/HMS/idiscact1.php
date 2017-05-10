<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$Post = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <?php
					$first_name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
					$hostel=(isset($_POST['hostel_id']))?trim($_POST['hostel_id']):'';
					$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';
					$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
					$cause=(isset($_POST['cause']))?trim($_POST['cause']):'';
					$amnt=(isset($_POST['amnt']))?trim($_POST['amnt']):'';
					$perd=(isset($_POST['perd']))?trim($_POST['perd']):'';

					$query='insert into indisciplinary_activity(name,hostel,roll,branch,cause,amount,duration) values ("'.mysql_real_escape_string($first_name,$db).'",
                                          '.' "'.mysql_real_escape_string($hostel,$db).'",
                                          '.' "'.mysql_real_escape_string($roll,$db).'",
                                          '.' "'.mysql_real_escape_string($branch,$db).'",
                                           '.' "'.mysql_real_escape_string($cause,$db).'",
										   '.' "'.mysql_real_escape_string($amnt,$db).'",
                                          '.' "'.mysql_real_escape_string($perd,$db).'")';
										  					

                       $result=mysql_query($query,$db) or die(mysql_error());
					   
					   if($result>0)
					     {
							 header("Location:idiscact.php?msg=5");
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