<?php
session_start();
include '../include/db.inc.php';
include '../include/warning.php';
if($_POST['Submit']){
	
$name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';//c
$branch=(isset($_POST['branch']))?trim($_POST['branch']):'';//c
$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';//c
$room=(isset($_POST['room']))?trim($_POST['room']):'';//current
$hostel_id=(isset($_POST['hostel_id']))?trim($_POST['hostel_id']):'';//current


$change_room=(isset($_POST['change_room']))?trim($_POST['change_room']):'';

//echo $hostel_id.$temp_hostel;

				$query="select `roll` from `room_allotment` where `roll`='$roll'";
				$result=mysql_query($query,$db) or die(mysql_error());
				if(mysql_num_rows($result)>0)
				{
					$sql = 'UPDATE `room_allotment` SET `room` = "'.$change_room.'" where roll="'.$roll.'" and hostel_id="'.$hostel_id.'" and room="'.$room.'" ';
					$result=mysql_query($sql,$db) or die(mysql_error());
					if($result>0){
						#successful case
						require_once('connect.php'); //connecting to the server
							$query  ="SELECT name,permanent_mobile FROM student WHERE roll=:roll";
							$sth = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
							$excute=$sth->execute(array(':roll' => $roll));
							
							if(! $excute )
							{
							exit;
							} 
	
							$result=$sth->fetchall(); // we have to count the no of users with this email id
							$string = "";
							$row = $result[0];
							$name = $row['name'];
							$tele = $row['permanent_mobile'];
							if( $tele != '0000000000'){
							$string.= "E-Allotment Ticket\r\n".$name." - ".$roll."\r\nHostel: ".$hostel."Changed room: ".$room.".\r\nWelcome to Hostel. KIIT University.\r\n-Office of the Dy.Registrar (H)";
					?>
					
	<script type="text/javascript">
	var width=250;
	var height=250;//defining size of the window of 3rd party sms api reply
	var url="http://sms.osmosis.co.in/sendsms?uname=kiithostel&pwd=kiit1234&senderid=KIITHL&to= <?php echo urlencode($tele); ?> &msg= <?php echo urlencode($string); ?> &route=T";
	var windowFeatures = "width=" + width + ",height=" + height +",status,resizable";
    myWindow = window.open(url, "Send sms", windowFeatures);
	</script>
					<?php //successful change room
						echo 'Message sent. <a href="change_room.php?st=1">Click here</a> to go back.';					
					}
					else{
						echo 'Contact no not available. <a href="change_room.php?st=1">Click here</a> to go back.';
					}
						//header("LOCATION:change_room.php?st=1");
					}#end of parent if block when result > 0
					else
						 header("LOCATION:change_room.php?st=0");		
				}
				
				else
                  header("LOCATION:change_room.php?st=3");
		}


else
   header("LOCATION:change_room.php");


?>
