<?php session_start();
	include('../include/warning.php');
 ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
              <title> HMS::INDICIPLINE ACTIVITY</title>

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
                        document.getElementById("temp_room").value = val;
                        document.getElementById("select_room").style.display = "none";
                        
                    }
	  </script>
    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$indact = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                      <h3>INDISCIPLINARY ACTIVITY</h3>
            <div id='indici_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form  name="indici" method="post" action="idiscact1.php" style="padding-top:10px">
                        <table width="800" border="0" align="center">
                        <tbody><tr >
                         <tr >
                        <td  valign="top"><span class="style5">Roll No.</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td valign="top" width="56%">
                        <span class="style5">
                        <input name="roll" id="roll" size="10" type="text" onChange="getStuDetails(this.value)"></input>
                        </span></td></tr>
                          </tbody></table>
                         <div id="getstudetails"></div>
                        <table width="800" border="0" align="center">
                        <tbody>
                        <tr >
                        <td  valign="top"><span class="style5">Cause</span></td>
                        
                        
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <span class="style5">
                       <textarea name="cause" cols="30" id="cause"></textarea>
                        </span></td>
                        </tr>
                         <tr >
                        <td  valign="top"><span class="style5">Fine</span></td>
                        
                        
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        
                        <td valign="top" width="56%">
                        <span class="style5">
                        <input type="checkbox" name="fine1" value="amt" /> Amonunt <br /> 
                        <input name="amnt" id="amnt" size="60" type="text"></input><br />
              <input type="checkbox" name="fine" value="prd" /> Period <br />
               <input name="perd" id="perd" size="60" type="text"></input>
                        </span></td></tr>
                        
                        <tr >
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
var indiciValidator = new Validator("indici");

indiciValidator.EnableOnPageErrorDisplay();
indiciValidator.SetMessageDisplayPos("right");

indiciValidator.EnableMsgsTogether();
indiciValidator.addValidation("roll","req","Please fill in roll");
indiciValidator.addValidation("cause","req","Please fill in cause");

// ]]>
</script>




                       </div>
                        
                           <?php 
					$msg = $_GET['msg'];
					if($msg==5)
					      {
				 echo '<script language="javascript">alert("DataBase Updated")</script>';					   

						  }?>
                    
                    </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         
                             
                                  
         
         </div>  
    </body>
</html>  