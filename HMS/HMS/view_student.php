<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

session_start();
include '../include/db.inc.php';
//filter incoming values
include '../include/warning.php';
$query = 'select * from room_allotment';
$result=mysql_query($query,$db) or die(mysql_error());
?>
  <table width="700" cellpadding="2px" border="2px" style="font-size: 15px;font-family:'Times New Roman, serif'">
              <tr>
                   <th>Roll No.</th>
                   <th>Room No.</th>
                   <th>Hostel</th>
                   <th>Branch</th>
                   <th>Name</th>
                   <th>View</th>
               </tr>
                 <?php
              while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
               {
                 ?>
               <tr>
                   <td><?php echo $row['roll']; ?></td>
                   <td><?php echo $row['room']; ?></td>
                   <td><?php echo $row['hostel_id']; ?></td>
                   <td><?php echo $row['branch']; ?></td>
                   <td><?php echo $row['name']; ?></td>
                   <td><a href="complete_student_details.php?roll=<?php echo $row['roll']; ?>" >View Complete Details</a> </td>
               </tr>
               <?php

               }
               ?>
  </table>
</body>
</html>