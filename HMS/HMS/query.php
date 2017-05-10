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
                    <table cellpadding="2" cellspacing="2" width="100%">
                    <tr>
                    <td width="20%" VALIGN=TOP ALIGN=LEFT >
                        <?php
                        $num = $_GET['num'];
                        if($num==1)
                        {
                        ?>
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
                       <?php } ?>
                    </td>
                    <td width="80%">
                       <iframe  width="770" height="350px" name="body2" frameborder="0"  class="framestyle"></iframe>
                    </td>
                  </tr>
                  </table>
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
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  