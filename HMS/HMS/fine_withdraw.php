<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();

include('../include/warning.php');   //this will take to the login page if the user has not logged in

error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING)
?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Room Allotment</title>
			
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
                        ?>

						<h3>Fine Withdrawl</h3>
                        <form id="allot" name="reg_student" method="post" action="fine_withdraw1.php" style="padding-top:20px">
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">Roll No.</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <input name="roll" id="roll" size="12" type="integer" ></input>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <div id="getstudetails">
                        	<!-- This div is to display the details of Student whose roll no. is entered -->
                        </div>
                        <table width="800" border="0" align="center">
                        <tbody>
                        	
                            <tr class="qbullet">
                                <td colspan="3" height="23" valign="top">
                                    <div id="select_room" style="border:#000 thin groove; display:none"></div>
                                    <div align="center"><input name="Submit" value="Submit" type="submit" /></div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        </form>
                        
							<script type='text/javascript'>
                            // <![CDATA[
                            var reg_studentValidator = new Validator("reg_student");
                            
                            reg_studentValidator.EnableOnPageErrorDisplay();
                            reg_studentValidator.SetMessageDisplayPos("right");
                            
                            reg_studentValidator.EnableMsgsTogether();
                            reg_studentValidator.addValidation("roll","req","Please fill in Roll Number");
                            reg_studentValidator.addValidation("roll","numeric"," Roll Number should be a valid numeric value");
                            reg_studentValidator.addValidation("room","req","Please fill in room");
							reg_studentValidator.addValidation("hostel","dontselect=","Please select an option for Hostel");
                            
                            // ]]>
                            </script>
                        </div>
                        <script type="text/javascript">
                        function testadmin()
                        {
                        if(check()){
                        document.getElementById("addadmin").href ="add_admin.php";
                        }
                        else{
                        alert("Your are not Authorised to access this Link");
                        }
                        }
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