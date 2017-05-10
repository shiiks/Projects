<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::ADD MODERATOR</title>

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
                      <h3>ADD MODERATOR</h3>

<div id='add_admin_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form  action="add_mod1.php" method="post" style="margin-left:250px" name="add_admin">
                    <table cellpadding="5" cellspacing="15" >
                 
                    <tr>
                    <td>Hostel Id :*</td><td><input type="text" name="emp_id"  /></td>
                    </tr>
                     <tr>
                    <td>Hostel Name:*</td><td><input type="text" name="name"   /></td>
                    </tr>  
                      <tr>
                    <td>Type Of Hostel:*</td><td><select name="gender" id="gender">
                    <option value="SELECT Gender" selected="selected">SELECT Gender</option>
                    <option value="M">Male</option>    
                    <option value="F">Female</option>    
                    </select>
                    </td>
                    </tr>
                      <tr>
                    <td>Hostel:*</td><td><select name="hostel" id="section" size="1">
                    <option value="SELECT" selected="selected" >SELECT</option>
                          <?php
                        $sql = "select hostel_id from hostel";
                        $query = mysql_query($sql);
                        while($row = mysql_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['hostel_id'];?>" >
                        <?php echo $row['hostel_id']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    </td>
                    </tr> 
                    <tr>
                    <td>Phone No:*</td><td><input type="text" name="emp_mobile"   /></td>
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
add_adminValidator.addValidation("emp_id","req","Please fill in emp_id");
add_adminValidator.addValidation("name","req","Please fill in name");
add_adminValidator.addValidation("gender","dontselect=SELECT Gender","Please select an option for gender");
add_adminValidator.addValidation("hostel","dontselect=SELECT","Please select an option for hostel");
add_adminValidator.addValidation("emp_mobile","req","Please fill in emp_mobile");
add_adminValidator.addValidation("emp_mobile","numeric","The input for emp_mobile should be a valid numeric value");
add_adminValidator.addValidation("emp_mobile","maxlen=15","The length of the input for emp_mobile should not exceed 15");
add_adminValidator.addValidation("emp_mobile","minlen=10","The length of the input for emp_mobile should be at least 10.");
add_adminValidator.addValidation("email","email","The input for email should be a valid email value");

// ]]>
</script>





                   <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("New Moderator is Added")</script>';					   

						  }?>
                    </div>
              </div>
          </div>
         <?php   include "footer.php";  ?>
   </div>  
</body>
</html>  