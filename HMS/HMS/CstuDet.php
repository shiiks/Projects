<?php

//this page is to display a student's details when searched (either by roll no or name)

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/menu.css" type="text/css" />
    <title>HMS | Details</title>
</head>
<body>

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
			$roll = $_REQUEST['roll'];
        	$stud_details = mysql_fetch_array(mysql_query('SELECT * FROM `student` WHERE `roll`="'.$roll.'" ; ') );

			if( $stud_details['photo'] != '' )
				$photo =$stud_details['photo'];
			else
				$photo ='user.png';
			
        ?>
        <h3>Student Details</h3>
        
        <table width="80%" border="0" cellspacing="20" align="center">
            <tr>
                <td width="40%"><b> Name: </b></td>
                <td  style="text-transform:uppercase;"><?php echo $stud_details['name']; ?></td>
                <td rowspan="4" width="20%"><img src="../../E-helpDesk/StuImages/<?php echo $photo; ?>" height="100px" width="80px" ></img></td>
            </tr>
                <tr>
                <td><b>Father/Mother Name:</b></td>
                <td style="text-transform:uppercase;"><?php echo $stud_details['pname']; ?></td>
            </tr>
            <tr>
                <td><b>Branch:</b></td>
                <td><?php echo $stud_details['branch']; ?></td>
            </tr>
            <tr>
                <td><b>Roll:</b></td>
                <td><?php echo $stud_details['roll']; ?></td>
            </tr>
            <tr>
                <td><b>Date of Birth:</b></td>
                <td><?php echo $stud_details['date_of_birth']; ?></td>
	            <td></td>
            </tr>
            <tr>
                <td><b>Department:</b></td>
                <td ><?php echo $stud_details['dept']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Course:</b></td>
                <td><?php echo $stud_details['course']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Semester:</b></td>
                <td><?php echo $stud_details['sem']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Country:</b></td>
                <td><?php echo $stud_details['forg_student']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Physically Challenged:</b></td>
                <td><?php echo $stud_details['ph_handicapped']; ?></td>
                <td></td>
            </tr>
        </table>
        
        
        
        <table width="80%" border="0" cellspacing="20" align="center">
            <h3>Permanent Address</h3>
            <tr>
                <td width="40%"><b>Permanent Address:</b></td>
                <td><?php echo $stud_details['permanent_address']; ?></td>
            </tr>
            <tr>
                <td><b>Land-Line Number:</b></td>
                <td><?php echo $stud_details['permanent_landline']; ?></td>
            </tr>
            <tr>
                <td><b>Mobile Number:</b></td>
                <td><?php echo $stud_details['permanent_mobile']; ?></td>
            </tr>
        </table>
        <table width="80%" border="0" cellspacing="20" align="center">
        <h3>Correspondence Address</h3>
        <tr>
            <td width="40%"><b>Correspondence Address:</b></td>
            <td><?php echo $stud_details['correspondence_address']; ?></td>
        </tr>
       
        <tr>
            <td><b>Mobile Number:</b></td>
            <td><?php echo $stud_details['correspondence_mobile']; ?></td>
        </tr>
        
        </table>
        
        <table width="80%" border="0" cellspacing="20" align="center">
            <h3>Current Hostel Details</h3>
            <?php
				$hostel_room = mysql_fetch_array(mysql_query( 'SELECT * FROM `room_allotment` WHERE `roll`="'.$roll.'" ORDER BY `end_date` DESC LIMIT 1 ; ' ));
				$current_date = date('Y-m-d');
                
				if( $current_date <= $hostel_room['end_date'] )
				{
					?>
                    <tr>
                        <td width="40%"><b>Current Hostel:</b></td>
                        <td><?php echo $hostel_room['hostel_id']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Room Number:</b></td>
                        <td><?php echo $hostel_room['room']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Start Date:</b></td>
                        <td><?php echo $hostel_room['start_date']; ?></td>
                    </tr>
                    <tr>
                        <td><b>End Date:</b></td>
                        <td><?php echo $hostel_room['end_date']; ?></td>
                        
                    </tr>
                    <?php
				}
				else
				{
					?>
                    <tr>
                        <td width="100%" align="center"><b>The Student is not residing in any hostel at present.</b></td>
                    </tr>
                    <?php
				}
            ?>
            
        </table>
        
        
        
        <table width="80%" border="0" cellspacing="20" align="center">
        <h3>E-Mail Id:</h3>
        <tr>
            <td width="40%"><b>Mail Id:</b></td>
            <td><?php echo $stud_details['email']; ?></td>
        </tr>
       
        <tr>
            <td><b>Alternate Mail Id:</b></td>
            <td><?php echo $stud_details['alt_email']; ?></td>
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