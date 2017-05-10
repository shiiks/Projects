<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>  
     		<title>HMS::View Profile</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$profile = 'active';
			include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured">  
                        <!-- change here --> 
                        <div>
                        <?php 
							$query4 = 'select * from admin where admin_id="'.$_SESSION['s_admin_username'].'"';
							$result4=  mysql_query($query4) or die(mysql_error());
							$data1 = mysql_fetch_array($result4);
								?>
                         <span  id="thead">Administrator Details</span>

                        <table width="80%" border="0" cellspacing="20" align="center">
                        <tr>
                           <td width="40%"><b> Name: </b></td>
                           <td  style="text-transform:uppercase;"><?php echo $data1['Name']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Employee ID:</b></td>
                           <td style="text-transform:uppercase;"><?php echo $data1['admin_id']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Hostel:</b></td>
                           <td><?php echo $data1['hostel']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Designation:</b></td>
                           <td><?php echo $data1['Designation']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Date of Birth:</b></td>
                           <td ><?php echo $data1['date_of_birth']; ?></td>
                        </tr>
                        <tr>
                           <td><b>Mobile:</b></td>
                           <td><?php echo $data1['mobile']; ?></td>
                        </tr>
                        <tr>
                           <td><b>E Mail:</b></td>
                           <td><?php echo $data1['email']; ?></td>
                        </tr>
                        
                        </table>

                         <!-- upto here -->
                         </div>
                                    
                    </div>
              </div>
         <?php 
		  include "footer.php";
             ?>  
    </body>
</html>  