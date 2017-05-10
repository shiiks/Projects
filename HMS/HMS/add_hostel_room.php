<?php session_start(); ?><?php
error_reporting(E_ALL ^ E_NOTICE);
 if($_REQUEST['st'] == '1')
    $mes = "Data Inserted Sucessfully.";
else if($_REQUEST['st'] == '3')
    $mes = "Unsucessfull Data Entry.Try Later!!";
else
   $mes = '';	

if($mes!=''){
?>
<script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <link href="css/form.css" rel="stylesheet" type="text/css">  
            <title>HMS::ADD ROOM</title>

            <script src="scripts/add_hostel.js"></script>
      </head>
   <body onload="makezero()">
        <div class="page">
            <?php 
			include "top.php";
			$Add = 'active';
			include "menu.php";
             ?> 
                   <script type="text/javascript">
         function makezero()
{
     document.getElementById("text_1").style.visibility="none";
     document.getElementById("text_2").style.visibility="hidden";
     document.getElementById("text_3").style.visibility="hidden";
     document.getElementById("text_4").style.visibility="hidden";
	 document.getElementById("text_5").style.visibility="hidden";
	 document.getElementById("text_6").style.visibility="hidden";
    document.getElementById("table_proj").height="20px";

}
 function add_project(val)
    {
var acc_no=val;

    if(acc_no==0)
        {
            document.getElementById("text_1").style.visibility="hidden";
            document.getElementById("text_2").style.visibility="hidden";
            document.getElementById("text_3").style.visibility="hidden";
            document.getElementById("text_4").style.visibility="hidden";
			document.getElementById("text_5").style.visibility="hidden";
			document.getElementById("text_6").style.visibility="hidden";
        }
    else if(acc_no==1)
        {
            document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="hidden";
            document.getElementById("text_3").style.visibility="hidden";
            document.getElementById("text_4").style.visibility="hidden";
			document.getElementById("text_5").style.visibility="hidden";
            document.getElementById("text_6").style.visibility="hidden";
		}
        else if(acc_no==2)
         {
             document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="visible";
            document.getElementById("text_3").style.visibility="hidden";
            document.getElementById("text_4").style.visibility="hidden";
			document.getElementById("text_5").style.visibility="hidden";
            document.getElementById("text_6").style.visibility="hidden";
			}
            else if(acc_no==3)
                {
              document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="visible";
            document.getElementById("text_3").style.visibility="visible";
            document.getElementById("text_4").style.visibility="hidden";
			document.getElementById("text_5").style.visibility="hidden";
			document.getElementById("text_6").style.visibility="hidden";    }
                 else if(acc_no==4)
                {
                  document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="visible";
            document.getElementById("text_3").style.visibility="visible";
            document.getElementById("text_4").style.visibility="visible";
			document.getElementById("text_5").style.visibility="hidden";
			document.getElementById("text_6").style.visibility="hidden";
                }
				 else if(acc_no==5)
                {
                  document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="visible";
            document.getElementById("text_3").style.visibility="visible";
            document.getElementById("text_4").style.visibility="visible";
			document.getElementById("text_5").style.visibility="visible";
			document.getElementById("text_6").style.visibility="hidden";

                } 
				else if(acc_no==6)
                {
                  document.getElementById("text_1").style.visibility="visible";
            document.getElementById("text_2").style.visibility="visible";
            document.getElementById("text_3").style.visibility="visible";
            document.getElementById("text_4").style.visibility="visible";
			document.getElementById("text_5").style.visibility="visible";
			document.getElementById("text_6").style.visibility="visible";
                }
    }
   </script> 
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
                     <h3>Room Allocation</h3>

                <form id="form2" name="form2" class="formarea topLabel page" 
                autocomplete="off" enctype="multipart/form-data" method="post"  action="insert_room.php" >
                         <header id="header" class="info">
                            <div>This makes allocation of rooms to hostel.</div>
                        </header>
                        <ul>
                        <li id="foli1" class="notranslate ">
                        
                        
                        <table width="100%">
                        <tr><td width="19%">
                         <label class="desc" id="title1" for="Field1">
                        Hostel
                        <span id="req_1" class="req">*</span>
                        </label>
                        </td>
                        <td width="31%">
                        <select id="Field1" name="hostel_name" class="field select small" tabindex="1" > 
                        <option value="" selected="selected" disabled>Select One
                        </option>
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
                        <td width="35%">
                         <label class="desc" id="title1" for="Field1">
                        Hostel Room Capacity
                        <span id="req_1" class="req">*</span>
                        </label>
                        </td>
                        <td width="15%">
                        <select id="Field1" name="room_capacity" class="field select small" tabindex="1" > 
                        <option value="" selected="selected" disabled>Select One </option>
                        <option value="1" > 1</option>
                        <option value="2" > 2</option>
                        <option value="3" > 3</option>
                        <option value="4" > 4</option>
                        <option value="5" > 5</option>
                        <option value="6" > 6</option>
                        <option value="7" > 7</option>
                        <option value="8" > 8</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="desc" id="title6" for="Field6">
                                No. Of Blocks
                                <span id="req_6" class="req">*</span>
                                </label>
                            </td>
                            <td>
                            	<select id="Field6" name="no_of_box" class="field select small" tabindex="4" onchange="add_project(this.value);" > 
                                    <option value="Select one" disabled>Select one
                                    </option>
                                    <option value="1"  selected="selected">
                                    1
                                    </option>
                                    <option value="2" >
                                    2
                                    </option>
                                    <option value="3" >
                                    3
                                    </option>
                                    <option value="4" >
                                    4
                                    </option>
                                    <option value="5" >
                                    5
                                    </option>
                                    <option value="6" >
                                    6
                                    </option>
 	                           </select>
                            </td>
                            <td>
                            	<label class="desc" id="title1" for="Field1">
                                    Room Type
                                    <span id="req_1" class="req">*</span>
                                </label>	
                            </td>
                            <td>
                            	<select id="Field99" name="room_type">
								<?php
								$get_room_type = mysql_query('SELECT `room_type`, `description` FROM `room_type` ;');
									while($row_room_type = mysql_fetch_array($get_room_type))
									{
								?>
                                <option value="<?php echo $row_room_type['room_type']; ?>"><?php echo $row_room_type['description']; ?></option>
                                
                                <?php
									}
								?>
                                </select>
                            </td>
                        </tr>
                        </table>
                        
                        <li id="foli6" class="notranslate       ">
                        
                        <br><br>
						<table style="margin-left:100px;">
                        <tr>
                        <th>Floor NO with Block No<br>Eg:4c or 2a</th>
                        <th width="20%"></th>
                        <th>Range(start - end)<br>50-90</th>
                        </tr>
                        <tr id="text_1">
                        <td>
                        <input type="text" name="text_name1"  value="" id="text_name_1" placeholder="2c"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name11"  value="" id="text_name_11" placeholder="1-9"/>
                        </td>
                        </tr>
                        
                        <tr id="text_2">
                        <td>
                        <input type="text" name="text_name2"  value="" id="text_name_2"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name22"  value="" id="text_name_22"/>
                        </td>
                        
                        </tr>
                        
                        <tr id="text_3">
                        <td>
                        <input type="text" name="text_name3"  value="" id="text_name_3"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name33"  value="" id="text_name_33"/>
                        </td>
                        
                        </tr>
                        
                        <tr id="text_4">
                        <td>
                        <input type="text" name="text_name4"  value="" id="text_name_4"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name44"  value="" id="text_name_44"/>
                        </td>
                        
                        </tr>
                        
                        <tr id="text_5">
                        <td>
                        <input type="text" name="text_name5"  value="" id="text_name_5"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name55"  value="" id="text_name_55"/>
                        </td>
                        
                        </tr>
                        <tr id="text_6">
                        <td>
                        <input type="text" name="text_name6"  value="" id="text_name_6"/>
                        </td>
                        <td> </td>
                        <td>
                        <input type="text" name="text_name66"  value="" id="text_name_66"/>
                        </td>
                        </tr>
                        </table>
                        </li> <li class="buttons ">
                        <div style="margin-left:300px;">
                        <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit"/></div>
                        </li>
                        </ul>
                        </form>
<script type='text/javascript'>
// <![CDATA[
var form2Validator = new Validator("form2");

form2Validator.EnableOnPageErrorDisplay();
form2Validator.SetMessageDisplayPos("right");

form2Validator.EnableMsgsTogether();
form2Validator.addValidation("hostel_name","dontselect=","Please select an option for Hostel");
form2Validator.addValidation("no_of_box","dontselect=","Please select an option for no_of_box");
form2Validator.addValidation("room_capacity","dontselect=","Please select an option for Room Capacity");
form2Validator.addValidation("text_name1","req","Please fill in Text Box1");
form2Validator.addValidation("text_name11","req","Please fill in Text Box 2");

// ]]>
</script>



                </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  