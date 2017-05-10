<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::Generate List</title>
            <style>
			li{
			 padding-top:10px;
			}
			</style>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$home = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                       <div id="generate_report">
                         <h3>Quick generate Report</h3>
                        <ul style="padding-left:20px;">
                        <li ><a href="generate_report1.php?report_type=stud_list">List of Student</a></li>
                        <li ><a href="dompdf/generateLeaveStulist.php">List Of Students On Leave</a></li>
                        <li >List Of Vacant room in Hostel</li>
                        <li >List of Shifted Student</li>
                        </ul>
                       </div>
                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  