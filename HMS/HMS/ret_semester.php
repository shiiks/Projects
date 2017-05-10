<?php
    include('../include/db.inc.php');
         $course = $_REQUEST['id'];
 echo '<option value="" selected="selected">SELECT</option>';  
$sql="SELECT * FROM `course` WHERE `course_name` = '".$course."'";

      $query = mysql_query($sql);
	  $row = mysql_fetch_array($query);
	  $sem_number = $row['course_duration']*2;
	  	  $i= 1;
        while($sem_number--){
        echo '<option value="'.$i.'">'.$i.'</option>';  
		$i++;
		}
	
        ?>