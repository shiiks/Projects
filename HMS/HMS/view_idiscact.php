<?php session_start(); ?><?php
error_reporting(E_ALL ^ E_NOTICE);
if($_REQUEST['st'] == '1')
    $mes = "Deleted Sucessfully";
else if($_REQUEST['st'] == '0')
    $mes = "SORRY, TRY AGAIN!!";
else if($_REQUEST['st'] == '3')
    $mes = "No such roll exists!!";
else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>


<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title> HMS::DELETE STUDENT</title>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$indact = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 

           <h3>Search Student</h3>
            <table  border="0" align="center" style="padding-top:10px;">
            <tbody>
            <tr>
            <td><span>Roll No.</span></td>
            <td><strong>:</strong></td>
            <td>
            <form name="delete" method="post" action="view_idiscact1.php" >
            <input name="roll" id="roll" size="12" type="text">
            <input name="Submit" value="Submit" type="submit">
            </form></td>
            </tr>
            </tbody></table>
                    
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  