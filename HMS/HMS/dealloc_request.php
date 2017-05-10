<?php

//this page is for room_allotment
//when a student enters a hostel, the warden has to allot the room to the student
//when the form is submitted, it redirects to reg_student1.php

session_start();

include('../include/warning.php');   //this will take to the login page if the user has not logged in

error_reporting(E_ALL ^ E_NOTICE);
#error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS | Deallocation Request</title>
			
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>


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
                        var val = document.getElementById("hostel").value;
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
                        var url="ret_stuDetail.php?id="+val;
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
                        document.getElementById("room").value = val;
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
                    <div>
                    
						<?php
                        include "scripts/validation.php";
                        ?>

						<h3>Deallocation Request</h3>
                        <form id="allot" name="reg_student" method="post" action="dealloc_request1.php" style="padding-top:20px">
                        <table width="800" border="0" align="center">
                        <tbody>
                            <tr class="qbullet">
                                <td class="qbullet" valign="top"><span class="style5">Roll No.</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <input name="roll" id="roll" size="12" type="integer" onChange="getStuDetails(this.value)"></input>
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
                                <td class="qbullet" valign="top" width="41%"><span class="style5">Name of Hostel</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                                
                                <td valign="top" width="56%">
                                    <span class="style5">
                                        <select name="hostel" size="1" id="hostel">
                                            <option value="" selected="selected" disabled>Select One</option>
											<?php
                                            if($data['type']=='SA')
                                            {
                                            $sql = "select hostel_id from hostel";
                                            $query = mysql_query($sql);
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['hostel_id'];?>" >
                                            <?php echo $row['hostel_id']; ?>
                                            </option>
                                            <?php } }
                                            else
                                            {
                                                $sql1= "select hostel_id from hostel where hostel_id= '".$data2['hostel']."'";
                                                $query5=mysql_query($sql1);
                                                while($row1 = mysql_fetch_array($query5))
                                                { ?>
                                             <option value="<?php echo $row1['hostel_id'];?>" >
                                            <?php echo $row1['hostel_id']; ?>
                                            </option>
                                             <?php   
                                                }}?>
                                        </select>
                                    </span>
                                </td>
                           	</tr>
                            
                        </tbody>
						<tbody>
						<tr class="qbullet">
							<td class="qbullet" valign="top"><span class="style5">Description Of Deallocation</span></td>
                                <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
								<td valign="top" width="56%">
                                    <span class="style5">
                                        <textarea rows=6  cols=40 name="dealloc" id="dealloc"></textarea>
                                    </span>
                                </td>
						</tr>
						</tbody>
						<tbody>
						<tbody>
                        </table><br>
						<center><input type="submit" name="Submit" value="Submit" /></center>
                        </form>
						
						<script type='text/javascript'>
                            // <![CDATA[
                            var reg_studentValidator = new Validator("reg_student");
                            
                            reg_studentValidator.EnableOnPageErrorDisplay();
                            reg_studentValidator.SetMessageDisplayPos("right");
                            
                            reg_studentValidator.EnableMsgsTogether();
                            reg_studentValidator.addValidation("roll","req","Please fill in Roll Number");
                            reg_studentValidator.addValidation("roll","numeric"," Roll Number should be a valid numeric value");
                            reg_studentValidator.addValidation("room","req","Please fill in room");
							reg_studentValidator.addValidation("hostel","dontselect=","Please select an option for Hostel");
                            
                            // ]]>
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
         </div>  
    </body>
</html>  
<?php
if($_POST['Submit'])
{
	$mesg="Request Has Been Submited.";
	?>
	<script>alert('<?php echo $mesg; ?>');</script>
	<?php
}
?>