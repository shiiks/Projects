<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::ADD Course</title>

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
                      <h3>ADD Course</h3>

<div id='add_admin_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form  action="add_course1.php" method="post" style="margin-left:250px" name="add_course">
                    <table cellpadding="5" cellspacing="15" >
                     <tr>
                    <td>Course Name:*</td><td><input type="text" name="name1"   /></td>
                    </tr>  
                    
                     
                    <tr>
                    <td>Course Duration(in years):*</td><td><input type="text" name="dur"   /></td>
                    </tr> 
                    <tr>
                    <td></td><td><input type="submit" name="submit"  value="Submit"  /></td>
                    </tr>
                    
                    
                    
          </table>
                    </form>
<script type='text/javascript'>
// <![CDATA[
var add_adminValidator = new Validator("add_course");

add_adminValidator.EnableOnPageErrorDisplay();
add_adminValidator.SetMessageDisplayPos("right");

add_adminValidator.EnableMsgsTogether();

add_adminValidator.addValidation("name1","req","Please fill in name");
add_adminValidator.addValidation("dur","req","Please fill in Course Duration");
add_adminValidator.addValidation("dur","numeric","The input for Course Duration should be a valid numeric value");


// ]]>
</script>





                   <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("New Course is Added")</script>';					   

						  }
						  if($msg==4)
					      {
				 echo '<script language="javascript">alert("Try Again !!")</script>';					   

						  }?>
                    </div>
              </div>
          </div>
         <?php   include "footer.php";  ?>
   </div>  
</body>
</html>  