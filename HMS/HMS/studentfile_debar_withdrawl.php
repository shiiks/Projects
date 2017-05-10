<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();

include('../include/warning.php');   //this will take to the login page if the user has not logged in

error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);
?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Debared Withdrawl</title>
			
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

						<h3>Debared Withdrawl</h3>
                        <form action="student_uploads.php" method="POST" enctype="multipart/form-data" style="padding-top:20px">
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">Student Consent</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <input type="file" name="fileToUpload" id="fileToUpload"/>
                                        <input type="submit" value="Upload" name="submit"/>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        </form>
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