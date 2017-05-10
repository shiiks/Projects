<?php
$room_id = strtoupper(trim($_REQUEST['id']));
$hostel_id = trim($_REQUEST['hostel_id']);
$id_name = trim($_REQUEST['id_name']);
$roll = trim($_REQUEST['roll']);

include('../include/db.inc.php');
$sql = "SELECT * FROM `room_allotment`  WHERE  room='".$room_id."' and hostel_id='".$hostel_id."'";
$result=mysql_query($sql);
$getrows=mysql_num_rows($result);

$sql = "SELECT * FROM `hostel_room`  WHERE  room_id='".$room_id."' and hostel_id='".$hostel_id."'";
$result=mysql_query($sql);
//$getrows=mysql_num_rows($result);
//exit;
if($getrows >=0){
$capacity =0;
$getdata = mysql_fetch_array($result);
$capacity=isset($getdata['room_capacity'])?trim($getdata['room_capacity']):0;

echo $getrows.$capacity;

  if($getrows < $capacity){
	  
	  mysql_query('UPDATE `room_allotment` SET `room` = "'.$room_id.'" , `hostel_id` = "'.$hostel_id.'"  WHERE `roll` = "'.$roll.'"');
	  mysql_query('UPDATE `student_transfered` SET `transfer_bit` = 0 WHERE  `roll` = "'.$roll.'"');
	  
	?>
    	 
              <img src="images/right.png" height="30" width="20" >  
	  
 <?php }
  else{
	?>
     <input type="text" size="8"  style="text-transform:uppercase" value="" onChange="checkRoom(this.value,'<?php echo $id_name ?>','<?php echo $hostel_id ?>','<?php echo $roll ?>')">
              &nbsp; &nbsp;			 
              <img src="images/wrong.jpg" height="30" width="20" >
<?php }

}else{
	?>
     <input type="text" size="8"  style="text-transform:uppercase" value="" onChange="checkRoom(this.value,'<?php echo $id_name ?>','<?php echo $hostel_id ?>','<?php echo $roll ?>')">
              &nbsp; &nbsp;			 
              <img src="images/wrong.jpg" height="30" width="20" >  
     <?php }?>