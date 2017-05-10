<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('../include/db.inc.php');

$roll = $_REQUEST['roll'];
$hostel = $_REQUEST['hostel'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Hostel</title>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />

</head>

<body>

        <div class="page">
            <?php 
			include "top.php";
			$reg = 'home';
			include "menu.php";
			
			
?>

						<form action="changing_hostel_process.php" method="post">
                        <div style="padding-top:20px;">
                        
						<table width="800" border="0" align="center">
                        <tbody>
                        <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Roll No.</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <input type="text" value="<?php echo $roll;?>" name="roll" readonly="readonly" />
                        </td>   
                        </tr>
                        
                        <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Old Hostel.</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <input type="text" value="<?php echo $hostel;?>" name="old_hostel" readonly="readonly" />
                        </td>   
                        </tr>
                        
                        <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">New Hostel</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <span class="style5">
                        
                        <select name="hostel" size="1" id="hostel">
                        <option value="" selected="selected" disabled="disabled">SELECT</option>
							<?php
                            $sql = "select hostel_id from hostel order by hostel_id ";
                            $query = mysql_query($sql);
                            while($row = mysql_fetch_array($query)){
                            ?>
                            <option value="<?php echo $row['hostel_id'];?>" >
                            <?php echo $row['hostel_id']; ?>
                            </option>
                            <?php } ?>

                        </select>

                        </span>
                        </td></tr>
                                                
                        <tr class="qbullet">
                        <td colspan="3" height="23" valign="top">
                        <div id="select_room" style="border:#000 thin groove; display:none"></div>
                        <div align="center">
                        <input name="Update" value="Update" type="submit" ></input>
                        </div>    </td>
                        </tr>
                        </tbody>
                        </table>
                        </div>
                        </form>

</body>
</html>