<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();

include('../include/warning.php');   //this will take to the login page if the user has not logged in

error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);

if($_REQUEST['st'] == '1')
    $mes = "Data Inserted Sucessfully.";
else if($_REQUEST['st'] == '0')
    $mes = "Unsucessfull Data Entry. Try Later!!!";
else if($_REQUEST['st'] == '3')
    $mes = "The Student is already alloted a room in different hostel.";
else if($_REQUEST['st'] == '4')
    $mes = "The format of End Date entered was incorrect OR was of before the start_date";
else
   $mes = '';	

if($mes!='')
{
	?>
	<script type="text/javascript">alert('<?php echo $mes ?>');</script>
	<?php
}
?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Room Allotment</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

    </head>
   <body >
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

						<h3>Fine Amount Change</h3>
                        <form id="allot" name="reg_student" method="post" action="change_date.php" style="padding-top:20px">
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">Changed Amount</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <input name="amount" id="amount" size="12" type="integer"></input>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <div id="getstudetails">
                        	<!-- This div is to display the details of Student whose roll no. is entered -->
                        </div>
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td colspan="3" height="23" valign="top">
                                    <div id="select_room" style="border:#000 thin groove; display:none"></div>
                                    <div align="center"><input name="Submit" value="Change" type="submit" /></div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        </form>
                        
							
                        </div>
                        <script type="text/javascript">
                        function testadmin()
                        {
                        if(check()){
                        document.getElementById("addadmin").href ="add_admin.php";
                        }
                        else{
                        alert("Your are not Authorised to access this Link");
                        }
                        }
                        function check(){
                        
                        <?php  if($_SESSION['s_admin_username'] =="admin12"){ ?>
                        return true;
                        <?php } else {?>
                        return false;
                        <?php } ?>
}
</script>
<?php
if($_POST['Submit'])
{
	$amount=$_POST['amount'];
	$q="UPDATE fine_imposed SET fine_amount='".$amount."' where ticket_no='".$_SESSION['ticket_no']."'";
	$q_run=mysql_query($q,$db);
	$mesg="Changed."
	?>
	<script>
		var r=confirm('<?php echo $mesg; ?>');
        if (r == true) {
			window.location="index.php";
		}
		else
		{
			window.location="index.php";
		}
	</script>
	<?php
	
}


?>

                    
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  