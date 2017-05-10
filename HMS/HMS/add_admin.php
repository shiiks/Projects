<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::ADD ADMIN</title>

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
                      <h3>ADD ADMINISTRATOR</h3>

<div id='add_admin_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form  action="add_admin1.php" method="post" style="margin-left:250px" name="add_admin">
                    <table cellpadding="5" cellspacing="15" >
                 
                    <tr>
                    <td>Employee Id:*</td><td><input type="text" name="emp_id"  /></td>
                    </tr>
                     <tr>
                    <td>Employee Name:*</td><td><input type="text" name="name"   /></td>
                    </tr>  
                      <tr>
                    <td>Gender:*</td><td><select name="gender" id="gender">
                    <option value="SELECT Gender" selected="selected">SELECT Gender</option>
                    <option value="M">Male</option>    
                    <option value="F">Female</option>    
                    </select>
                    </td>
                    </tr>
                     
                     <tr>
                    <td>Designation:*</td><td><input type="text" name="design"   /></td>
                    </tr>
                    
                    <tr>
                    <td>Mobile No:*</td><td><input type="text" name="emp_mobile"   /></td>
                    </tr> 
                     <tr>
                    <td>Email Id:*</td><td><input type="text" name="email"   /></td>
                    </tr>
                     <tr>
                    <td></td><td><input type="submit" name="submit"  value="Submit"  /></td>
                    </tr>
                    
                    
                    
                    </table>
                    </form>
<script type='text/javascript'>
// <![CDATA[
var add_adminValidator = new Validator("add_admin");

add_adminValidator.EnableOnPageErrorDisplay();
add_adminValidator.SetMessageDisplayPos("right");

add_adminValidator.EnableMsgsTogether();
add_adminValidator.addValidation("emp_id","req","Please fill in Employee Id");
add_adminValidator.addValidation("name","req","Please fill in Employee Name");
add_adminValidator.addValidation("design","req","Please fill in Designation");
add_adminValidator.addValidation("emp_mobile","req","Please fill in employee mobile");
add_adminValidator.addValidation("emp_mobile","maxlen=10","The length of the input for Mobile No should not exceed 10");
add_adminValidator.addValidation("emp_mobile","minlen=10","The length of the input for Mobile No should be at least 10.");
add_adminValidator.addValidation("email","req","Please fill in Email Id");
add_adminValidator.addValidation("email","email","The input for Email Id should be a valid Email Id value");
add_adminValidator.addValidation("gender","dontselect=SELECT Gender","Please select an option for gender");
add_adminValidator.addValidation("hostel","dontselect=SELECT","Please select an option for hostel");

// ]]>
</script>


                   <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("New Administrator is Added")</script>';					   

						  }?>
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  