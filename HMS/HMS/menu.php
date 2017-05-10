<?php
    include('../include/db.inc.php');
	include('../include/warning.php');
    
	//to fetch the Name and Type of the Admin
	//there are 2 types of admin, i) SA and ii) A
	$query = 'SELECT `name`, `type` FROM `admin` WHERE `admin_id`="'.$_SESSION['s_admin_username'].'"';   
    $result1=mysql_query($query) or die(mysql_error());  
    $data=  mysql_fetch_array($result1);
	
	 $query2 = 'select hostel from admin where admin_id="'.$_SESSION['s_admin_username'].'"';   
    $result3=mysql_query($query2) or die(mysql_error());  
    $data2=  mysql_fetch_array($result3);
	if($data['type']=='SA')
	{
     ?>

<div id='menu'>
<ul>
   <li class='<?php echo $home;?>'><a href='index.php'><span>Home</span></a></li>
  
    <li class='has-sub <?php echo $query;?>'><a ><span >Search</span></a>
      <ul>
          <li><a href='search_name.php'><span>Search Student By Name</span></a></li>
         <li><a href='search_roll.php'><span>Search Student By Roll</span></a></li>
         <li><a href='search.php'><span>Search Student By Hostel</span></a></li>
         <li><a href='search_Alumini_name.php'><span>Search Pass Out Student</span></a></li>
         <li><a href='testcheck.php'><span>Reports</span></a></li>
      </ul>
     </li>
        
    <li class='has-sub <?php echo $Add;?>'><a><span >Add</span></a>
      <ul>
         <li><a href="add_admin.php"><span>Add Admin</span></a></li>
         <li><a href="add_mod.php"><span>Add Moderator</span></a></li>
         <li><a href='add_hostel.php'><span>Add Hostel</span></a></li>
         <li><a href='add_hostel_room.php'><span>Add Hostel Room</span></a></li>
      </ul>
    </li>

   <li class='has-sub <?php echo $Post;?>' ><a><span>Register</span></a>
     <ul>
       <li><a href='reg_student.php'><span>Allot Room</span></a></li>
       <li><a href='change_room.php'><span>Change Room</span></a></li>
     </ul>    
   </li>
   <li  class='has-sub <?php echo $indact;?>'><a><span>Edit</span></a>
      <ul> 
        <li><a href="hostel_details.php"><span >Edit Hostel</span></a></li>
        <li><a href="change_room_capacity.php"><span >Edit Hostel Room Capacity & Type</span></a></li>
      </ul>
    </li>
    <li class='has-sub <?php echo $delete;?>'><a ><span >Delete</span></a>
      <ul>
         <li><a href='../HMS/room/room_allotment.php' target="_blank"><span>Delete Student</span></a></li>
          <li><a href='delete_moderator.php'><span>Delete Moderator </span></a></li>
      </ul>
    </li>
	<li class='has-sub <?php echo $indact; ?>'><a><span>Indisciplinary Activity</span></a>
	<ul>
		<li><a href="fine_hostel.php"><span>Fine</span></a></li>
		<li><a href="intermediate_auth.php"><span>Pending Request</span></a></li>
		<li><a href="dc_decision.php"><span>DC Decision</span></a></li>
	</ul>
	</li>
	<li class='has-sub <?php echo $indact; ?>'><a><span>Deallocation</span></a>
	<ul>
		<li><a href="dealloc_request.php"><span>Deallocation Request</span></a></li>
		<li><a href="dealloc_pending.php"><span>Dealloc Pending</span></a></li>
	</ul>
	</li>
	<li class='has-sub <?php echo $indact; ?>'><a><span>Withdrawl</span></a>
	<ul>
		<li><a href="fine_withdraw.php"><span>Fine Withdrawl</span></a></li>
		<li><a href="debar_withdraw.php"><span>Debarred Withdrawl</span></a></li>
	</ul>
	</li>
   <li ><a href='../logout.php'><span>Logout</span></a></li>
</ul>
</div>
<?php
	}
	else
	{
	?>
<div id='menu'>
<ul>
   <li class='<?php echo $home;?>'><a href='index.php'><span>Home</span></a></li>
  
  <li class='has-sub <?php echo $query;?>'><a ><span >Search</span></a>
      <ul>
         <li><a href='search_name.php'><span>Search Student By Name</span></a></li>
         <li><a href='search_roll.php'><span>Search Student By Roll</span></a></li>
         <li><a href='search.php'><span>Search Student By Hostel</span></a></li>
      </ul>
     </li>
    <li class='has-sub <?php echo $mess;?>'><a><span >Mess</span></a>
      <ul>
         <li><a href='mess_menu.php'><span>View</span></a></li>
         <li><a href='mess.php'><span>Edit</span></a></li>
      </ul>
   </li>
    <li class='has-sub <?php echo $Add;?>'><a><span >Add</span></a>
      <ul>
         <li><a href='add_hostel_room.php'><span>Add Hostel Room</span></a></li>
      </ul>
   </li>
   <li class=' has-sub <?php echo $reg;?>'><a><span>Register</span></a>
     <ul>
         <li><a href='reghtml.php'><span>Register Student</span></a></li>
         <li><a href='Updateform.php'><span>Update Student Details</span></a></li>
         <li><a href='reg_student.php'><span>Allot Room</span></a></li>
         <li><a href='change_room.php'><span>Change Room</span></a></li>
      </ul>    
   </li>
   <li  class='has-sub <?php echo $indact;?>'><a ><span>Indisciplinary Activity</span></a>
     <ul>
         <li><a href="view_idiscact.php" ><span>view</span></a></li>
      </ul>
    </li>
       </li>
      <li class='has-sub <?php echo $edit;?>'><a><span>Edit</span></a>
      <ul> 
     
       <li><a href="change_room_capacity.php"><span >Edit Hostel Room Capacity & Type</span></a></li>

      </ul>
    </li>
   <li><a href='../E-helpdesk/index.php'><span>E-Help Desk</span></a></li>
   <li ><a href='../logout.php'><span>Logout</span></a></li>
</ul>
</div>
<?php
	}
	?>



