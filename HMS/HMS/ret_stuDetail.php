<?php
$roll = trim($_REQUEST['id']);
include('../include/db.inc.php');

$get_dates=mysql_fetch_array(mysql_query('SELECT `start_date`, `end_date` FROM `room_allotment` WHERE `roll`="'.$roll.'" ; '));

$start_date = $get_dates['start_date'];
$end_date = $get_dates['end_date'];

$sql='select `name`,`branch`,`photo` from `student` where `roll` = "'.$roll.'"';
$result=mysql_query($sql);
$getrows=mysql_num_rows($result);
if($getrows >0){
$getdata = mysql_fetch_array($result);
if($getdata['photo']!='')
		$photo =$getdata['photo'];
		else
		$photo ='user.png';

    echo '
                        <table width="800" border="0" align="center">
                        <tbody>
                        
                        <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Name (as in University Records)</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td valign="top" width="30%">
                        <span class="style5">
                        <input name="first_name" id="first_name"  type="text" value="'.$getdata["name"].'" disabled="disabled"></input>
                        <input name="first_name" id="first_name"  type="hidden" value="'.$getdata["name"].'"></input>
                        </span>
                        </td> ';
						?>
						<td rowspan="3" id="Stu_photo" onclick="window.location='CstuDet.php?roll=<?php echo $roll; ?>'">
						<?php
						echo '<img src="../../E-helpDesk/StuImages/'.$photo.'" height="80px" width="60px"  ></img></td>
						</tr>
                        <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Name of branch</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="30%">
                        <span class="style5">
                        <input name="branch" id="branch"  type="text" value="'.$getdata["branch"].'" disabled="disabled"></input>
                        <input name="branch" id="branch"  type="hidden" value="'.$getdata["branch"].'" ></input>
                        </span>
                        </td>
						</tr>
						<tr ><td ></td><td ></td><td ></td></tr>';
					if( ($start_date=="0000-00-00") && ($end_date=="0000-00-00") )
					{
						echo '
						<tr class="qbullet">
                        	<td class="qbullet" valign="top" width="41%"><span class="style5">Hostel Start Date</span></td>
                            <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                            <td valign="top" width="56%">
                        		<span class="style5">
                                <input type="text" placeholder="YYYY-MM-DD" name="start_date" />
                        		</span>
							</td>                                
                        </tr>
                        <tr class="qbullet">
                        	<td class="qbullet" valign="top" width="41%"><span class="style5">Hostel End Date</span></td>
                            <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                            <td valign="top" width="56%">
                        		<span class="style5">
                                <input type="text" placeholder="YYYY-MM-DD" name="end_date" />
                        		</span>
							</td>                                
                        </tr>
						</tbody></table>';
					}
}
else
echo ' <table width="800" border="0" align="center">
                        <tbody>
                        
                        <tr class="qbullet">   
						<td colspan="2" align="center">
						<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORDS FOUND ..<br>Please register first </span>
						
						</td>
						</tr>
                  
						</tbody></table>';
	
						
	?>