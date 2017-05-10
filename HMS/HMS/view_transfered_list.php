<?php session_start();
include('../include/warning.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS::VIEW TRANSFER STUDENT</title>
               <style>
			#tabletr{
				cursor:pointer;	
				}
			#tabletr:hover{
				cursor:pointer;	
				background:#E2E2E2;
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
                    
                    function select_room(val)
                    {
                  
                        document.getElementById("select_room").innerHTML = "<img style='text-align=center' src='images/ajax-loader.gif'>";
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
					 
					function checkRoom(val,id,hostel_id,roll){
						//alert(val+''+id+''+hostel_id);
					var url="check_room_details.php?id="+val+"&hostel_id="+hostel_id+"&id_name="+id+"&roll="+roll;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById(id).innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
						// alert(val+sno);
                    }
					function test(){
						alert("hello");
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
                  <h3>Transfer Student </h3>
                  <?php
				  	if($data['type']=='SA')
					{
				  $sql = "SELECT * FROM `student_transfered` as st, `student` as s  WHERE st.roll = s.roll and st.transfer_bit =1 order by st.roll and st.transfer_bit = 1";
					}
					else{
						
				  $sql = "SELECT * FROM `student_transfered` as st, `student` as s  WHERE st.new_hostel='".$data2['hostel']."' and st.roll = s.roll and st.transfer_bit =1 order by st.roll and st.transfer_bit = 1";
					}
						
				  $sql_query = mysql_query($sql);
				  if(mysql_num_rows($sql_query) >0){
					  ?>
                    <form name="tl" action="" method="post" >
                    <table cellpadding="5" cellspacing="5" align="center" width="100%">
                    <thead  bgcolor="#CCF" height="30">
                    <th>ROLL</th>
                    <th>NAME</th>
                    <th>BRANCH</th>
                    <th>SEMESTER</th>
                    <th>OLD HOSTEL</th>
                    <th>NEW HOSTEL</th>
                    <th>ROOM NO</th>
                    <th align=center class=virak ><a href="#select_room1" title="check room details"><img src="images/select_room.gif" height="30" width="20" onClick="select_room('<?php echo $data2['hostel']; ?>')" ></a></th>
                    </thead> 
                    <?php
                        $color="1";
                        while($r = mysql_fetch_array($sql_query))
                        {
                        $sno = $r['Sno'];
                        $roll = $r['roll'];
                        $name=$r['name'];
						$branch = $r['branch'];
						$sem = $r['sem'];
						$old_hostel = $r['old_hostel'];
						$new_hostel = $r['new_hostel'];
		  ?>
			<tr bgcolor=#f1f1f1 onmouseover=\"this.className='hover';\" onmouseout=\"this.className='normal';\" id='tabletr'>
			  <td height=30 align=center class=virak><a><?php echo $roll ?></a></td>
			  <td align=center class=virak><?php echo $name ?></td>
			  <td align=center class=virak><?php echo $branch ?></td>
			  <td align=center class=virak><?php echo $sem ?></td>
			  <td align=center class=virak><?php echo $old_hostel ?></td>
			  <td align=center class=virak ><?php echo $new_hostel ?>
              
			 
			  <td align=center class=virak colspan="2" id= "room_id[<?php echo $sno;?>]" >
              <input type="text" size="8"  style="text-transform:uppercase" onChange="checkRoom(this.value,this.parentNode.id ,'<?php echo $data2['hostel']; ?>','<?php echo $roll; ?>')">
              &nbsp; &nbsp;			 
              <img src="images/AQM.gif" height="30" width="20" >
              </td>
			  </tr>
				     <?php } ?>
            
				  </table>
                  </form>
				 <?php 
				  }//end of if
				  else{?>
					  <div style="color:#C00; font-size:36px; text-align:center ;margin-top:50px;">NO DATA FOUND</div>
                     <input type="button" value="&lt;&lt;Go back" onClick="window.history.go(-1)" >
				  <?php } ?>
				 
        <div id="select_room1" class="dialogDiv" >
        <div  class="dialogDivdiv">
        <a href="#close" title="Close" class="close" >X</a>  
        <div id="select_room">     </div>
        
        </div>
        </div>
  </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  