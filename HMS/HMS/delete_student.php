<?php
//this page is for de-allocating the student
//once the form is submitted, it will go to page delete_student1.php
//in this, roll no. of the student who is to be de-allocated is asked
//the whole detail will not be deleted from student table, instead end_date will be added in the corresponding row of room_allotment table

session_start();
include('../include/db.inc.php');
$admin_type = mysql_fetch_array(mysql_query('SELECT `type` FROM `admin` WHERE `admin_id`="'.$_SESSION['s_admin_username'].'" ; '));


error_reporting(E_ALL ^ E_NOTICE);

if($admin_type['type'] == 'SA')
{

	if($_REQUEST['st'] == '1')
		$mes = "De-allocated Sucessfully";
	else if($_REQUEST['st'] == '2')
		$mes = "SORRY, TRY AGAIN!!";
	else if($_REQUEST['st'] == '3')
		$mes = "No such roll exists!!";
	else if($_REQUEST['st'] == '4')
		$mes = "The format of End Date entered was incorrect!!!";
	else if($_REQUEST['st'] == '5')
		$mes = "Student is already De-allocated!!!";
	else
	   $mes = '';	
	
	if($mes!='')
	{
	?>
	<script type="text/javascript">alert('<?php echo $mes ?>');</script>
	<?php } ?>
	
	
	<!DOCTYPE html>
	<html>
		<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				<link rel="stylesheet" href="css/style.css" type="text/css" />
				<link rel="stylesheet" href="css/menu.css" type="text/css" />
				<title>HMS | Delete Student</title>
	
		</head>
	   <body >
			<div class="page">
				<?php 
				include "top.php";
				$delete = 'active';
				include "menu.php";
				 
				 ?>  
				 <div class="body">
					<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
						<div class="featured"> 
					  
				<h3>De-allocate Student from Hostel</h3>
				<form method="post" action="delete_student1.php" style="padding-top:20px" onSubmit="return confirm_delete();">
					<table  border="0" align="center" style="padding-top:10px;">
					<tbody>
						<tr>
							<td><span>Roll No.</span></td>
							<td><strong>:</strong></td>
							<td> <input name="roll" id="roll" size="40" type="text"></td>
						</tr>
						<tr class="qbullet">
							<td class="qbullet" valign="top"><span class="style5">End Date <font size="-1">(YYYY-MM-DD)</font></span></td>
							<td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
							<td valign="top" width="56%">
								<span class="style5">
									<input name="end_date" id="end_date" size="12" type="text" /> (eg. 2014-05-28)
								</span>
							</td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								  <input name="Submit" value="Submit" type="submit" />
							</td>
						</tr>
					</tbody>
					</table>
				</form>
						
				</div>
			</div>
	
			<script language="javascript" type="text/javascript">
				var confirm_delete = function ()
				{
					//var roll = document.delete.roll.value;
					var x = (confirm("Are you sure to Delete?"));    // x=true if (yes), x=false if (Cancel)
					//alert(x);
					return (x);
				};
			</script>
	
			<?php   include "footer.php";  ?>
	
		</div>


</body>
</html>  

<?php

}
else
{
	?>
 	<script language="javascript" type="text/javascript">
		alert('You are not authorized to access this page!!!');
		window.open('index.php', '_self');
	</script>   
    <?php
}