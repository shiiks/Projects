<?php

session_start();

include('../include/warning.php');

error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Reports</title>
			
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
<form method="POST" action="testcheck3.php">
   <table width="800" border="0" align="center">
                        <tbody>
                         <tr class="qbullet">
                                <td class="qbullet" valign="top" width="41%"><span class="style5">Name of Hostel</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <select name="hostel" size="1" id="hostel">
                                            <option value="" selected="selected" disabled>Select One</option>
											<?php
                                            if($data['type']=='SA')
                                            {
                                            $sql = "select hostel_id from hostel";
                                            $query = mysql_query($sql);
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['hostel_id'];?>" >
                                            <?php echo $row['hostel_id']; ?>
                                            </option>
                                            <?php } }
                                            else
                                            {
                                                $sql1= "select hostel_id from hostel where hostel_id= '".$data2['hostel']."'";
                                                $query5=mysql_query($sql1);
                                                while($row1 = mysql_fetch_array($query5))
                                                { ?>
                                             <option value="<?php echo $row1['hostel_id'];?>" >
                                            <?php echo $row1['hostel_id']; ?>
                                            </option>
                                             <?php   
                                                }}?>
                                        </select>
                                    </span>
                                </td>
                           	</tr>
                            
                        </tbody>
   </table>

   <br>
   <center><input type="submit" name="submit" value="submit"></center>
   </form>
<script type='text/javascript'>
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
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  
<?php
if($_POST['Submit'])
{
	$mesg="Request Has Been Submited.";
	?>
	<script>alert('<?php echo $mesg; ?>');</script>
	<?php
}
?>