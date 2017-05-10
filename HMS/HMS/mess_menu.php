<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS:: MESS MENU</title>
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
                    <h3>MESS MENU</h3>
                    <form action="view_mess_menu.php" method="post" style="margin-left:300px; margin-top:50px;">
            <table>
                <tr>
                    <td>Hostel</td>
                    <td><select name="hostel" size="1" id="hostel" >
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
              </select></td>
               
                
                    <td>Time</td>
               <td> <select name="time" size="1">
                      <option selected="selected" value="dinner">
        Dinner        </option>

                <option value="evening">
        Evening       </option>

                <option value="lunch">

        Lunch        </option>
                <option value="morning">
        Morning        </option>
                </select>
               </td>
                
                    <td><input type="submit" name="submit" value="view"> </td>
                </tr>
            </table>
        </form>
                    
                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  