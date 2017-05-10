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
					$employee_id=(isset($_POST['fac_id']))?trim($_POST['fac_id']):'';
					$emp_name=(isset($_POST['name']))?trim($_POST['name']):'';
					$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';
					$Scetion=(isset($_POST['section']))?trim($_POST['section']):'';
					$Semester=(isset($_POST['sem']))?trim($_POST['sem']):'';
					$mobile=(isset($_POST['fac_phone']))?trim($_POST['fac_phone']):'';
					$email=(isset($_POST['email']))?trim($_POST['email']):'';
					
					$section1=$branch.$Scetion;
                     echo $section1;	
					 echo $Scetion;				
					$query='insert into fac_advisor(fac_id,fac_name,section,semester,fac_phone_no,fac_email) values ("'.mysql_real_escape_string($employee_id,$db).'",
                                          '.' "'.mysql_real_escape_string($emp_name,$db).'",
                                          '.' "'.mysql_real_escape_string($section1,$db).'",
                                          '.' "'.mysql_real_escape_string($Semester,$db).'",
                                           '.' "'.mysql_real_escape_string($mobile,$db).'",
                                          '.' "'.mysql_real_escape_string($email,$db).'")';
										  					
															
	          $query1='insert into fac_login(fac_id,password) values ("'.mysql_real_escape_string($employee_id,$db).'",
                      '.' "'.mysql_real_escape_string($employee_id,$db).'")';
					  
					  $result1=mysql_query($query1,$db) or die(mysql_error());
                       $result=mysql_query($query,$db) or die(mysql_error());
					   
					   
					   if($result>0)
					     {
							 header("Location:add_fac.php?msg=5");
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