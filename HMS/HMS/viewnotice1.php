    <?php
    session_start();
    include('../include/db.inc.php');
      include '../include/warning.php';
    $dd=(isset($_POST['dd']))?trim($_POST['dd']):'';
    $mm=(isset($_POST['mm']))?trim($_POST['mm']):'';
    $yy=(isset($_POST['yy']))?trim($_POST['yy']):'';
    $date=$dd.'/'.$mm.'/'.$yy;
    $query = "SELECT COUNT(*) as num FROM notice where date like '".$date."'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
        if($total_pages==0)
        {
             echo '<script language="javascript">alert("No Complain Found Select Another date")</script>';
        }
    ?>


<table width="550" cellpadding="2px" border="2px" style="font-size: 15px;font-family:'Times New Roman, serif'">
              <tr>
                   <th>Notice Date</th>
                   <th>Subject</th>
                   <th>View</th>
               </tr>
               <?php
                 $query4 = "SELECT * FROM `notice` where `date` like '".$date."'";
                 $result4=  mysql_query($query4) or die(mysql_error());
              while ($row = mysql_fetch_array($result4,MYSQL_ASSOC))
               {
                 ?>
               <tr>
                   <td><?php echo $row['date']; ?></td>
                   <td><?php echo $row['subject']; ?></td>
                   <td><form method="post" action="complete_notice.php"><input type="hidden" name="notice_id" value="<?php echo $row['notice_id'];?>"> <input type="submit" value="View Complete Notice" name="submit"></form></td>
               </tr>
               <?php

               }
               ?>


           </table>