<?php 

//this page is to transfer a student to another hostel
//actually it does almost the same thing as delete_room.php
//but this can be accessed by normal admins too
//admins(both Super and Normal) can de-allocate the student from hostel and when the student goes to new hostel, its his/her duty to get himself a newly allocated room, i.e., he has to ask the respective warden(normal admin) to allocate him a new room in that new hostel only after that his record can be traced

session_start(); 
error_reporting(E_ALL ^ E_NOTICE); 
?> 

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Transfer Student</title>
              <script type="text/javascript">
                    
					var ajax_string = "";
					
                    /*############# FOR AJAX FUNCTION ##################*/
                    
                    function initXMLHTTPRequest() {
                        var xmlHttp = null;
                        try {
                                // Firefox, Opera 8.0+, Safari
                            xmlHttp = new XMLHttpRequest();
                        }
                        catch (e) {
                                // Internet Explorer
                            try {
                                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                            }
                            catch (e) {
                                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                        }
                        return xmlHttp;
                    }
                    /*############# AJAX CODE END ##################*/
					 
             
                    
                   function getStuDetails(roll, end_date)
                    {
                        var url="ret_stuDetailsWhstl.php?roll="+roll+"&end_date="+end_date;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("getstudetails").innerHTML = xmlDoc;	
								
								var check_string = xmlDoc.indexOf("Current Room No");
						
								if(check_string != -1)
								{
									//alert("Found");
									document.getElementById('submit_button').style.display = "block";
								}
								else
								{
									//alert("Not Found");
									document.getElementById('submit_button').style.display = "none";
								}
                            }
                        };
                    xmlHttp.send(null);	
                    }
					
               
	  </script>
    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'home';
			include "menu.php";
            

if($_POST['Submit'])
{
	//echo $_POST['roll'].$_POST['hostel_id'].$_POST['hostel'];
	//exit;
	$roll=(isset($_POST['roll']))?trim($_POST['roll']):'';
	$end_date=(isset($_POST['end_date']))?trim($_POST['end_date']):'';
	$start_date=(isset($_POST['start_date']))?trim($_POST['start_date']):'';
	
	
	$initial_flag = "i";
				
	#######################   FINAL DEALLOCATION QUERY   #######################
	$update_end_date = mysql_query("UPDATE `room_allotment` SET `end_date`='".$end_date."', `flag`='".$initial_flag."' WHERE `start_date`='".$start_date."' ; ");
	
	
	
	if( $update_end_date > 0 )
	{
		$mes =  "Studnet De-allocated Successfully from the Current Hostel";
		//header('location:delete_student.php?st=1');
	}
	else
	{
		$mes =  "Server Error!!! Student Not De-allocated (database not updated)";
		//header('location:delete_student.php?st=2');
	}
	
	
/********************************************************************************************************************
$sql = "INSERT INTO `student_transfered` ( `roll`, `old_hostel`, `new_hostel`,`transfer_bit`) 
            VALUES ( '".$_POST['roll']."', '".$_POST['hostel_id']."', '".$_POST['hostel']."', 1)";
 $r=mysql_query($sql) or die(mysql_error());
if($r >0)
    $mes = "db updated Sucessfully.";
 else
    $mes = "Unsucessfull updation.Try Later!!";
	
	***********************************************************************************************************************/
}

 ?>
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                      <h3>TRANSFER STUDENT BY ROLL</h3>
<div id='temp_reg_student_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

					<form name="temp_reg_student" method="post" action="" style="padding-top:10px;" onSubmit="return confirm_delete();">
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">Roll No.</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <input name="roll" id="roll" size="12" type="text" onChange="getStuDetails(this.value, end_date.value);" />
                                    </span>
                                </td>
                            </tr>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">End Date <font size="-1">(YYYY-MM-DD)</font></span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                    <?php
										############ This has to be dynamic, if the Super Admin wants to enter the date mannually, he can
										############ But the Normal Admin can't enter the end_date mannually, sytem date would be fetched
										if($data['type'] == "SA")
										{
											?>
                                            <input name="end_date" id="end_date" size="12" type="text" value="<?php echo date('Y-m-d');?>" /><font size="-1"> (You can change this date)</font>
                                            <?php
										}
										else
										{
											?>
                                            <input name="end_date" id="end_date" size="12" type="text" value="<?php echo date('Y-m-d');?>" readonly />
                                            <?php
										}
									?>
                                        
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        
                        <div id="getstudetails"></div>
                        
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td colspan="2" align="center"><input name="Submit" id="submit_button" value="Submit" type="submit" style="display:none;" /></td>
                            </tr>
                        </tbody>
                        </table>
                        
                        
                        
                        </form>
                        

<script type='text/javascript'>
// <![CDATA[
var temp_reg_studentValidator = new Validator("temp_reg_student");

temp_reg_studentValidator.EnableOnPageErrorDisplay();
temp_reg_studentValidator.SetMessageDisplayPos("right");

temp_reg_studentValidator.EnableMsgsTogether();
temp_reg_studentValidator.addValidation("roll","req","Please enter a Roll No.");
temp_reg_studentValidator.addValidation("temp_room","req","Please fill in temp_room");
temp_reg_studentValidator.addValidation("hostel","dontselect=","Please select an option for Hostel");

// ]]>
</script>


                      
                    </div>
                </div>
         <?php   include "footer.php"; 
if($mes!=''){
?>
<script type="text/javascript">
	alert('<?php echo $mes ?>');
	window.open('index.html', '_self');    
</script>
<?php } ?>
         </div>  
    </body>
</html>  