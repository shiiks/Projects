<?php

session_start();
include '../include/db.inc.php';
include '../include/warning.php';
if($_POST['Submit']){
	
echo $c_hostel=(isset($_POST['c_hostel']))?trim($_POST['c_hostel']):'';
echo $n_hostel=(isset($_POST['n_hostel']))?trim($_POST['n_hostel']):'';
echo $course=(isset($_POST['course']))?trim($_POST['course']):'';//c
echo $branch=(isset($_POST['branch']))?trim($_POST['branch']):'';//c
echo $semester=(isset($_POST['semester']))?trim($_POST['semester']):'';//c



$sql = "select distinct * from `student` as st,`room_allotment` as rt where st.roll=rt.roll and rt.hostel_id='".$c_hostel."' and st.sem='".$semester."' and st.course ='".$course."' and st.branch ='".$branch."'";
$query = mysql_query($sql);
$getnumrow = mysql_num_rows($query);
if($getnumrow >0){
	$c=0;
while($row = mysql_fetch_array($query)){	
	
if($result_insertion = mysql_query("INSERT INTO `student_transfered` ( `roll`, `old_hostel`, `new_hostel`,`transfer_bit`) 
            VALUES ( '".$row['roll']."', '".$c_hostel."', '".$n_hostel."', 1)")){
 $c++;
}
 }
 if($c == $getnumrow){
		   header("LOCATION:transfer_by_branch.php?st=1");
 
 }
 else{
		   header("LOCATION:transfer_by_branch.php?st=2");
 
 }
 
}
else{
	   header("LOCATION:transfer_by_branch.php?st=3");
	
}
}
else
   header("LOCATION:transfer_by_branch.php");


?>
