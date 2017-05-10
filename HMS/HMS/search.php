<?php

//this page is for searching all the students of a hostel
//the admin can select the hostel, and then all the students will be displayed
//the admin can also filter his/her search by course, branch, section(I don't know the meaning and significance of Section) and by semester

session_start();

include('../include/warning.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/menu.css" type="text/css" />
        <title>HMS | Search Student</title>
        <style>
            .stucount
            {
                float:right; background:#CCC; color:#33F;line-height:30px;	
                width:150px;
                cursor:pointer;
            }
            .stucount:hover
            {
                background:#999;
            }
        </style>
        
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
                
        
           
            function getStuByHst(val)
			{
                    var url="retStuByHst.php?id="+val;
                    var xmlHttp = initXMLHTTPRequest();
                    xmlHttp.open("GET",url, true);
                    xmlHttp.onreadystatechange = function () 
                    {
                        if (xmlHttp.readyState == 4) 
                        {
                            var xmlDoc = xmlHttp.responseText;		
                            //alert(xmlDoc);
                            document.getElementById("studataByHostel").innerHTML = xmlDoc;	
                        }
                    };
                xmlHttp.send(null);	
                document.getElementById('branch').value=null;
                document.getElementById('section').value=null;
                document.getElementById('semester').value=null;
                }
              function getdetByBranch(val)
			  {
                  var  hostel_id =document.getElementById('Field1').value;
                    var url="retStuByBranch.php?id="+val+"&hostel="+hostel_id;
                    var xmlHttp = initXMLHTTPRequest();
                    xmlHttp.open("GET",url, true);
                    xmlHttp.onreadystatechange = function () 
                    {
                        if (xmlHttp.readyState == 4) 
                        {
                            var xmlDoc = xmlHttp.responseText;		
                            //alert(xmlDoc);
                            document.getElementById("stulist").innerHTML = xmlDoc;	
                        }
                    };
                xmlHttp.send(null);	
                document.getElementById('section').value=null;
                document.getElementById('semester').value=null;
                } 
                
				function getStudetBySection(val)
				{
					var  hostel_id =document.getElementById('Field1').value;
					var  branch =document.getElementById('branch').value;
					if(branch =="")
					{
						alert("Select Branch First");	
						return false;					
					}
					else
					{
						var url="retStuBySec.php?id="+val+"&hostel="+hostel_id+"&branch="+branch;
						var xmlHttp = initXMLHTTPRequest();
						xmlHttp.open("GET",url, true);
						xmlHttp.onreadystatechange = function () 
						{
							if (xmlHttp.readyState == 4) 
							{
								var xmlDoc = xmlHttp.responseText;		
								//alert(xmlDoc);
								document.getElementById("stulist").innerHTML = xmlDoc;	
							}
						};
						xmlHttp.send(null);	
						document.getElementById('semester').value=null;	
					}                      
                } 
                
                 function getStuDetBySeme(val)
				 {
                    var  hostel_id =document.getElementById('Field1').value;
                    var  branch =document.getElementById('branch').value;
                    var  section =document.getElementById('section').value;
                    if(branch ==''){
                        var url="retStuBySemester.php?id="+val+"&hostel="+hostel_id;
                    }
                    else{
                        var url="retStuBySemester.php?id="+val+"&hostel="+hostel_id+"&branch="+branch+"&section="+section;
                    }
                    var xmlHttp = initXMLHTTPRequest();
                    xmlHttp.open("GET",url, true);
                    xmlHttp.onreadystatechange = function () 
                    {
                        if (xmlHttp.readyState == 4) 
                        {
                            var xmlDoc = xmlHttp.responseText;		
                            //alert(xmlDoc);
                            document.getElementById("stulist").innerHTML = xmlDoc;	
                        }
                    };
                xmlHttp.send(null);		
                }
                
                function getdetail(val)
                {
                	location='CstuDet.php?roll='+val;
				}
                function getbranch(val)
				{
                //	alert(val);
                //	return false;
                    getsem();
                    var url="ret_branchbycourse.php?id="+val;
                    var xmlHttp = initXMLHTTPRequest();
                    xmlHttp.open("GET",url, true);
                    xmlHttp.onreadystatechange = function () 
                    {
                        if (xmlHttp.readyState == 4) 
                        {
                            var xmlDoc = xmlHttp.responseText;		
                            //alert(xmlDoc);
                            document.getElementById("branch").innerHTML = xmlDoc;	
                        }
                    };
                xmlHttp.send(null);	
                                    
                }
                function getsem()
				{
                    var val = document.getElementById("course").value;
                    var url="ret_semester.php?id="+val;
                    var xmlHttp = initXMLHTTPRequest();
                    xmlHttp.open("GET",url, true);
                    xmlHttp.onreadystatechange = function () 
                    {
                        if (xmlHttp.readyState == 4) 
                        {
                            var xmlDoc = xmlHttp.responseText;		
                            //alert(xmlDoc);
                            document.getElementById("semester").innerHTML = xmlDoc;	
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
			$query = 'active';
            include "menu.php";
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                  <h3>Search Student In Hostel</h3>
                   <table width="100%" cellpadding="10" cellpadding="10" align="center">
                   <tr>
                   <td id="HostelSearchTd" align="center">
					Hostel Name&nbsp;:
                     <select id="Field1" name="hostel_name" class="field select small" tabindex="1"  onChange="getStuByHst(this.value)"> 
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
                    </td></tr>
                    <tr>  <td id="studataByHostel">    </td>  </tr>                   
                   </table>
                          
                    </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  