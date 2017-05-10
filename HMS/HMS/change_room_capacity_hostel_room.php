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
			$edit = 'active';
			include "menu.php";
             ?> 

             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>

                     <h3>Room Allocation</h3>

                <form id="form2" name="form2" class="formarea topLabel page"  method="post"  action="change_room_capacity_hostel_room1.php" >
                         <header id="header" class="info">
                            <div>This makes change the capacity of rooms to hostel.</div>
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
                        <select id="hostel" name="hostel" class="field select small" tabindex="1" > 
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
                        Hostel Room
                        <span id="req_1" class="req">*</span>
                        </label>
                        </td>
                        <td><input name="room" id="room" size="10" type="text" ></input>
</td></tr>          
                        <tr><td></td></tr>   
                         <tr><td></td></tr>     
  

   
                       <tr>
                        <td width="40%">
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
                        </table>
                        

                        </li> <li class="buttons ">
                        <div style="margin-left:300px;">
                        <input id="submit" name="submit" class="btTxt submit" type="submit" value="Submit"/></div>
                        </li>
                        </ul>
                        </form>

                </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  