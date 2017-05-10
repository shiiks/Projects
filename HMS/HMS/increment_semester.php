<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE); 
if($_SESSION['msg']!=""){
?> 
<script>alert('<?php echo  $_SESSION['msg']; ?>'); </script>
<?php  }
$_SESSION['msg']=""; ?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title >HMS::INCREMENT SEMESTER</title>
			<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
            <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
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
               
	  </script>
 </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'home';
			include "menu.php";
			?>
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                      <h3>INCREMENT SEMESTER</h3>
<div id='temp_reg_student_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

     <div id="TabbedPanels1" class="TabbedPanels">
       <ul class="TabbedPanelsTabGroup">
         <li class="TabbedPanelsTab" tabindex="0">By Course</li>
         <li class="TabbedPanelsTab" tabindex="0">By Individual</li>
        <!-- <li class="TabbedPanelsTab" tabindex="0">By Branch</li>
         <li class="TabbedPanelsTab" tabindex="0">By Semester</li>-->
       </ul>
       <div class="TabbedPanelsContentGroup">
         <div class="TabbedPanelsContent">
           <table width="800" border="0" align="center">
            <form  name="increment_semester_by_course" method="post" action="increment_sem_process.php" style="padding-top:10px;">
               <tbody>
                    <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Select Course</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td valign="top" width="30%">
                           <span class="style5">
                            <select name="course" size="1" id="course" onChange="getbranch(this.value)">
                          	  <option value="" selected disabled>Select Course</option> 
								<?php
                                $sql="select course_name from `course`";
                                $query = mysql_query($sql);
                                while($row = mysql_fetch_array($query)){
                                echo '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';  
                                }  
                                ?>
                            </select> 
                          </span>
                        </td>
                         <td class="qbullet" valign="top">
                           <span class="style5">
                           <input name="SubmitC" value="Submit" type="submit" align="right" >
                           </span>
                         </td>
                     </tr>
                </tbody>
               </form>
             </table>
         </div>
         
         <div class="TabbedPanelsContent">
          <form  name="increment_semester_by_roll" method="post" action="increment_sem_process.php" style="padding-top:10px;">
			 <table width="800" border="0" align="center">
               <tbody>
                    <tr class="qbullet">
                        <td class="qbullet" valign="top" width="41%"><span class="style5">Roll No.</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td valign="top" width="15%" >
                           <span class="style5">
                            <input name="roll" id="roll" size="10" type="text" onChange="getStuDetails(this.value)"></input>
                           </span>
                        </td>
                        <td align="left"><input type="button" value="get details"></td>
                    </tr>
                </tbody>
             </table>
             <div id="getstudetails"></div>
             <table width="800" border="0" align="center">
               <tbody>
                    <tr class="qbullet">
                        <td colspan="4" height="23" valign="top">
                        <div id="select_room" style="border:#000 thin groove; display:none"></div>
                        <div align="center">
                        <input name="SubmitR" value="Submit" type="submit" ></input>
                        </div>    </td>
                        </tr>
                </tbody>
             </table>
           </form>
         </div>
         <!--<div class="TabbedPanelsContent">
           <table width="800" border="0" align="center">
            <form  name="increment_semester" method="post" action="" style="padding-top:10px;">
               <tbody>
                    <tr class="qbullet">
                        <td class="qbullet" valign="top"><span class="style5">Roll No.</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td valign="top" width="56%">
                           <span class="style5">
                            <input name="roll" id="roll" size="10" type="text" onChange="getStuDetails(this.value)"></input>
                           </span>
                        </td>
                     </tr>
                </tbody>
               </form>
             </table>
         </div>-->
        
       </div>
     </div>
        </div>
    </div>
 <?php   include "footer.php";  ?>
         </div>
    <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
        </script>
   </body>
</html>  