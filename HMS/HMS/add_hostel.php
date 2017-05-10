<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
              <title> HMS::ADD HOSTEL</title>

<style>
#hostel_id{
text-transform:uppercase;	
}
</style>

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
                    <h3>ADD NEW HOSTEL</h3>

<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="add_hostel" action="add_hostel1.php" method="post" style="margin-left:250px">
                        <table cellpadding="5" cellspacing="15">
                        <tr>
                        <td>Hostel Id:*</td><td><input type="text" name="hostel_id" id="hostel_id" placeholder="KP1 or QC2"  /></td>
                        <td ><span style="color:#F00; font-size:10px;">Insert Hostel Id in capital letter</span></td>
                        </tr>
                        <tr>
                        <td>Hostel Name:*</td><td><input type="text" name="hostel_name"   /></td>
                        </tr>  
                        <tr>
                        <td>Hostel Capacity:*</td><td><input type="text" name="hostel_capacity"   /></td>
                        </tr>  
                        <tr>
                        <td>Hostel Location:*</td><td><input type="text" name="hostel_location"   /></td>
                        </tr>  
                        <tr><td> </td>   
                        <td> <input type="submit" value="Submit" name="submit"   /></td>
                        </tr>   
                        </table>
                        </form>
<script type='text/javascript'>
// <![CDATA[
var add_hostelValidator = new Validator("add_hostel");

add_hostelValidator.EnableOnPageErrorDisplay();
add_hostelValidator.SetMessageDisplayPos("right");

add_hostelValidator.EnableMsgsTogether();
add_hostelValidator.addValidation("hostel_id","req","Please fill in Hostel Id");
add_hostelValidator.addValidation("hostel_name","req","Please fill in Hostel Name");
add_hostelValidator.addValidation("hostel_capacity","req","Please fill in Hostel Capacity");
add_hostelValidator.addValidation("hostel_location","req","Please fill in Hostel Location");

// ]]>
</script>


                <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("New Hostel is Added")</script>';					   

						  }?>
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  