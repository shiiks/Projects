<?php

//this page is for displaying the search result of a hostel, this displays all the students of a selected hostel
//this page is one of the ajax pages for search.php
//the ajax function (in the search.php) which sends values to this page is getStuByHst()

$hostel_id = trim($_REQUEST['id']);

include('../include/db.inc.php');

$current_date = date('Y-m-d');

$getrollsql='SELECT `roll` FROM `room_allotment` WHERE `hostel_id` = "'.$hostel_id.'" AND (`end_date` > "'.$current_date.'") ; ';
$resut1=mysql_query($getrollsql);
$getrows=mysql_num_rows($resut1);

if($getrows >0)
{
	?>

					<div style="height:40px; text-align:center" >
						Filter By:&nbsp;&nbsp; 
						Course :
                            <select name="course" size="1" id="course" onChange="getbranch(this.value)">
                               <option value="" selected disabled>SELECT</option> 
								<?php
                                $sql="select * from `course`";
                                $query = mysql_query($sql);
                                while($row = mysql_fetch_array($query)){
                                echo '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';  
                                }  
                                ?>
                            </select>
                     
					&nbsp;&nbsp;
                    
						Branch :<select name="branch" id="branch" onChange="getdetByBranch(this.value)">
						<option value="" selected="selected" disabled="disabled">SELECT</option>
						</select>
					
					&nbsp;&nbsp;
					Section:<select name="section" id="section" size="1" onChange="getStudetBySection(this.value)">
                    <option value="" selected="selected" disabled="disabled">SELECT</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>    
                    <option value="3">3</option>    
                    <option value="4">4</option>    
                    <option value="5">5</option>    
                    <option value="6">6</option>    
                    <option value="7">7</option>    
                    <option value="8">8</option>    
                    </select> &nbsp;&nbsp;
					Sem:<select name="semester" id="semester" size="1" onChange="getStuDetBySeme(this.value)">
                    <option value="" selected="selected" disabled="disabled">SELECT</option>
                       
                    </select>
                    <div  class="stucount">
                      <strong><?php echo '(Total - '.$getrows.')';?></strong>
                     </div>
     				</div>
					<div id="stulist">
					<table cellspacing="10" cellpadding="5" > <tr>
                    <?php
					$count=0;
while($gethosteldata = mysql_fetch_array($resut1)){
			$sql='select `name`,`roll`,`photo` from `student` where `roll` = "'.$gethosteldata['roll'].'"';
			$result=mysql_query($sql);
			$getdata = mysql_fetch_array($result);
		if($getdata['photo']!='')
		$photo =$getdata['photo'];
		else
		$photo ='user.png';//defaut image of student
		if($count ==8){
			$count=0;
			echo '</tr><tr>';
		echo'  <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'" >
				   <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img><br>
                  <span class="style5" style="font-size:12px;">'.$getdata["name"].' </span>
				 </td>';
		}
		else
		{
				echo'  <td style="width:100px; float:left;" onclick="getdetail('.$getdata["roll"].')" title="'.$getdata["roll"].'" >
				   <img src="../../E-helpDesk/StuImages/'.$photo.'" align="middle" height="110px" width="80px"></img><br>
                  <span class="style5" style="font-size:12px;">'.$getdata["name"].' </span>
				 </td>';
		}
				$count++;

}?>
</tr></table></div>
<?php }
else
                        echo '<div id="stulist"><table width="100%" align="center">
                        <tbody><tr>   
						<td align="center">
						<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> </tr>
						</tbody></table></div>';
	
						
	?>