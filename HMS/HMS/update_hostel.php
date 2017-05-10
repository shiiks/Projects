<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
              <title> HMS::UPDATE HOSTEL</title>
<style>
#hostel_id {
text-transform:uppercase;	
}

</style>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$hostel = 'active';
			include "menu.php";
			$id = $_REQUEST['id'];
	        $get_hostel_data_sql = 'select * from `hostel` where `Sno`="'.$id.'"';   
			$get_hostel_data_query=mysql_query($get_hostel_data_sql) or die(mysql_error());  
			$get_hostel_data_result=  mysql_fetch_array($get_hostel_data_query);
		//$data['type']
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <h3 id="title">UPDATE HOSTEL DETAILS</h3>
                     <form name="update_hostel" action="update_hostel1.php" method="post" enctype="multipart/form-data" style="margin-left:250px">
                        <input type="hidden" name="hostel_Sno"  value="<?php echo $get_hostel_data_result['Sno']; ?>"/>                        <table cellpadding="5" cellspacing="15">
                        <tr>
                        <td width="25%">Hostel Id:*</td>
                        <td width="30%">
                        <input type="text" name="hostel_id" id="hostel_id" value="<?php echo $get_hostel_data_result['hostel_id']; ?>"/>                  </td>
                         <td rowspan="3" width="45%">
                        <img src="../../e-helpdesk/images/<?php echo $get_hostel_data_result['photo'];?>"   width="100%"/>
                         </td>
                        </tr>
                        <tr>
                        <td>Hostel Name:*</td><td><input type="text" name="hostel_name" value="<?php echo $get_hostel_data_result['hostel_name']; ?>"  /></td>
                        </tr>  
                        <tr>
                        <td>Hostel Capacity:*</td><td><input type="text" name="hostel_capacity"  value="<?php echo $get_hostel_data_result['hostel_capacity']; ?>" /></td>
                        </tr>  
                        <tr>
                        <td>Hostel Description:*</td><td colspan="2"><textarea name="hostel_desc"  cols="40" rows="3"/><?php echo $get_hostel_data_result['description']; ?></textarea></td>
                        </tr> 
                        <tr>
                        <td>Hostel Location:*</td><td colspan="2"><textarea name="hostel_location"  cols="40" rows="3"/><?php echo $get_hostel_data_result['hostel_location']; ?></textarea></td>
                        </tr> 
                        <tr>
                        <td>Hostel Image:</td><td colspan="2"><input type="file" name="hostel_image"  /></td>
                        </tr>  
                        <tr>
                        <td colspan="3"> <input type="submit" value="Submit" name="submit"   style="margin-left:200px;" /></td>
                        </tr>   
                        </table>
                        </form>
               
                  </div>
              </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  