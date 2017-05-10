<?php
include('../include/db.inc.php');
$room_capacity  = $_POST['room_capacity'];
$hostel_name = $_POST['hostel_name'];
$room_type = $_POST['room_type'];
$text_name1 = $_POST['text_name1'];
$text_name2 = $_POST['text_name2'];
$text_name3 = $_POST['text_name3'];
$text_name4 = $_POST['text_name4'];
$text_name5 = $_POST['text_name5'];
$text_name6 = $_POST['text_name6'];
$text_name11 = $_POST['text_name11'];
$text_name22 = $_POST['text_name22'];
$text_name33= $_POST['text_name33'];
$text_name44 = $_POST['text_name44'];
$text_name55= $_POST['text_name55'];
$text_name66= $_POST['text_name66'];
$no_of_box =$_POST['no_of_box'];
$flag="i";

if($no_of_box ==1)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity,flag) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}}

if($no_of_box ==2)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name222 = explode('-',$text_name22);
$start = $text_name222[0];
$end = $text_name222[1];
while($start <=$end){
$k= $text_name2.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
}


if($no_of_box ==3)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name222 = explode('-',$text_name22);
$start = $text_name222[0];
$end = $text_name222[1];
while($start <=$end){
$k= $text_name2.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name333 = explode('-',$text_name33);
$start = $text_name333[0];
$end = $text_name333[1];
while($start <=$end){
$k= $text_name3.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
}


if($no_of_box ==4)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name222 = explode('-',$text_name22);
$start = $text_name222[0];
$end = $text_name222[1];
while($start <=$end){
$k= $text_name2.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name333 = explode('-',$text_name33);
$start = $text_name333[0];
$end = $text_name333[1];
while($start <=$end){
$k= $text_name3.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name444 = explode('-',$text_name44);
$start = $text_name444[0];
$end = $text_name444[1];
while($start <=$end){
$k= $text_name4.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
}


if($no_of_box ==5)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name222 = explode('-',$text_name22);
$start = $text_name222[0];
$end = $text_name222[1];
while($start <=$end){
$k= $text_name2.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name333 = explode('-',$text_name33);
$start = $text_name333[0];
$end = $text_name333[1];
while($start <=$end){
$k= $text_name3.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}

$text_name444 = explode('-',$text_name44);
$start = $text_name444[0];
$end = $text_name444[1];
while($start <=$end){
$k= $text_name4.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}

$text_name555 = explode('-',$text_name55);
$start = $text_name555[0];
$end = $text_name555[1];
while($start <=$end){
$k= $text_name5.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
}


if($no_of_box ==6)
{
$text_name111 = explode('-',$text_name11);
$start = $text_name111[0];
$end = $text_name111[1];
while($start <=$end){
$k= $text_name1.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name222 = explode('-',$text_name22);
$start = $text_name222[0];
$end = $text_name222[1];
while($start <=$end){
$k= $text_name2.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name333 = explode('-',$text_name33);
$start = $text_name333[0];
$end = $text_name333[1];
while($start <=$end){
$k= $text_name3.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}

$text_name444 = explode('-',$text_name44);
$start = $text_name444[0];
$end = $text_name444[1];
while($start <=$end){
$k= $text_name4.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name555 = explode('-',$text_name55);
$start = $text_name555[0];
$end = $text_name555[1];
while($start <=$end){
$k= $text_name5.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}
$text_name666 = explode('-',$text_name66);
$start = $text_name666[0];
$end = $text_name666[1];
while($start <=$end){
$k= $text_name6.'-'.$start;
 
$sql = "Insert into hostel_room(room_id,hostel_id,room_type,room_capacity) values('".$k."','".$hostel_name."','".$room_type."','".$room_capacity."','".$flag."')";
$result=mysql_query($sql,$db) or die(mysql_error());
$start++;
}

}


header('location:add_hostel_room.php?st=1');
?>
