<?php session_start(); ?><?php
error_reporting(E_ALL ^ E_NOTICE);
if($_REQUEST['st'] == '1')
    $mes = "Deleted Sucessfully";
else if($_REQUEST['st'] == '0')
    $mes = "SORRY, TRY AGAIN!!";
else if($_REQUEST['st'] == '3')
    $mes = "No such Moderator exists!!";
else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>


<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title> HMS::DELETE MODERATOR</title>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$delete = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                  
            <h3>Delete Complete Moderator Record</h3>
            <form name="delete" method="post" action="" >
            <table  border="0" align="center" style="padding-top:10px;">
            <tbody><tr class="qbullet"></tr>
            <tr>
                    <td>Hostel:*</td><td><select name="hostel" id="hostel" size="1">
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
             <td colspan="3" align="center">
                  <input name="Submit" value="Submit" type="button" onClick="confirm_delete()">
             </td>
            </tr>
            </tbody></table>
            </form>
                    
              </div>
              </div>
              <script language="javascript" type="text/javascript">
              function confirm_delete(){
				  var hostel = document.delete.hostel.value;
					if(confirm("Are you sure to Delete?"))
					   parent.location ="delete_moderator1.php?hostel="+hostel;
					 else
					  return true;
 			  }
              </script>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  