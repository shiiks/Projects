<?php

session_start();
include ('../include/db.inc.php');
include('../include/warning.php');


?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Reporting</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>

<?php
if(isset($_POST['submit']))
{
	$q="SELECT i.Roll,i.reporting_date,i.Ticket_no,i.Indisciplinary_desc,i.dc_action,s.name,i.hostel FROM indisciplinary_dc_reports i,room_allocation1 r,student s WHERE i.Forward_status=0 AND i.Roll=r.roll AND i.Roll=s.roll AND i.Closure_status=0 AND i.hostel='".$_POST['hostel']."'";
	$q_run=mysql_query($q,$db);
	
	if(mysql_num_rows==FALSE)
	{
		echo 'No Records';
	}
	else
	{
		
?>
</head>
   <body>
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'active';
			include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    
						<?php
                        include "scripts/validation.php";
                        ?>

						<h3>View</h3>
						<table border="1" width="100%">
						<tr>
						<th>Ticket No</th>
						<th>Name</th>
						<th>Roll</th>
						
						<th>Hostel</th>
						<th>Indisplinary desciption</th>
						<th>Employee Reported</th>
						
						</tr>
						<?php
							while($result=mysql_fetch_assoc($q_run))
	                        {
								
						?>
						<tr>
							<td><?php echo $result['Ticket_no']; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['Roll']; ?></td>
							
							<td><?php echo $result['hostel']; ?></td>
							<td><?php echo $result['Indisciplinary_desc']; ?></td>
							<td><?php echo $_SESSION['s_admin_username']; ?></td>
							
						</tr>
						<?php
							}
							?>
					<?php
                        }
				    ?>

<?php

}
else
{
	echo "Try Again Later.";
}
?>
</table>
						
						<script type='text/javascript'>
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
              </div>
              </div>
         <?php   include "footer.php";  ?>  
    </body>
</html> 


}
?>