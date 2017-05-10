<?php
error_reporting(E_ALL ^ E_NOTICE);
$branch = trim($_REQUEST['id']);
$hostel_id = trim($_REQUEST['hostel']);
					$count=0;

//echo $hostel_id.$branch;
include('../include/db.inc.php');
$getrollsql='select * from `room_allotment` as rt,student as stu where rt.hostel_id = "'.$hostel_id.'" and rt.roll=stu.roll  and stu.branch ="'.$branch.'"';
$resut1=mysql_query($getrollsql);
$getrows=mysql_num_rows($resut1);
if($getrows >0){
//echo "test code 1";
				echo '<div id="stulist">
<table cellspacing=10 cellpadding=5> <tr>';
						
while($gethosteldata = mysql_fetch_array($resut1)){
$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$gethosteldata['roll'].'" ';
$result=mysql_query($sql);
$getdata = mysql_fetch_array($result);

		if($getdata['photo']!='')
		$photo =$getdata['photo'];
		else
		$photo ='user.png';//defaut image of student
if($count ==8){
			$count=0;
			echo '</tr><tr>';
echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
	 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
	  <span class="style5" style="font-size:12px;">
	   '.$getdata["name"].'
	  </span>
	   </td>';
  }else
  {
echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
	 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
	  <span class="style5" style="font-size:12px;">
	   '.$getdata["name"].'
	  </span>
	   </td>';
		}
				$count++;

}
echo '</tr></table></div>';
}
else
                        echo '  <table width="100%" align="center">
                        <tbody><tr>   
						<td align="center">
						<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
						</tbody></table>';
	
						
	?>