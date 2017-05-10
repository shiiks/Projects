<?php
$roll = trim($_REQUEST['id']);
include('../include/db.inc.php');
$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$roll.'"';
$result=mysql_query($sql);
$getrows=mysql_num_rows($result);
if($getrows >0){
$getdata = mysql_fetch_array($result);
		if($getdata['photo']!='')
		$photo =$getdata['photo'];
		else
		$photo ='user.png';

			echo'       
						<div onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="85px"></img><br>
                          <span style="font-size:12px;">'.$getdata["name"].'</span>
						</div>
                     ';
						?>
						<input type="button" align="right" value="Reset" onclick="window.location='search_roll.php'"/>
						
			<?php			
						}
						else
                       echo ' <table >
                        <tbody>
                        
                        <tr class="qbullet">   
						<td colspan="2" align="center">
						<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
                  
						</tbody></table>';
	
						
	?>