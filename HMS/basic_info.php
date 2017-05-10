<?php session_start();
 include'include/db.inc.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>E-helpdesk::Change Password</title>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Tab</div>
  <div class="CollapsiblePanelContent">Content</div>
</div>

<div id="templatemo_wrapper"> 
  <div  >
    	<div id="templatemo_main">
          	<div>
				
                    <!--  main code start here -->
              <div>
                       <?php
                        if(isset($_POST['submit']))
						{
							$old_pass = (isset($_POST['opass'])) ? $_POST['opass'] : '';
							$new_pass = (isset($_POST['npass'])) ? $_POST['npass'] : '';
							//$che_pass = (isset($_POST['cpass'])) ? $_POST['cpass'] : '';
							//check in html newpass==cpass
							$query = 'SELECT student_roll FROM student_login WHERE ' .
							'student_roll = "' . $_SESSION['stu_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';
							$result=mysql_query($query,$db) or die(mysql_error());
							
							if(mysql_num_rows($result) > 0)//if exits then
							{
							
							$query1 = 'update student_login set password = "'. mysql_real_escape_string($new_pass, $db).'",bit="1" WHERE ' .
							'student_roll = "' . $_SESSION['stu_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';	
							
							$result1=mysql_query($query1,$db) or die(mysql_error());		
							
							if($result1 >0)	
							{
//bit change code here........
							  header("location:index.php");
							}
							else   
							   header("location:student_update_password.php");					
							}
							else
							{
							$msg = "Old Password Not Matched";
							}
						}
                        ?>  
                <form name="f1" action="student_update_password.php" method="post" onSubmit="" style="margin-left:100px;">
<h2>Change password</h2>
                        <input type="hidden" name="service" value="UPDATEPASS">
                    
                         <table width="80%" border="0" cellspacing="20" align="center" cellpadding="5">
                        <tr>
                        <td align="right" width="40%">Old password:</td><td><input type="password" name="opass">
                        </td></tr>
                        <tr><td align="right">New Password:</td><td><input type="password" name="npass"></td></tr>
                        <tr>
                        <td align="right">Confirm Password:</td><td><input type="password" name="cpass"></td>
                        </tr>
                        <tr>
                         <td colspan="2" align="center">
                          
                            <input type="submit"  class="button" name="submit" value="Change Password"></td>
                        </tr>
                        </table>
                     </form> 

              </div>
                       <!-- main code end here -->
               <div class="cleaner"></div>
            </div>

          
            <div class="cleaner"></div>
        </div> <!-- end of main -->
  </div> <!-- end of main wrapper -->
</div> <!-- end of wrapper -->


<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
</script>
</body>
</html>