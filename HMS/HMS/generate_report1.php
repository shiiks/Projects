<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::Generate List</title>
            <style>
			li{
			 padding-top:10px;
			}
			</style>
                 <script type="text/javascript" language="javascript">
		    function notyet(){
			alert("Page Under Construction.Sorry for inconvenience");
			return false;							
			}
            function sendreqForGLBYH(){
			var val = document.getElementById('hostel_name').value;
 			location ='dompdf/generateSTUList.php?hostel_name='+val;
 		 }
		   function sendreqForGLBYB(){
			var val = document.getElementById('branch_name').value;
 			location ='dompdf/generateSTUListbyB.php?branch_name='+val;
 		 }
                    
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
				  function checkHostel(){
                  document.getElementById("select_room").style.display = "none";
                    }
				 function checkAll(){
                    alert("Please Select at least one to generate the Student report");
                    }
			         </script>


    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$home = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    
                  <?php  if($_REQUEST['report_type']){ ?>
                   <h3>Generate Student List Report</h3>
                   <br>
                    <a href="dompdf/generateSTUList.php?hostel_name=ALL">Click Here</a>
                      for Generate List of All the Student<br>
                      <form id="GenerateRep" name="GenerateRep" method="post" action="" style="padding-top:10px" >
                        <table align="center" width="400px">
                        <tr> <td>Filter By:</td></tr>
                        <tr height="5px"></tr>
                        
                         <tr>
                          <td width="50%"> <input type="checkbox" name="search2" value="branch" /> Branch </td>
                          <td>
                           <select name="branch" id="branch">
                            <option value="" selected="selected" disabled="disabled">Select one</option>
                            <?php
                        $sql = "select DISTINCT branch from room_allotment";
                        $query = mysql_query($sql);
                        while($row = mysql_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['branch'];?>" >
                        <?php echo $row['branch']; ?>
                        </option>
                        <?php } ?>
                            </select>
                          </td>
                         </tr>
                         <tr>
                    <td><input type="checkbox" name="searc3" value="Section" />Section:</td>
                    <td><select name="section" id="section" size="1">
                    <option value="" selected="selected" disabled="disabled">Select one</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>    
                    <option value="3">3</option>    
                    <option value="4">4</option>    
                    <option value="5">5</option>    
                    <option value="6">6</option>    
                    <option value="7">7</option>    
                    <option value="8">8</option>    
                    </select>
                    </td>
                    </tr> 
                   <tr>
                    <td><input type="checkbox" name="search4" value="Semester" />Semester:</td>
                    <td><select name="sem" id="sem">
                    <option value="" selected="selected" disabled="disabled">Select one</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>    
                    <option value="3">3</option>    
                    <option value="4">4</option>    
                    <option value="5">5</option>    
                    <option value="6">6</option>    
                    <option value="7">7</option>    
                    <option value="8">8</option>    
                    </select>
                    </td>
                   </tr>
                   <tr>
                          <td width="50%"> <input type="checkbox" name="search1" value="hostel" /> Hostel </td>
                          <td>
                           <select id="hostel_id" name="hostel_id"  tabindex="1" > 
                            <option value="" selected="selected">Select One</option>
							<?php
                            $sql = "select hostel_id from hostel";
                            $query = mysql_query($sql);
                            while($row = mysql_fetch_array($query)){
                            ?>
                           <option value="<?php echo $row['hostel_id'];?>" ><?php echo $row['hostel_id']; ?></option>
                           <?php } ?>
                           </select>
                          </td>
                   </tr>
                   <tr>
                    <td><input type="checkbox" name="search5" value="hostel_room"  onClick="checkAll()"/>Hostel Room No:</td>
                    <td>
                    <input type="text" name="hostel_room" id="hostel_room" size="12" />
                    <label style="font-size:10px; color:red">Eg:0A-9 or 2C-195</label>
                    </td>
                   </tr>
                 
                   <tr>
                        <td colspan="2" >
						<input type="submit" name="Submit" value="Submit" style="margin-left:120px" onClick="notyet()"/>                        </td>
                    </tr>
                 </table>
                </form>

            <?php } else{ } ?>
            <div style="margin-top:50px; margin-right:50px; float:right" >
            <input type="button" value="GO BACK" onClick="window.history.back(-1)">
            </div>
          </div>
          </div>
          <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  