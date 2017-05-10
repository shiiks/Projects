<?php session_start();include('../include/warning.php'); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS::CHANGE ROOM</title>
			<script type="text/javascript" src="scripts/calendarDateInput.js"></script>
            <script type="text/javascript" src="css/jquery-1.2.6.min.js"></script>
              <script type="text/javascript">
                    
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
					 
                    function select_room()
                    {
                        var val = document.getElementById("hostel_id").value;
                        document.getElementById("select_room").style.display = "block";
                        var url="ret_room_table.php?id="+val;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("select_room").innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
                    }
                    
                   function getStuDetails(val)
                    {
                        var url="ret_stuDetailsWhstl.php?id="+val;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("getstudetails").innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
                    }
                    
                    
                    function checkvalue(val){
                        document.getElementById("change_room").value = val;
                        document.getElementById("select_room").style.display = "none";
                        
                    }
	  </script>
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
                      <h3>CHANGE ROOM ALLOTMENT</h3>

<div id='temp_reg_student_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form  name="temp_reg_student" method="post" action="change_room1.php" style="padding-top:10px;">
                        <table width="800" border="0" align="center">
                        <tbody>
                        
                        <tr class="qbullet">
                        <td class="qbullet" valign="top"><span class="style5">Roll No.</span></td>
                        
                        
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <span class="style5">
                        <input name="roll" id="roll" size="10" type="text" onChange="getStuDetails(this.value)"></input>
                        </span></td></tr>
                         </tbody></table>
                         <div id="getstudetails"></div>
                        <table width="800" border="0" align="center">
                        <tbody>
                        <tr class="qbullet">
                        <td class="qbullet" valign="top"><span class="style5">Room No.</span></td>
                        
                        
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <span class="style5">
                        <input name="change_room" id="change_room" size="10" type="text" onclick="select_room()"></input>
                        </span></td>
                        </tr>
                        
                        <tr class="qbullet">
                        <td colspan="3" height="23" valign="top">
                        <div id="select_room" style="border:#000 thin groove; display:none"></div>
                        <div align="center">
                        <input name="Submit" value="Submit" type="submit" ></input>
                        </div>    </td>
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
temp_reg_studentValidator.addValidation("roll","req","Please fill in roll");
temp_reg_studentValidator.addValidation("change_room","req","Please fill in change_room");

// ]]>
</script>


                      
                    </div>
					<?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    if($_REQUEST['st'] == '1')
                    $mes = "Room Change Sucessfully.";
                    else if($_REQUEST['st'] == '0')
                    $mes = "Room Change Unsucessfull.Try Later!!";
                    else if($_REQUEST['st'] == '3')
                    $mes = "NO Record Found !!!!";
                    else
                    $mes = '';	
                    
                    if($mes!=''){
                    ?>
                    <script type="text/javascript">alert('<?php echo $mes ?>');</script>
                    <?php } ?>
                </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  