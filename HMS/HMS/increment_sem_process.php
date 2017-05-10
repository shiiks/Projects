<?php
session_start();
include '../include/db.inc.php';
include '../include/warning.php';
if($_POST['SubmitR']){
	 $roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	increment($roll);
	 header("LOCATION:increment_semester.php");

}
else if($_POST['SubmitC']){
		$course=(isset($_POST['course']))?trim($_POST['course']):'';
		increment_by_course($course);
		
  header("LOCATION:increment_semester.php");

        }




function increment($r){
	$curr_sem = getSemester($r);
   if($curr_sem < getfinalSemester($r)){
	    $curr_sem++;
		if(mysql_query("UPDATE  `student` SET `sem` =".$curr_sem." WHERE `roll`=".$r)){
	      $_SESSION['msg'] = "db updated sucessfully";
		}
		else{
       	$_SESSION['msg'] = "some technical problem ,try later!!";
		}
   }
   else{
	   if(mysql_query("delete from student_login where student_roll='".$r."'")){
	     if(mysql_query("insert into student_backup SELECT * FROM student where roll='".$r."'")){
	         if(mysql_query("delete from student where roll='".$r."'")){
				  $_SESSION['msg']=$r." is passed out!!.";
			  }
		   }
        }
   }

}

function increment_by_course($c){
	$query_course = "select distinct sem from student where course ='".$c."' ";
	$query_response =mysql_query($query_course) or die("try later!!");
	$final_sem = getSemesterBYCourse($c);
	while($row = mysql_fetch_array($query_response)){
		if($row['sem'] < $final_sem){
			$curr_sem = $row['sem']+1;
			if(mysql_query("UPDATE  `student` SET `sem` ='".$curr_sem."' WHERE `sem`='".$row['sem']."' and course ='".$c."'")){
				//echo "db sucessfully updated.<br>";	
				}
		    else{
				//echo "some technical problem.<br>";
			}
		}
		else{
			    $rowsem =$row['sem'];
				$query = "select roll from student WHERE `sem`='".$row['sem']."' and course ='".$c."'";
				$response =mysql_query($query) or die("try later!!");
				$count=0;
				while($row = mysql_fetch_array($response)){
				  $r = $row['roll'];
				  if(mysql_query("delete from student_login where student_roll='".$r."'")){
			        $count++;
				   }
				}//end of while loop
			   if(mysql_query("insert into student_backup SELECT * FROM student WHERE `sem`='".$rowsem."' and course ='".$c."'")){
					 if(mysql_query("delete from student WHERE `sem`='".$rowsem."' and course ='".$c."'")){
					 }
			   }
			 $_SESSION['msg'] =$count." students are passed out and sucessfully removed from their respective hostel rooms.<br>Rest are moved to theirs next semester";
			 }//end of else

	}//end of upper while
 
 }
function getSemester($r){
   $sql = "select `sem` from `student` where `roll` = ".$r;
   $result=mysql_query($sql) or die(mysql_error());
   $data = mysql_fetch_array($result);
   $gsem = $data['sem'];
   return $gsem;
}
function getSemesterBYCourse($c){
   $sql1 = "SELECT `course_duration` FROM  `course` WHERE  `course_name` = '".$c."'";
   $result1=mysql_query($sql1) or die(mysql_error());
   $data1 = mysql_fetch_array($result1);
   $gfcourse =  $data1['course_duration'];
   return $gfcourse*2;
}
function getfinalSemester($r){
   $sql = "select `course` from `student` where `roll` = ".$r;
   $result=mysql_query($sql) or die(mysql_error());
   $data = mysql_fetch_array($result);
   $gcourse = trim($data['course']);
  // exit;
   $sql1 = "SELECT `course_duration` FROM  `course` WHERE  `course_name` = '".$gcourse."'";
   $result1=mysql_query($sql1) or die(mysql_error());
   $data1 = mysql_fetch_array($result1);
   $gfcourse =  $data1['course_duration'];
   return $gfcourse*2;
}
?>
