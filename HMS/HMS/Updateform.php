<?php session_start(); include('../include/warning.php');?><!DOCTYPE html>

<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
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
              function getStuByRoll(){
		       var roll=document.getElementById('rollsearch').value;

                        var url="retStuByRoll.php?id="+roll;
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
			   function viewDetail(){
		       var roll=document.getElementById('rollsearch').value;
                 parent.location="updatestudentDetails.php?roll="+roll;
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
                   <h3>Enter Roll Number</h3>
                   <table width="100%" cellpadding="10" cellpadding="10" align="center">
                   <tr>
                   <td align="center">By Roll No:
                   <input type="text" size="20" name="rollsearch" id="rollsearch">
                   <input type="button" onClick="getStuByRoll()" value="Submit"/>
                  </td> </tr>
                   <tr>
                   <td id="sturetData" align="center" onClick="viewDetail()"></td></tr>
                   </table>
                   
                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div> 
<?php
error_reporting(E_ALL ^ E_NOTICE);
 if($_REQUEST['st'] == '1')
    $mes = "Data Updated Sucessfully.";
else if($_REQUEST['st'] == '0')
    $mes = "Unsucessfull.Try Later!!";
else if($_REQUEST['st'] == '3')
    $mes = "Roll number not registered,please Register first!!";
else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>
    </body>
</html>  