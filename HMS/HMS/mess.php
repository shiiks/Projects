<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::MESS MENU FORM</title>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$mess = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <h3> MESS MENU FORM</h3>
                  <form id="adminform" name="adminform" method="post" action="../newappn.php?act=submit" onSubmit="return validate_form (this)">
<table width="50%" align="center" style="margin-left:350px; padding-top:10px;">
 <tr class="qbullet">
	<td width="5%" valign="top" class="qbullet"><span class="style5">Hostel Id</span></td>
    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top" width="56%">
      <span class="style5">
      <select name="hnm" id="hnm">
        <option value="" selected="selected" disabled>Select One
                        </option>
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
  </td></tr>
<tr class="qbullet">
<td  valign="top" class="qbullet"><span class="style5">Day</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
<select size="1" name="day">

                            <option value="Sunday">
              Sunday             </option>
                            <option value="Monday">
              Monday              </option>
                            <option value="Tuesday">
              Tuesday              </option>
                            <option value="Wednesday">
              Wednesday            </option>
                            <option value="Thursday">
   			Thursday	              </option>
							<option value="Friday">
             Friday      </option>
                            <option value="Saturday">
       Saturday             </option>
                            <option value="">
                            </option>
                      </select>
    </span></td>
  </tr>
  <tr class="qbullet">
<td  valign="top" class="qbullet">Time</td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
      <select size="1" name="menu">

                            <option value="Breakfast">
              Breakfast            </option>
                            <option value="Lunch">
              Lunch             </option>
                            <option value="Snacks">
              Snacks              </option>
                            <option value="Dinner">
              Dinner            </option>
            
                            <option value="">
                            </option>
          </select>
    </span></td>
  </tr>
  <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Menu </span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top"><span class="style5">
      <textarea name="address" cols="30" id="address"></textarea>
    </span></td>

  </tr>
    <tr class="qbullet">
  <td  height="23" valign="top">
    <div align="center">
      <input name="Submit" value="Submit" type="submit">
      </div>    </td>
</tr>

</table>
</form>
                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  