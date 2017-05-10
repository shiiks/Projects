<?php       session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$home = 'active';
    include('../include/db.inc.php');
    $query = 'select name from admin where admin_id="'.$_SESSION['s_admin_username'].'"';   
    $result1=mysql_query($query) or die(mysql_error());  
    $data=  mysql_fetch_array($result1);  
  

			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured">  
                        <!-- change here --> 
                        <div>
                        <?php 
							$query4 = 'select * from student where roll="'.$_REQUEST['roll'].'"';
							$result4=  mysql_query($query4) or die(mysql_error());
							$data1 = mysql_fetch_array($result4);
							if($data1['photo']!='')
							$photo =$data1['photo'];
							else
							$photo ='user.png';
							?>
                         <span  id="thead">Student Details</span>

                        <table width="80%" border="0" cellspacing="20" align="center">
                        <tr>
                           <td width="40%"><b> Name: </b></td>
                           <td  style="text-transform:uppercase;"><?php echo $data1['name']; ?></td>
                           <td rowspan="4" width="20%"><img src="../../E-helpDesk/StuImages/<?php echo $photo; ?>" height="100px" width="80px" ></img></td>
                        </tr>
                        <tr>
                           <td><b>Father/Mother Name:</b></td>
                           <td style="text-transform:uppercase;"><?php echo $data1['pname']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Branch:</b></td>
                           <td><?php echo $data1['branch']; ?></td>
                           
                        </tr>
                        <tr>
                           <td><b>Roll:</b></td>
                           <td><?php echo $data1['roll']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Date of Birth:</b></td>
                           <td><?php echo $data1['date_of_birth']; ?></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td><b>Department:</b></td>
                           <td ><?php echo $data1['dept']; ?></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td><b>Course:</b></td>
                           <td><?php echo $data1['course']; ?></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td><b>Semester:</b></td>
                           <td><?php echo $data1['sem']; ?></td>
                           <td></td>
                        </tr>
                        
                        </table>
                        
                        
                        
 						<table width="80%" border="0" cellspacing="20" align="center">
                         <span  id="thead">Permanent Address</span>
                        <tr>
                           <td width="40%"><b>Permanent Address:</b></td>
                           <td><?php echo $data1['permanent_address']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Land-Line Number:</b></td>
                           <td><?php echo $data1['permanent_landline']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Mobile Number:</b></td>
                           <td><?php echo $data1['permanent_mobile']; ?></td>
                        </tr>
                        </table>
						 <table width="80%" border="0" cellspacing="20" align="center">
                         <span  id="thead">Correspondence Address</span>
                        <tr>
                           <td width="40%"><b>Correspondence Address:</b></td>
                           <td><?php echo $data1['correspondence_address']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Land-Line Number:</b></td>
                           <td><?php echo $data1['correspondence_landline']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Mobile Number:</b></td>
                           <td><?php echo $data1['correspondence_mobile']; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2" align="center"><input type="button" value="&lt;&lt;GO BACK"  name="goback" onClick="window.history.go(-1);"></td>
                        </tr>
                        </table> 
                        
                         <!-- upto here -->
                         </div>
                                    
                    </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  