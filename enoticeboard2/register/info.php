<?php
include_once 'dbconfig.php';
if(!$admin->is_loggedin())
{
	$admin->redirect('admin.php');
}
$user_name = $_SESSION['user_name'];

if(isset($_POST['hostel']) && isset($_POST['branch']) && isset($_POST['summary']) && isset($_POST['year']))
{
  if(!empty($_POST['hostel']) && !empty($_POST['branch']) && !empty($_POST['summary']) && !empty($_POST['year']))
  {
      $summary=$_POST['summary'];
      $hostel = "";
      if(isset($_POST['hostel'])){
        $hostel = implode(',',$_POST['hostel']);
      }
      $branch = "";
      if(isset($_POST['branch'])){
        $branch = implode(',',$_POST['branch']);
      }
      $year = "";
      if(isset($_POST['year'])){
        $year = implode(',',$_POST['year']);
      }
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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

            $stmt = $DB_con->prepare("INSERT INTO doc(user_name,hostel,branch,summary,year,doc) VALUES(:user_name,:hostel,:branch,:summary,:year,:doc)");
            $stmt->bindparam(":hostel", $hostel);
            $stmt->bindparam(":user_name", $user_name);
      			$stmt->bindparam(":branch", $branch);
      			$stmt->bindparam(":summary", $summary);
            $stmt->bindparam(":year", $year);
            $stmt->bindparam(":doc", $target_file);
            $stmt->execute();

    }
	else
	{
		echo "Please Fill All The Fields.";
	}
}
else
{
	echo "Enter Full Details.";
}
?>
