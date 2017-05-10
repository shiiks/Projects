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
			$Add = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <?php
					$employee_id=(isset($_POST['emp_id']))?trim($_POST['emp_id']):'';
					$emp_name=(isset($_POST['name']))?trim($_POST['name']):'';
					$gender=(isset($_POST['gender']))?trim($_POST['gender']):'';
					$hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';
					$mobile=(isset($_POST['emp_mobile']))?trim($_POST['emp_mobile']):'';
					$email=(isset($_POST['email']))?trim($_POST['email']):'';
					
					$query='insert into admin(admin_id,Name,sex,hostel,mobile,email) values ("'.mysql_real_escape_string($employee_id,$db).'",
                                          '.' "'.mysql_real_escape_string($emp_name,$db).'",
                                          '.' "'.mysql_real_escape_string($gender,$db).'",
                                          '.' "'.mysql_real_escape_string($hostel,$db).'",
										   '.' "'.mysql_real_escape_string($mobile,$db).'",
                                          '.' "'.mysql_real_escape_string($email,$db).'")';
										  					
															
	          $query1='insert into admin_login(admin_id,password) values ("'.mysql_real_escape_string($employee_id,$db).'",
                      '.' "'.mysql_real_escape_string($employee_id,$db).'")';
					  
					  $result1=mysql_query($query1,$db) or die(mysql_error());
                       $result=mysql_query($query,$db) or die(mysql_error());
					   
					   
					   if($result>0)
					     {
							 header("Location:add_mod.php?msg=5");
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