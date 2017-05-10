
            <?php 
			 include('../include/db.inc.php');
	         include('../include/warning.php');
			 $cour_name=(isset($_POST['name1']))?trim($_POST['name1']):'';
             $duration=(isset($_POST['dur']))?trim($_POST['dur']):'';
        if(isset($_POST['submit']))
		 {


			
			$query='insert into course(course_name,course_duration) values ("'.$cour_name.'","'.$duration.'")';
			$result=mysql_query($query,$db) or die(mysql_error());
			if($result>0)
			{
			header("Location:add_course.php?msg=5");
			}
			else 
						header("Location:add_course.php?msg=4");

		 }
             ?>  
                    
                   
            