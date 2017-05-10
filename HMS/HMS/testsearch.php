<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
			<style type="text/css">
            .l:link {color:black;}    /* unvisited link */
            .l:visited {color:blue;} /* visited link */
            .l:hover {color:orange;font: italic; font-size:18px; }   /* mouse over link */
            .l:active {color:green;}  /* selected link */
			#left_column{
			display:block;
			float:left;
			width:180px;
			
			}#left_column .holder{
			display:block;
			width:100%;
			margin-bottom:30px;
			}
			#left_column .nostart li{
			margin-bottom:3px;
			}
			
			#left_column .nostart li a{
			padding-left:10px;
			background:url("images/arrow.gif") left center no-repeat;
			}
			
			#left_column .last{
			margin-bottom:0;
			}
            </style>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$query = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                   
                        <div id="left_column">
                        <div class="holder">
                            <ul class="nostart">
                              <li><a href="search_student.php"target="body2" >Student by roll no.</a></li>
                              <li><a href="" target="body2">Student by room no.</a></li>
                              <li><a href="search_student_by_hostel.php" target="body2" class="l">Student by hostel id </a></li>
                              <li><a href="#">..</a></li>
                              <li><a href="#">..</a></li>
                                  
                            </ul>
                          </div>
                          </div>
                          
                          <div style="border:#000 thin dotted; width:770px; float:right">
                          sad
                          asd
                          as
                          das
                          dsa
                          d
                          
                          
                          </div>
                   
                   
						
                        
              </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  