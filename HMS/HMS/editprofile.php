<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
			<title>HMS::EDIT PROFILE</title>
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
                                <div>
                        <?php 
							$query4 = 'select * from admin where admin_id="'.$_SESSION['s_admin_username'].'"';
							$result4=  mysql_query($query4) or die(mysql_error());
							$data1 = mysql_fetch_array($result4);
							include "css/valid.php";
								?>  

<div id='edit_student_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="edit_student" method="post" action="editprofile1.php">
                      <span  id="thead">Administrator Details</span>
                        <table width="80%" border="0" cellspacing="20" align="center">
               <tr>
                   <td width="40%"><b>Employee Id:</b></td>
                   <td><?php echo $data1['admin_id']; ?></td>
               </tr>
               <tr>
                    <td width="40%"><b> Name: </b></td>
                   <td><input type="text" size="40" name="name" value="<?php echo $data1['Name']; ?>"></input></td>
               </tr>
               <tr>
                   <td><b>Hostel:</b></td>
                   <td><select name="hostel" size="1" id="hostel">
                   <option selected="selected"disabled> <?php echo $data1['hostel']; ?> </option>
                <?php
                $sql = "select hostel_id from hostel";
                $query = mysql_query($sql);
                while($row = mysql_fetch_array($query)){
                ?>
                <option value="<?php echo $row['hostel_id'];?>" >
                <?php echo $row['hostel_id']; ?>
                </option>
                <?php } ?>
              </select></td>
                   
               </tr>
               <tr>
                   <td><b>Designation:</b></td>
                   <td><?php echo $data1['Designation']; ?></td>
                   
               </tr>

               <tr>
                   <td><b>Date of Birth:</b></td>
                   <td><?php echo $data1['date_of_birth']; ?></td>
               </tr>
               
               <tr>
                   <td width="40%"><b>Mobile:</b></td>
                   <td><input type="text" size="40" name="mobile" value="<?php echo $data1['mobile']; ?>"></input></td>
               </tr>
               <tr>
                   <td width="40%"><b>E Mail:</b></td>
                   <td><input type="text" size="40" name="email" value="<?php echo $data1['email']; ?>"></input></td>
               </tr>
            <tr>
           <td  colspan="2" ><input type="submit" name="submit" value="UPDATE" style="margin-left:200px;"></input></td>
               </tr>
               </table>
           </form>
<script type='text/javascript'>
// <![CDATA[
var edit_studentValidator = new Validator("edit_student");

edit_studentValidator.EnableOnPageErrorDisplay();
edit_studentValidator.SetMessageDisplayPos("right");

edit_studentValidator.EnableMsgsTogether();
edit_studentValidator.addValidation("name","req","Please fill in name");
edit_studentValidator.addValidation("mobile","req","Please fill in mobile");
edit_studentValidator.addValidation("mobile","maxlen=10","The length of the input for mobile should not exceed 10");
edit_studentValidator.addValidation("mobile","minlen=10","The length of the input for mobile should be at least 10.");
edit_studentValidator.addValidation("email","email","The input for email should be a valid email value");
edit_studentValidator.addValidation("email","req","Please fill in email");

// ]]>
</script>


                        
                         <!-- upto here -->
                         </div>         
                    </div>
              </div>
           <?php   include "footer.php";?>  
           </div>
    </body>
</html>  