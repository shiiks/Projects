<?php
include 'connect.php';

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['contact_no']) && isset($_POST['qualification']) && isset($_POST['university']) && isset($_POST['country']) && isset($_POST['social_profile'])	
 && isset($_POST['benefit']) && isset($_POST['where_years']) && isset($_POST['challenges']) && isset($_POST['major_interest']) && (isset($_POST['course']) || isset($_POST['course_other'])))
{
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['gender']) && !empty($_POST['email'])
 && !empty($_POST['contact_no']) && !empty($_POST['qualification']) && !empty($_POST['university']) && !empty($_POST['country']) && !empty($_POST['social_profile'])	
 && !empty($_POST['benefit']) && !empty($_POST['where_years']) && !empty($_POST['challenges']) && !empty($_POST['major_interest']) && (!empty($_POST['course']) || !empty($_POST['course_other'])))
 {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$qualification=$_POST['qualification'];
	$university=$_POST['university'];
	$country=$_POST['country'];
	$social_profile=$_POST['social_profile'];
	
	$benefit=$_POST['benefit'];

	$where_years=$_POST['where_years'];
	$challenges=$_POST['challenges'];
	$major_interest=$_POST['major_interest'];
	$course=$_POST['course'];
	$course_other=$_POST['course_other'];
	$target_dir = "resume/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "doc") {
    echo "Sorry, only PDF & DOC files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	$stmt=$dbh->prepare("INSERT INTO celt(fname,lname,gender,email,contact_no,qualification,university,country,social_profile,benefit,where_years,
	challenges,major_interest,course,resume_target,course_other) VALUES (:fname,:lname,:gender,:email,:contact_no,:qualification,:university,:country,:social_profile,:benefit,:where_years,
	:challenges,:major_interest,:course,:resume_target,:course_other)");
	
	$stmt->bindparam(":fname", $fname);
	$stmt->bindparam(":lname", $lname);
	$stmt->bindparam(":gender", $gender);
	$stmt->bindparam(":contact_no", $contact_no);
	$stmt->bindparam(":qualification", $qualification);
	$stmt->bindparam(":university", $university);
	$stmt->bindparam(":country", $country);
	$stmt->bindparam(":social_profile", $social_profile);
	$stmt->bindparam(":resume_target", $target_dir);
	
	$stmt->bindparam(":benefit", $benefit);
	
	$stmt->bindparam(":where_years", $where_years);
	$stmt->bindparam(":challenges", $challenges);
	$stmt->bindparam(":email", $email);
	$stmt->bindparam(":major_interest", $major_interest);
	$stmt->bindparam(":course", $course);
	$stmt->bindparam(":course_other", $course_other);
	$stmt->execute();
	


 
 }
 else
 {
	 echo 'Please Fill The Form Completely.';
 }
 
 }
 else
 {
	 echo 'Technical Problem';
 }

?>