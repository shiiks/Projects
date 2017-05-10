   <?php
		  $course = $_REQUEST['course'];
		  $branch = $_REQUEST['branch'];
		  echo $course;
        $sql="select `Dept_name` from `dept` where `Sno`=(select `dept` from `name_of_branch` where `course` = '".$course."' and `branch`='".$branch."'";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
        echo '<option value="'.$row['Dept_name'].'">'.$row['Dept_name'].'</option>';  
        }  
        ?>  