<?php session_start();

error_reporting(E_ALL ^ E_NOTICE);
if($_REQUEST['st'] == '1')
    $mes = "Transfered Sucessfully";
else if($_REQUEST['st'] == '2')
    $mes = "SORRY, TRY AGAIN!!";
else if($_REQUEST['st'] == '3')
    $mes = "No such data exists!!";
else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } 
include('../include/warning.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::TRANSFER STUDENT</title>
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
					function getbranch(val){
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
					function getsem(){
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
                  <h3>Transfer Student </h3>
                   
                   <form name="tran_form" action="transfer_by_branch1.php" method="post" style="margin-left:50px; margin-top:20px;">
                        <table width="800" border="0" align="center">
                        <tr>
                    <td>Current Hostel</td>
                     <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                    <td valign="top" width="56%"><select name="c_hostel" id="section" size="1">
                        <option >Select</option>
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
                    </td>
                    </tr>
                    
                    <tr>
                    <td>New Hostel</td>
                    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                    <td><select name="n_hostel" id="section" size="1">
                        <option >Select</option>
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
							$sql1= "select hostel_id from hostel";
							$query5=mysql_query($sql1);
							while($row1 = mysql_fetch_array($query5))
							{ ?>
                         <option value="<?php echo $row1['hostel_id'];?>" >
                        <?php echo $row1['hostel_id']; ?>
                        </option>
                         <?php   
							}}?>

                        </select>
                    </td>
                    </tr>
                    
                    <tr class="qbullet">
                    <td><span class="style5">Course of study</span></td>
                    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                    <td>
                    <span class="style5">
                    <select name="course" size="1" id="course" onChange="getbranch(this.value)">
                    <option value="" selected disabled>Select Course</option> 
                    <?php
                    $sql="select * from `course`";
                    $query = mysql_query($sql);
                    while($row = mysql_fetch_array($query)){
                    echo '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';  
                    }  
                    ?>
                    </select>
                    </span></td>
                    </tr>
                        
                        <tr>
                        <td><span class="style5">Name of branch</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td>
                        <span class="style5">
                        <select name="branch" id="branch">
                        <option value="" selected="selected" disabled="disabled">Select Branch</option>
                        </select>
                        </span>
                        </td></tr>
                        
                        <tr>
                        <td><span class="style5">Semester</span></td>
                        <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
                        <td>
                        <span class="style5">
                        <select name="semester" id="semester">
                        <option value="" selected="selected" disabled="disabled">Select semester</option>
                        </select>
                        </span>
                        </td></tr>
                        
                        <tr>
                         <td colspan="3" height="23" valign="top">
                        <div id="select_room" style="border:#000 thin groove; display:none"></div>
                        <div align="center">
                        <input name="Submit" value="Submit" type="submit" ></input>
                        </div>    </td>
                        </tr>
                        </table>
                       </form>
                          
                    </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  