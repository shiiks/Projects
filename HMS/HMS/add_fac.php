<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
                        <title> HMS::ADD TUTOR MENTOR</title>


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
                      <h3>ADD TUTOR MENTOR</h3>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<form name="add_fac" action="add_fac1.php" method="post" style="margin-left:250px">
                    <table cellpadding="5" cellspacing="15" >
                 
                    <tr>
                    <td>Tutor Mentor Id:*</td><td><input type="text" name="fac_id"  /></td>
                    </tr>
                     <tr>
                    <td>Tutor Mentor Name:*</td><td><input type="text" name="name"   /></td>
                    </tr>  
                      <tr>
                    <td>Branch:*</td><td><select name="branch" id="branch">
                    <option value="SELECT BRANCH" selected="selected" disabled="disabled">SELECT BRANCH</option>
                    <option value="CSE">CSE</option>    
                    <option value="IT">IT</option>    
                    <option value="ETC">ETC</option>    
                    <option value="EE">EE</option>    
                    <option value="EEE">EEE</option>    
                    <option value="AEI">AEI</option>    
                    <option value="CIVIL">CIVIL</option>    
                    <option value="MECH">MECH</option> 
                    <option value="AUTOMOBILE">AUTOMOBILE</option>    
                    
                    </select>
                    </td>
                    </tr>
                      <tr>
                    <td>Section:*</td><td><select name="section" id="section" size="1">
                    <option value="SELECT" selected="selected" disabled="disabled">SELECT</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>    
                    <option value="3">3</option>    
                    <option value="4">4</option>    
                    <option value="5">5</option>    
                    <option value="6">6</option>    
                    <option value="7">7</option>    
                    <option value="8">8</option>    
                    </select>
                    </td>
                    </tr> 
                         <tr>
                    <td>Semester:*</td><td><select name="sem" id="sem">
                    <option value="SELECT" selected="selected" disabled="disabled">SELECT</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>    
                    <option value="3">3</option>    
                    <option value="4">4</option>    
                    <option value="5">5</option>    
                    <option value="6">6</option>    
                    <option value="7">7</option>    
                    <option value="8">8</option>    
                    </select>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>Phone No:*</td><td><input type="text" name="fac_phone"   /></td>
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
var add_facValidator = new Validator("add_fac");

add_facValidator.EnableOnPageErrorDisplay();
add_facValidator.SetMessageDisplayPos("right");

add_facValidator.EnableMsgsTogether();
add_facValidator.addValidation("fac_id","req","Please fill in fac_id");
add_facValidator.addValidation("name","req","Please fill in name");
add_facValidator.addValidation("branch","dontselect=SELECT BRANCH","Please select an option for branch");
add_facValidator.addValidation("section","dontselect=SELECT","Please select an option for section");
add_facValidator.addValidation("sem","dontselect=SELECT","Please select an option for sem");
add_facValidator.addValidation("fac_phone","req","Please fill in fac_phone");
add_facValidator.addValidation("fac_phone","numeric","The input for fac_phone should be a valid numeric value");
add_facValidator.addValidation("fac_phone","maxlen=10","The length of the input for fac_phone should not exceed 10");
add_facValidator.addValidation("fac_phone","minlen=10","The length of the input for fac_phone should be at least 10.");
add_facValidator.addValidation("email","req","Please fill in email");
add_facValidator.addValidation("email","email","The input for email should be a valid email value");

// ]]>
</script>





                           <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("New Faculty is Added")</script>';					   

						  }?>
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  