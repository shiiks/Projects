
        <?php
		error_reporting(E_ALL ^ E_NOTICE);

       if(! $_SESSION['s_admin_username'])
       {
            echo '<script language="javascript" >alert("You have to login")</script>';
             header("Location:../index.php?err=5");
          
       }
     
        ?>
 