<?php
session_start();
include ('../include/db.inc.php');
include('../include/warning.php');
error_reporting(E_ALL ^ E_NOTICE);

?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Reporting</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<?php
if(isset($_POST['Submit']))
{
	$roll=$_POST['roll'];

	$q="SELECT i.Indisciplinary_desc,i.ticket_no,i.reporting_date,i.DC_refNum,i.Indisciplinary_desc,d.action_no,i.Closure_status from indisciplinary_dc_reports i,dc_actions d where i.Forward_status=0 AND i.Closure_status=0 AND i.Roll='".$roll."' ";
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
						<th>Indisciplinary_desc</th>
						<th>Reporting Date</th>
						<th>DC Ref Num</th>
						<th>DC Action Desc</th>
						<th>DC action Number</th>
						<th>Closure status</th>
						
						</tr>
						<?php
							while($result=mysql_fetch_assoc($q_run))
	                        {
								
						?>
						<tr>
							<td><?php echo $result['ticket_no']; ?></td>
							<td><?php echo $result['Indisciplinary_desc']; ?></td>
							<td><?php echo $result['reporting_date']; ?></td>
							<td><?php echo $result['DC_refNum']; ?></td>
							<td><?php echo $result['dc_action_desc']; ?></td>
							<td><?php echo $result['action_no']; ?></td>
							<td><?php echo $_SESSION['Closure_status']; ?></td>
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



	<!--if(action_no=1 3 or 4)
		select fine_amount from fine_imposed where indisciplinary_ticket_no=$ticket_no-->