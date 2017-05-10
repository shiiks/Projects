<?php session_start();
 include'include/db.inc.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Admin::Change Password</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

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
							$query = 'SELECT admin_id FROM admin_login WHERE ' .
							'admin_id = "' . $_SESSION['s_admin_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';
							$result=mysql_query($query,$db) or die(mysql_error());
							
							if(mysql_num_rows($result) > 0)//if exits then
							{
							
							$query1 = 'update admin_login set password = "'. mysql_real_escape_string($new_pass, $db).'",bit="1" WHERE ' .
							'admin_id = "' . $_SESSION['s_admin_username'] . '" AND ' .
							'password = "' . mysql_real_escape_string($old_pass, $db) . '"';	
							
							$result1=mysql_query($query1,$db) or die(mysql_error());		
							
							if($result1 >0)	
							{
//bit change code here........
							  header("location:way.php");
							}
							else   
							   header("location:admin_update_pass.php");					
							}
							else
							{
							$msg = "Old Password Not Matched";
							}
						}
                        ?>  

<div id='f1_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="f1" action="admin_update_pass.php" method="post" onSubmit="" style="margin-left:100px;">
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
<script type='text/javascript'>
// <![CDATA[
var f1Validator = new Validator("f1");

f1Validator.EnableOnPageErrorDisplay();
f1Validator.SetMessageDisplayPos("right");

f1Validator.EnableMsgsTogether();
f1Validator.addValidation("opass","req","Please fill in old password");
f1Validator.addValidation("npass","req","Please fill in new password");
f1Validator.addValidation("npass","minlen=5","The length of the input for new password should be at least 5.");
f1Validator.addValidation("npass","eqelmnt=cpass","npass should be equal to cpass");
f1Validator.addValidation("cpass","req","Please fill in confirm password");
f1Validator.addValidation("cpass","minlen=5","The length of the input for confirm password should be at least 5.");
f1Validator.addValidation("cpass","eqelmnt=npass","cpass should be equal to npass");

// ]]>
</script>

 

                     </div>
                       <!-- main code end here -->
               <div class="cleaner"></div>
            </div>

          
            <div class="cleaner"></div>
        </div> <!-- end of main -->
    </div> <!-- end of main wrapper -->
  </div> <!-- end of wrapper -->


</body>
</html>