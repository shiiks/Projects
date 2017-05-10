<?php
    include('../include/db.inc.php');
        $course = $_REQUEST['id'];
 echo '<option value="" selected="selected">SELECT</option>';  

$sql="SELECT *
FROM `name_of_branch`
WHERE `course` LIKE '".$course."'  ";
      $query = mysql_query($sql);
	  if(mysql_num_rows($query)){  
        while($row = mysql_fetch_array($query)){
        echo '<option value="'.$row['branch'].'">'.$row['branch'].'</option>';  
		}}
	else
	{
        echo '<option value="N/A">N/A</option>';  
	}
        ?>