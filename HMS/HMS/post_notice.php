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
			include "css/valid.php"; 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                     <div>
				  <?php
                  $timezone = "Asia/Calcutta";
                  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                   $datetime = date("d/m/Y"); // create date time 
                   $time	=    date("h:i:s A"); // create date time
                  ?>
                     <span id="thead">Post Notice</span>

<div id='post_notice_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="post_notice" action="" method="post" >
                    <table cellpadding="5" cellspacing="15" width="80%" style="margin-left:150px">
                 
                    <tr>
                    <td>Department:*</td>
                    <td>
                    <select size="1" name="dept">

                            <option value="Department of Biotechnology">
              Department of Biotechnology              </option>
                            <option value="Department of Computer Applications">
              Department of Computer Applications              </option>
                            <option value="Division of Civil Engg,School of Engineering">
              Division of Civil Engg,School of Engineering              </option>
                            <option value="Division of Applied Electronics & Instrumentation,School of Engineering">
              Division of Applied Electronics & Instrumentation,School of Engineering             </option>
                            <option value="Division of Electrical Engg.,School of Engineering">
              Division of Electrical Engg.,School of Engineering              </option>
							<option value="Division of Computer Science Engg.,School of Engineering">
              Division of Computer Science Engg.,School of Engineering              </option>
                            <option value="Division of Electronics & telecom Engg.,School of Engineering">
              Division of Electronics & telecom Engg.,School of Engineering              </option>
                            <option value="Division of Information Tech.,School of Engineering">
              Division of Information Tech.,School of Engineering              </option>
							<option value="Division of Automobile Engg.,School of Engineering">
              Division of Automobile Engg.,School of Engineering              </option>
                            <option value="Division of Mech. Engg.,School of Engineering">
              Division of Mech. Engg.,School of Engineering              </option>
                            <option value="School of Legal Studies">
              School of Legal Studies              </option>
                            <option value="School of Management Studies">
              School of Management Studies              </option>
							<option value="School of Medical Sciences">
              School of Medical Sciences              </option>

                            <option value="">
                            </option>
                      </select>
                    </td>
                    </tr>
                     <tr>
                    <td>Date:*</td><td><input type="text" name="name" value="<?php echo $datetime; ?>"  /></td>
                    </tr>  
                      <tr>
                    <td>Subject:*</td><td>
                   <textarea  name="subject" rows="3" cols="50"></textarea> 
                    </td>
                    </tr>
                      <tr>
                    <td>Body:*</td><td>
                   <textarea  name="body" rows="10" cols="50"></textarea> 
                    </td>
                    </tr> 
 
                    
                    <tr>
                    <td>Forward By(With Designation):*</td>
                    <td> <textarea name="forward" rows="5" cols="20"></textarea> </td>
                    </tr> 

                     <tr>
                    <td></td><td><input type="submit" name="submit"  value="Submit"  /></td>
                    </tr>
                    
                    
                    
                    </table>
                    </form>
<script type='text/javascript'>
// <![CDATA[
var post_noticeValidator = new Validator("post_notice");

post_noticeValidator.EnableOnPageErrorDisplay();
post_noticeValidator.SetMessageDisplayPos("right");

post_noticeValidator.EnableMsgsTogether();
post_noticeValidator.addValidation("name","req","Please fill in name");
post_noticeValidator.addValidation("subject","req","Please fill in subject");
post_noticeValidator.addValidation("body","req","Please fill in body");
post_noticeValidator.addValidation("forward","req","Please fill in forward");

// ]]>
</script>


                     </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  