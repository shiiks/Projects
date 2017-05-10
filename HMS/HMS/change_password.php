<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
			<title>HMS::CHANGE PASSWORD</title>
    </head>
   <body >
        <div class="page">
			<?php 
            include "top.php";
            $profile = 'active';
            include "menu.php";
             ?>  
             <div class="body">
                <div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured">
                                <?php
                        if(isset($_POST['submit']))
						{
							$old_pass = (isset($_POST['opass'])) ? $_POST['opass'] : '';
							$new_pass = (isset($_POST['npass'])) ? $_POST['npass'] : '';
							//$che_pass = (isset($_POST['cpass'])) ? $_POST['cpass'] : '';
							//check in html newpass==cpass
							$query = 'SELECT admin_id FROM admin_login WHERE ' .
							'admin_id = "' . $_SESSION['s_admin_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';
							$result=mysql_query($query,$db) or die(mysql_error());
							
							if(mysql_num_rows($result) > 0)//if exits then
							{
							
							$query1 = 'update admin_login set password = "'. mysql_real_escape_string($new_pass, $db).'" WHERE ' .
							'admin_id = "' . $_SESSION['s_admin_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';	
							
							$result1=mysql_query($query1,$db) or die(mysql_error());		
							
							if($result1 >0)	
							{
							  $msg = 'Password Changed Sucesfully ';
							}
							else   
							$msg = "Sorry!!! Server Busy ...TRY AGAIN LATER";					
							}
							
							else
							{
							$msg = "Old Password Not Matched";
							}
						}
                        ?>  
                        <div style="text-align:center; width:100%; color:#F00;" ><h4><?php echo $msg;?></h4></div>
                          <?php include("admin_update_password.php"); ?>          
                    </div>
              </div>
           <?php   include "footer.php";?>  
           </div>
    </body>
</html>  