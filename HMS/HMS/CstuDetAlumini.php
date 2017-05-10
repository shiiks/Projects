<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::ALUMINI STUDENTS DETAILS</title>

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
                        <!-- change here --> 
                        <div>
                        <?php 
							$query4 = 'select * from student_backup where roll="'.$_REQUEST['roll'].'"';
							$result4=  mysql_query($query4) or die(mysql_error());
							$data1 = mysql_fetch_array($result4);
							if($data1['photo']!='')
							$photo =$data1['photo'];
							else
							$photo ='user.png';

							?>
                         <h3>Student Details</h3>

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
                         <h3>Permanent Address</h3>
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
                         <h3>Correspondence Address</h3>
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
                       
                        </table>
                        
                        
                        
                         
                         
                         <table width="80%" border="0" cellspacing="20" align="center">
                         <h3>Achievements</h3>
                         <?php 
						 $sql = 'SELECT * FROM `achievement` where 	`roll`="'.$_REQUEST['roll'].'"';
						 $result4=  mysql_query($sql) or die(mysql_error());
					     $data1 = mysql_fetch_array($result4);
						 ?>
                        <tr>
                           <td width="40%"><b>Achievements:</b></td>
                           <td><?php echo $data1['achievements ']; ?></td>
                        </tr>
                        </table>
                        
                        <table width="80%" border="0" cellspacing="20" align="center" style="min-height:40px; background-color:#FAC5CF">
                        <h3>Indisciplinary Activity List</h3>
                        
                         <?php   
						 $c=0;
						 $sql = 'SELECT * FROM `indisciplinary_activity` where `roll`="'.$_REQUEST['roll'].'"';
						 $result4=  mysql_query($sql) or die(mysql_error());
						 $number = mysql_num_rows($result4);
						 if($number >0){
							echo '<tr>
							<th width="2%" valign="top">Sno</th>
							<th width="57%" valign="top">Cause</th>
							<th width="30%" valign="top">Fine</th>
							<th width="10%" valign="top">Status</th>
							</tr>';
						 while($row = mysql_fetch_array($result4)){  $c++; ?>
					    <tr>
                        <td align="left"><?php echo $c; ?></td>
                        <td align="center"><?php echo $row['cause']; ?></td>
                        <td align="center"><?php echo 'Rs:-'.$row['amount'].'/-'; ?></td>
                        <td align="center"><?php if($row['bit']==0)echo "Unsolved";
						           else echo "Solved"; ?>
                        </td>
                        </tr>
                        <?php   }}
						else{
						echo "<tr><td colspan='4' align='center' >No Indisciplinary Activity </td></tr>"; }?>
                        
                         <tr>
                        <td colspan="4" align="center"><input type="button" value="&lt;&lt;GO BACK"  name="goback" onClick="window.history.go(-1);"></td>
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