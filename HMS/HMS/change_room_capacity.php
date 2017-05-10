<?php session_start(); ?><?php
error_reporting(E_ALL ^ E_NOTICE);
if($_REQUEST['st'] == '1')
    $mes = "Update Sucessfully";
else if($_REQUEST['st'] == '0')
    $mes = "SORRY, TRY AGAIN!!";
else if($_REQUEST['st'] == '3')
    $mes = "No such Room  exists!!";
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
            <link href="css/form.css" rel="stylesheet" type="text/css">  
            <title>HMS::ADD ROOM</title>

            <script src="scripts/add_hostel.js"></script>
      </head>
   <body onload="makezero()">
        <div class="page">
            <?php 
			include "top.php";
			$edit = 'active';
			include "menu.php";
             ?> 

             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <ul>
                     <li><a href="change_room_capacity_hostel.php">Change The Room Capacity By Hostel</a></li><br>
                     <li><a href="change_room_capacity_hostel_room.php">Change The Room Capacity By Hostel Room</a></li><br>
                    
                     </ul>
                    
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  