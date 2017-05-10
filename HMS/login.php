<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
session_start();
include ('include/db.inc.php');
if(isset($_POST['login_submit']))
{

//remove backslashes from the $_POST array
    include_once 'include/corefuncs.php';
//filter incoming values
$user_name = (isset($_POST['s_ad_username'])) ? $_POST['s_ad_username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
echo $user_name;

      $query3 = 'SELECT bit FROM admin_login WHERE ' .'admin_id = "' . mysql_real_escape_string($user_name, $db) . '"';
      $result3=mysql_query($query3,$db) or die(mysql_error()); 
    
      if(mysql_num_rows($result3) > 0)
	  {
             $row2 = mysql_fetch_assoc($result3);
	      	if( $row2['bit'])
	         {
                   $query = 'SELECT admin_id FROM admin_login WHERE '.'admin_id = "' . mysql_real_escape_string($user_name, $db) . '" AND ' .
		         ' password = "'.  mysql_real_escape_string($password,$db) .'"';
		    $result=mysql_query($query,$db) or die(mysql_error());
			if(mysql_num_rows($result) > 0) 
			 {
			   $row = mysql_fetch_assoc($result);
			    extract($row);
			    $_SESSION['s_admin_username']=$row['admin_id'];
				header("Location:way.php");
                               // header("Location:index.php?err=".$_SESSION['stu_username']);
                                
			  }
			 else
            header('location:index.php?err=3');
		  }
                  else
		    {
                      
		       $query = 'SELECT admin_id FROM admin_login WHERE ' .
			'admin_id = "' . mysql_real_escape_string($user_name, $db) . '" AND ' .
				'password = "' . mysql_real_escape_string($password, $db) . '"';
			$result=mysql_query($query,$db) or die(mysql_error());
                        
			  if(mysql_num_rows($result) > 0) 
			   {
			     $row = mysql_fetch_assoc($result);
			      extract($row);
			      $_SESSION['s_admin_username']=$row['admin_id'];
			      header("Location:admin_update_pass.php");
                             // include 'student_update_password.php';
                             // echo 'update password';
			     }
			     else
            header('location:index.php?err=3');
		    }
                  
                  /////
            }
            else
            header('location:index.php?err=3');

  }
   ?>
    </body>
</html>
