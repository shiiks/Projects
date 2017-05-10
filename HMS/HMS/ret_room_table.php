<style>


/*a.tooltip {outline:none;text-decoration:none;border-bottom:dotted 1px blue;}
a.tooltip strong {line-height:30px;} 
a.tooltip > span { 
width:200px; 
padding: 10px 20px;
margin-top: 20px;
margin-left: -85px;
opacity: 0;
visibility: hidden;
z-index: 10;
position: absolute;
font-family: Arial; 
font-size: 12px;
font-style: normal;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
-o-border-radius: 3px;
border-radius: 3px;
-webkit-box-shadow: 2px 2px 2px #999;
-moz-box-shadow: 2px 2px 2px #999;
box-shadow: 2px 2px 2px #999; 
-webkit-transition-property:opacity, margin-top, visibility, margin-left;
-webkit-transition-duration:0.4s, 0.3s, 0.4s, 0.3s; 
-webkit-transition-timing-function: ease-in-out, ease-in-out, ease-in-out, ease-in-out; 
-moz-transition-property:opacity, margin-top, visibility, margin-left; 
-moz-transition-duration:0.4s, 0.3s, 0.4s, 0.3s;
-moz-transition-timing-function: ease-in-out, ease-in-out, ease-in-out, ease-in-out; 
-o-transition-property:opacity, margin-top, visibility, margin-left;
-o-transition-duration:0.4s, 0.3s, 0.4s, 0.3s; 
-o-transition-timing-function: ease-in-out, ease-in-out, ease-in-out, ease-in-out;
transition-property:opacity, margin-top, visibility, margin-left;
transition-duration:0.4s, 0.3s, 0.4s, 0.3s;
transition-timing-function: ease-in-out, ease-in-out, ease-in-out, ease-in-out;
} 

a.tooltip:hover > span 
{ 
opacity: 1; 
text-decoration:none;
visibility: visible;
overflow: visible;
margin-top:36px;
display: inline;
margin-left: -100px;
} 
a.tooltip span b {
width: 15px; 
height: 15px;
margin-left: 20px;
margin-top: -19px;
display: block; 
position: absolute; 
-webkit-transform: rotate(-45deg); 
-moz-transform: rotate(-45deg);
-o-transform: rotate(-45deg); 
transform: rotate(-45deg); 
-webkit-box-shadow: inset -1px 1px 0 #fff;
-moz-box-shadow: inset 0 1px 0 #fff;
-o-box-shadow: inset 0 1px 0 #fff;
box-shadow: inset 0 1px 0 #fff;
display: none\0/; *display: none; 
}
a.tooltip > span { 
color: #FFFFFF; background: #333333; 
background: -moz-linear-gradient(top, #333333 0%, #999999 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#333333), color-stop(100%,#999999)); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#333333', endColorstr='#999999',GradientType=0 );
border: 1px solid #000000; }
a.tooltip span b {
background: #333333; 
border-top: 1px solid #000000;
border-right: 1px solid #000000; 
} */


a.tooltip {outline:none; } 
a.tooltip strong {line-height:30px;}
a.tooltip:hover {text-decoration:none;}
a.tooltip span {
z-index:10;
display:none;
padding:14px 20px;
margin-top:27px;
margin-left:-180px;
height:95px;
font-size:10px;
line-height:12px;
} 
a.tooltip:hover span{
display:inline;
position:absolute; 
border:2px solid #FFF; 
color:#EEE; 
background:#000 url(src/css-tooltip-gradient-bg.png) repeat-x 0 0; }
.callout {z-index:20;position:absolute;border:0;top:-14px;left:120px;}

a.tooltip span {
border-radius:5px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px; 
-moz-box-shadow: 0px 0px 8px 4px #666;
-webkit-box-shadow: 0px 0px 8px 4px #666;
box-shadow: 0px 0px 8px 4px #666;
opacity: 0.95; }


#button{
	margin:0;
	padding:5px;
	width:52px;
	background-color:#F7F7F7;
	border:1px solid #CCCCCC;
	cursor:pointer;
	
}
#button1{
	margin:0;
	padding:5px;
	width:50px;
	background-color:#F7F7F7;
	border:1px solid #CCCCCC;
	color:#FFF;
	disabled="disabled";
}

#button:hover{
	margin:0;
	padding:5px;
	color:#FFF;
	background-color:#999;
	border:1px solid #CCCCCC;
	cursor:pointer;
	
}

</style>
<?php

session_start();

include('../include/db.inc.php');

$current_date = date('Y-m-d');

$hostel_id = $_REQUEST['id'];

$query = 'select room_id,room_capacity from hostel_room where hostel_id="'.$hostel_id.'" order by Sno ASC';
$result1=mysql_query($query) or die(mysql_error());
$get_rows = mysql_num_rows($result1);	

if($get_rows ==0)
{
	echo "<h1>SORRY!!! NO ROOMS FOUND FOR THIS HOSTEL.</h1>";
}
else
{  
	?>
    <h2><?php echo $hostel_id?>&nbsp;HOSTEL ROOM'S:</h2>
    <h5>    <input  type="button" name="1" id="button1" style="background-color:#FF0;"  />&nbsp; &nbsp; ALL FILLED &nbsp; &nbsp; 
    <input  type="button" name="2" id="button1" style="background-color:#096;"    />&nbsp; &nbsp;PARTIAL FILLED &nbsp; &nbsp; 
    <input  type="button" name="3" id="button1"   />&nbsp; &nbsp; VACCANT  &nbsp; &nbsp; 
    <input  type="button" name="3" id="button1" style="background-color:#F00;"   />&nbsp; &nbsp; TRANSFERED  &nbsp; &nbsp; 
    </h5>
    <?php	
    while($data=  mysql_fetch_array($result1))
    {
        $get_room_capacity = $data['room_capacity'];	
        
        $style = "";
        $disable ='';
        $get_no =0;
        $roll = "";
        
        
        $sql = 'select room,roll from room_allocation1 where hostel_id="'.$hostel_id.'" and room ="'.$data['room_id'].'" AND ( `end_date` >= "'.$current_date.'" ) ; ';
        $get_result=mysql_query($sql) or die(mysql_error());
        $get_no = mysql_num_rows($get_result);	
        while($row = mysql_fetch_array($get_result))
        {
            $roll.= ' - '.$row['roll'];
        }
        $gettempdetSQL= 'select `tra_roll` from `tem_room_allotment` where `tra_hostel_id`="'.$hostel_id.'" and `tra_room` ="'.$data['room_id'].'"';
        $gettempderesult=mysql_query($gettempdetSQL) or die(mysql_error());
        $gettempdetROWS=mysql_num_rows($gettempderesult);
        while($gettempderow = mysql_fetch_array($gettempderesult))
        {
        //for gettin details of student allocated temprory in the room	
        $roll.=' - '.$gettempderow['tra_roll'];
        }
    
        if($gettempdetROWS >0)
        {
            $get_no = $get_no + $gettempdetROWS;
            if($get_no == $get_room_capacity)
            {
                $style =" background: -moz-linear-gradient(left, #F00 30%, #FF0 50%); color:#000;";
                $disable = "disabled='disabled'";
            }
            else if($get_no < $get_room_capacity)
            {
            $style =" background: -moz-linear-gradient(left, #F00 30%, #096 50%); color:#000;";
            $disable = "";
            }
        }
        else if($get_no == $get_room_capacity)//3 compare with db value
        {
            $style =" background-color:#FF0; color:#000;";
            $disable = "disabled='disabled'";
        }
        elseif($get_no < $get_room_capacity && $get_no > 0 )//3 compare with db value
        {
            $style =" background-color:#096; color:#000;";
        }
    
        ?>
    
    
        <a class="tooltip"><input  type="button" name="sada"  title="<?php echo $get_no.'&nbsp;Student'.$roll;?>" id="button" <?php echo $disable; ?> style=" <?php echo $style ?> " value="<?php echo $data['room_id'];?>" onclick="checkvalue(this.value)"/>
    
			<?php 	
            $arr = explode('-',$roll);
            $c=1;
            
            if($get_no == 0)
            {
                echo "<span style=' height:10px;'>ROOM IS EMPTY</span>";	
            }
            else
            {
                ?>
                <span>
                <?php
                while($c <= $get_no)
                {
                    $n=trim($arr[$c]);
                    $sql4='select `name`,`photo` from `student` where `roll` = "'.$n.'"';
                    $result4=mysql_query($sql4);
                    //$get_rows4 = mysql_num_rows($result4);
                    //echo $get_rows4;
                    $getdata4 = mysql_fetch_array($result4);
                    //echo $getdata4['photo'];
                    ?>
                    <div style="margin-left:8px; float:left; width:83.33px" onclick="window.location='CstuDet.php?roll=<?php echo $n; ?>'">
                    <?php echo '<img src="../../E-helpDesk/StuImages/'.$getdata4['photo'].'" height="70px" width="50px"  ></img><br>'.$getdata4['name'].'</div>';
                    $c++;
                }
            ?>
                </span>
            <?php
        	}
        ?>
        </a>
        <?php
	}
}
?>