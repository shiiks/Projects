<?php session_start();	include('../include/warning.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::SEARCH STUDENT BY NAME</title>
			
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
                    
            
                 function getStuByName(){
		                var roll=document.getElementById('namesearch').value;
                        var url="retStuByName.php?id="+roll;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("sturetData").innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
                    }
					
					function getdetail(val)
					{
			        location='CstuDet.php?roll='+val;
										}
					
                  </script>
           
    </head>
  
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$query = 'active';
               		include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                  <h3>Search Student By Name</h3>
                   <table width="100%" cellpadding="10" cellpadding="10" align="center">
                   <tr>
                   <td align="center">Enter Name:
                   <input type="text" size="30" name="namesearch" id="namesearch">
                   <input type="button" onClick="getStuByName()" value="Submit"/>
                  </td><td></td> </tr>
                  
                   <tr><td id="sturetData" align="center" colspan="2"></td></tr>
                                     
                   </table>
                          
                    </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
         
    </body>
</html>  
