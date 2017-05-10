<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
      
        session_start();
        include '../include/db.inc.php';
        include'../include/warning.php';
        $name=(isset($_POST['name']))?trim($_POST['name']):'';
        $mobile=(isset($_POST['mobile']))?trim($_POST['mobile']):'';
		$email=(isset($_POST['email']))?trim($_POST['email']):'';
		$hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';
        
        $query1 = 'update admin set Name = "'. $name.'",mobile="'.$mobile.'",email="'.$email.'",hostel="'.$hostel.'"WHERE ' . 'admin_id = "' . $_SESSION['s_admin_username'] . '"';
		 
		 $result1=mysql_query($query1,$db) or die(mysql_error());
                 if($result1 >0)	
	           {
                    echo '<script language="javascript">alert("Profile Update Successful")</script>';
                    header("Location:view_profile.php");
                   
                    }
        
        ?>
    </body>
</html>
