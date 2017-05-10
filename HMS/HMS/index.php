<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::HOME</title>
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
                     
                   <div>
                   
                        <div class="leftpanel">
                        
                        </div>
                        
                     <div class="rightpanel">
                       <h3>Quick generate Report</h3>
                       <h3>Allot Room</h3>
                       <ul style="padding-top:10px;">
                        <li >Search Student By Roll No.</li>
                        <li >Hostel Student (.Excel)</li>
                        <li >AC/ Non Report(.Exel)</li>
                       </ul>
                       </div>
                        
                        
                        <div class="rightpanel">
                        <h3>Transfer Students</h3>
                        <ul style="padding-top:10px;">
                           
                        </ul>
                        </div>
                        
                        
                      </div>
              </div>
            </div>
         <?php   include "footer.php";  ?>
       
         </div>  
    </body>
</html>  