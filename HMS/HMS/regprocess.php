
<?php
session_start();
include '../include/db.inc.php';
include '../include/warning.php';
//filter incoming values

if(isset($_POST['Submit'])){
$file_name = $_FILES['upload']['name'];
$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';

if($_FILES['upload']['name'])
  $new_file_name = $roll.'.jpg';
else
  $new_file_name = '';
  
move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-helpDesk/StuImages/".$new_file_name);
//move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-HelpDesk/StuImages/".$new_file_name);

$name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
$pname=(isset($_POST['pname']))?trim($_POST['pname']):'';
$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';
$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
$gender=(isset($_POST['gender']))?trim($_POST['gender']):'';
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

$query="select roll from student where roll='$roll'";
$result=mysql_query($query,$db) or die(mysql_error());
if(mysql_num_rows($result)>0)
{
$error='roll '. $roll .' is already registered.';
header("location:reghtml.php?st=3");
mysql_free_result($result);
}
 else 
   {
	   $batch =$branch.$section;
	   $email = $roll.'@kiit.ac.in';
    $query='insert into student(name,roll,gender,pname,branch,ph_handicapped,forg_student,course,dept,date_of_birth,date_of_completion,date_of_accommodation,permanent_address,permanent_mobile,correspondence_address,correspondence_mobile,sem,section,email,photo) values ("'.mysql_real_escape_string($name,$db).'",
                                          '.' "'.mysql_real_escape_string($roll,$db).'",
                                          '.' "'.mysql_real_escape_string($gender,$db).'",
                                          '.' "'.mysql_real_escape_string($pname,$db).'",
                                          '.' "'.mysql_real_escape_string($branch,$db).'",
                                          '.' "'.mysql_real_escape_string($ph,$db).'",
                                          '.' "'.mysql_real_escape_string($fr,$db).'",
                                          '.' "'.mysql_real_escape_string($course,$db).'",
                                          '.' "'.mysql_real_escape_string($dept,$db).'",
                                          '.' "'.mysql_real_escape_string($dob_dd,$db).'",
                                          '.' "'.mysql_real_escape_string($ex_dd,$db).'",
                                          '.' "'.mysql_real_escape_string($acc_dd,$db).'",
                                          '.' "'.mysql_real_escape_string($per_addr,$db).'",
                                          '.' "'.mysql_real_escape_string($p_mobile,$db).'",
                                          '.' "'.mysql_real_escape_string($cor_addr,$db).'",
                                          '.' "'.mysql_real_escape_string($c_mobile,$db).'",
                                          '.' "'.mysql_real_escape_string($sem,$db).'",
										  '.' "'.mysql_real_escape_string($batch,$db).'",
                                          '.' "'.mysql_real_escape_string($email,$db).'",
                                          '.' "'.mysql_real_escape_string($new_file_name,$db).'"
										  )';
										  
    $result=mysql_query($query,$db) or die(mysql_error());
	if($result >0)
                  header("Location:reghtml.php?st=1");
			else
                  header("Location:reghtml.php?st=0");
				  
 }
}//end for submit if
        ?>
