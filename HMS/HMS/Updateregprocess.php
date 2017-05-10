
<?php
session_start();
include '../include/db.inc.php';
include '../include/warning.php';
//filter incoming values

if(isset($_POST['Submit'])){

$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
$new_file_name = $roll.'.jpg';
move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-helpDesk/StuImages/".$new_file_name);
//move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-HelpDesk/StuImages/".$new_file_name);

$name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
$pname=(isset($_POST['pname']))?trim($_POST['pname']):'';
$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';
$dob_dd=(isset($_POST['dob_dd']))?trim($_POST['dob_dd']):'';
$ph=(isset($_POST['ph']))?trim($_POST['ph']):'';
$fr=(isset($_POST['fr']))?trim($_POST['fr']):'';
$dept=(isset($_POST['dept']))?trim($_POST['dept']):'';
$course=(isset($_POST['course']))?trim($_POST['course']):'';
$sem=(isset($_POST['semester']))?trim($_POST['semester']):'';
$ex_dd=(isset($_POST['ex_dd']))?trim($_POST['ex_dd']):'';
$acc_dd=(isset($_POST['acc_dd']))?trim($_POST['acc_dd']):'';
$p_mobile=(isset($_POST['mob1']))?trim($_POST['mob1']):'';
$c_mobile=(isset($_POST['mob']))?trim($_POST['mob']):'';
$per_addr=(isset($_POST['per_addr']))?trim($_POST['per_addr']):'';
$cor_addr=(isset($_POST['cor_addr']))?trim($_POST['cor_addr']):'';
$section=(isset($_POST['section']))?trim($_POST['section']):'';
$gen=(isset($_POST['gender']))?trim($_POST['gender']):'';
if(strlen($section)==1){
$batch =$branch.$section;
}
else{
		   $batch =$section;
}

$query="select roll from student where roll='$roll'";
$result=mysql_query($query,$db) or die(mysql_error());
if(mysql_num_rows($result)>0)
{
	   $email = $roll.'@kiit.ac.in';
	   	if($file_name = $_FILES['upload']['name']){
    $query='update student set	name="'.mysql_real_escape_string($name,$db).'",pname= "'.mysql_real_escape_string($pname,$db).'",branch = "'.mysql_real_escape_string($branch,$db).'",ph_handicapped ="'.mysql_real_escape_string($ph,$db).'",forg_student ="'.mysql_real_escape_string($fr,$db).'",course = "'.mysql_real_escape_string($course,$db).'",dept= "'.mysql_real_escape_string($dept,$db).'",date_of_birth= "'.mysql_real_escape_string($dob_dd,$db).'",date_of_completion= "'.mysql_real_escape_string($ex_dd,$db).'",date_of_accommodation= "'.mysql_real_escape_string($acc_dd,$db).'",permanent_address ="'.mysql_real_escape_string($per_addr,$db).'",permanent_mobile= "'.mysql_real_escape_string($p_mobile,$db).'",correspondence_address= "'.mysql_real_escape_string($cor_addr,$db).'",correspondence_mobile= "'.mysql_real_escape_string($c_mobile,$db).'",sem= "'.mysql_real_escape_string($sem,$db).'",section="'.mysql_real_escape_string($batch,$db).'",email = "'.mysql_real_escape_string($email,$db).'",photo ="'.mysql_real_escape_string($new_file_name,$db).'" where roll ="'.mysql_real_escape_string($roll,$db).'"';
	
	$query1='update student set gender="'.mysql_real_escape_string($gen,$db).'" where roll="'.$roll.'"';
		}else{
			    $query='update student set	name="'.mysql_real_escape_string($name,$db).'",roll="'.mysql_real_escape_string($roll,$db).'",pname= "'.mysql_real_escape_string($pname,$db).'",branch = "'.mysql_real_escape_string($branch,$db).'",ph_handicapped ="'.mysql_real_escape_string($ph,$db).'",forg_student ="'.mysql_real_escape_string($fr,$db).'",course = "'.mysql_real_escape_string($course,$db).'",dept= "'.mysql_real_escape_string($dept,$db).'",date_of_birth= "'.mysql_real_escape_string($dob_dd,$db).'",date_of_completion= "'.mysql_real_escape_string($ex_dd,$db).'",date_of_accommodation= "'.mysql_real_escape_string($acc_dd,$db).'",permanent_address ="'.mysql_real_escape_string($per_addr,$db).'",permanent_mobile= "'.mysql_real_escape_string($p_mobile,$db).'",correspondence_address= "'.mysql_real_escape_string($cor_addr,$db).'",correspondence_mobile= "'.mysql_real_escape_string($c_mobile,$db).'",sem= "'.mysql_real_escape_string($sem,$db).'",section="'.mysql_real_escape_string($batch,$db).'",email = "'.mysql_real_escape_string($email,$db).'" where roll ="'.mysql_real_escape_string($roll,$db).'"';
				
				$query1='update student set gender="'.mysql_real_escape_string($gen,$db).'" where roll="'.$roll.'"';
		}
										  
    $result=mysql_query($query,$db) or die(mysql_error());
	$result1=mysql_query($query1,$db) or die(mysql_error());
	if($result >0)
                  header("Location:Updateform.php?st=1");
			else
                  header("Location:updatestudentDetails.php?st=0&roll=".$roll);

}
 else 
  {
header("location:updatestudentDetails.php?st=3");
mysql_free_result($result);
}
 
}//end for submit if
        ?>
