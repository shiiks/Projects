<?php session_start(); ?><html xmlns="http://www.w3.org/1999/xhtml">
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
$hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';

$query = "select * from room_allotment where hostel_id = '$hostel'";
$result=mysql_query($query,$db) or die(mysql_error());
$query1 = "SELECT COUNT(*) as num FROM room_allotment where hostel_id='$hostel'";
	$total_pages = mysql_fetch_array(mysql_query($query1));
	$total_pages = $total_pages['num'];
        if($total_pages==0)
        {
             echo '<script language="javascript">alert("No Data Found")</script>';
        }
?>
        <table border="2" width="800">
        <tr>
        <th>Roll</th>
        <th>Name</th>
        <th>Branch</th>
        <th>Room No.</th>
        <th>Hostel</th>
        <th>Complete Detail</th>
        </tr>
    <?php

while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) 
 {
    ?>
         <tr>
            <td><?php echo $row['roll']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['branch']; ?></td>
            <td><?php echo $row['room']; ?></td>
            <td><?php echo $row['hostel_id']; ?></td>
            <td align="center"><a href="complete_student_details.php?roll=<?php echo $row['roll']; ?>">Click here</a> </td>
        </tr>
    <?php
}
?>
        </table>
</body>
</html>