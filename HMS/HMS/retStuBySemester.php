<?php
error_reporting(E_ALL ^ E_NOTICE);
$section = trim($_REQUEST['section']);
$semester = trim($_REQUEST['id']);
$hostel_id = trim($_REQUEST['hostel']);
$branch = trim($_REQUEST['branch']);
$count=0;
$count1=0;
$sec = $branch.$section;
//echo $sec;
include('../include/db.inc.php');
if($branch !="" && $section==""){
	    //echo $hostel_id;
		$getrollsql='select `roll` from `room_allotment` where `hostel_id` = "'.$hostel_id.'"  ';
		$resut1=mysql_query($getrollsql);
		$getrows=mysql_num_rows($resut1);
		//echo $getrows;
		if($getrows >0){
echo '<div id="stulist">
<table cellspacing=10 cellpadding=5> <tr>';
		while($gethosteldata = mysql_fetch_array($resut1)){
			$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$gethosteldata['roll'].'" and `sem`="'.$semester.'" and `branch` ="'.$branch.'" ';
			$result=mysql_query($sql);
			$noOfrows=mysql_num_rows($result);
			 //echo $noOfrows;
				if($noOfrows > 0){
					
				$getdata = mysql_fetch_array($result);
					if($getdata['photo']!='')
						$photo =$getdata['photo'];
					else
						$photo ='user.png';//defaut image of student
					   if($count1 ==8){
			   $count1=0;
			echo '</tr><tr>';
									echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
					   }else{
						   	echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
						   
						   
						   
					   }
					   $count1++;
			   
				}
				else
					 $count++;
		}//end of while loop
		echo '</tr></table></div>';
		if($count ==$getrows){
			echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
			
		}
		}
		else
								echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
  }//end of if loop
else if($branch !="" && $section!=""){
	    //echo $hostel_id;
		$getrollsql='select `roll` from `room_allotment` where `hostel_id` = "'.$hostel_id.'" ';
		$resut1=mysql_query($getrollsql);
		$getrows=mysql_num_rows($resut1);
		//echo $getrows;
		if($getrows >0){
			$count1=0;
echo '<div id="stulist">
<table cellspacing=10 cellpadding=5> <tr>';
		while($gethosteldata = mysql_fetch_array($resut1)){
			$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$gethosteldata['roll'].'" and `sem`="'.$semester.'" and `section`="'.$sec.'" and `branch` ="'.$branch.'"';
			$result=mysql_query($sql);
			$noOfrows=mysql_num_rows($result);
			 //echo $noOfrows;
				if($noOfrows > 0){
					
				$getdata = mysql_fetch_array($result);
					if($getdata['photo']!='')
						$photo =$getdata['photo'];
					else
						$photo ='user.png';//defaut image of student
					if($count1 ==8){
			   $count1=0;
			echo '</tr><tr>';
									echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
					}else{
						echo' <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'"  >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
						
					}
					$count1++;
				}
				else
							  $count++;
		}//end of while loop
		echo '</tr></table></div>';
		if($count ==$getrows){
			echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
			
		}
		}
		else
								echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
  }//end of if loop
  elseif($branch=="")
  {
	  //echo $semester.$hostel_id;
	  $getrollsql='select `roll` from `room_allotment` where `hostel_id` = "'.$hostel_id.'" ';
		$resut1=mysql_query($getrollsql);
		$getrows=mysql_num_rows($resut1);
		if($getrows >0){
			$count1=0;
echo '<div id="stulist">
<table cellspacing=10 cellpadding=5> <tr>';
		while($gethosteldata = mysql_fetch_array($resut1)){
			$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$gethosteldata['roll'].'" and `sem`="'.$semester.'" ';
			$result=mysql_query($sql);
			$noOfrows=mysql_num_rows($result);
			//echo $noOfrows;
				if($noOfrows > 0){
				$getdata = mysql_fetch_array($result);
					if($getdata['photo']!='')
						$photo =$getdata['photo'];
					else
						$photo ='user.png';//defaut image of student
					if($count1 ==8){
			   $count1=0;
			echo '</tr><tr>';
		  echo'<td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')"  title="'.$getdata["roll"].'" >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
					}else{
					
				 echo'<td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')"  title="'.$getdata["roll"].'" >
						 <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img>
									  <span class="style5" style="font-size:12px;">
									   '.$getdata["name"].'
									  </span>
									   </td>';
				}
				$count1++;
			   
				}
				else
							  $count++;
		}//end of while loop
		echo '</tr></table></div>';
		if($count ==$getrows){
			echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
			
		}
		}
		else
								echo '  <table width="100%" align="center">
								<tbody><tr>   
								<td align="center">
								<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
								</tbody></table>';
  }
  
						
	?>