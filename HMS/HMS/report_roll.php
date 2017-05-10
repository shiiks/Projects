<?php

session_start();
include ('../include/db.inc.php');
include('../include/warning.php');

error_reporting(E_ALL ^ E_NOTICE);

?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Reports</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'active';
			include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <?php
                        include "scripts/validation.php";
                        ?>
                        <form method="POST" action="testcheck2.php">
                        	<label> Roll No.</label>
                        	<input type="text" name="roll"/><br>
                        	<input type="Submit" name="Submit" value="Submit">
                        </form>

                     </div>
                        <script type="text/javascript">
                        function testadmin()
                        {
                        if(check()){
                        document.getElementById("addadmin").href ="add_admin.php";
                        }
                        else{
                        alert("Your are not Authorised to access this Link");
                        }
                        }
                        function check(){
                        
                        <?php  if($_SESSION['s_admin_username'] =="admin12"){ ?>
                        return true;
                        <?php } else {?>
                        return false;
                        <?php } ?>
}
</script>

</div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  