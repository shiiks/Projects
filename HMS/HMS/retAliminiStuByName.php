<?php
$name = trim($_REQUEST['id']);
include('../include/db.inc.php');
$sql = "SELECT * FROM student_backup WHERE name LIKE '%".$name."%' || roll LIKE '%".$name."%'";$result=mysql_query($sql);
$getrows=mysql_num_rows($result);
echo ' <div  class="stucount" style="float:right">
                      <strong> (Total - '.$getrows.')</strong>
                     </div><br><br>';
if($getrows >0){
		
		?>
        
        <div id="stulist">
					<table cellspacing="10" cellpadding="5" > <tr>
                    <?php
					$count=0;
while($getdata = mysql_fetch_array($result)){

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
<?php				
}
		else
		echo ' <table >
		<tbody>
		<tr class="qbullet">   
		<td colspan="2" align="center">
		<span style="color:#00F;font-size:18px; text-align:center; ">NO RECORD FOUND...<br> </td> 
		</tr>
		</tbody></table>';
	
						
	?>