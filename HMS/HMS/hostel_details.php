<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
              <title>HMS::HOSTEL DETAILS</title>
  <style>
  .hostel_detail{
	  width:100%;
	  height:150px;
	  background:#E3E6E6;
	  margin-top:10px;
	  cursor:pointer;
  }
   .hostel_detail:hover{
	background:#CCF;
  }
  .hostel_detail #hostel_img{
	width:23%;  
	height:100%;
	margin-left:0.5%;
	float:left;
  }
    .hostel_detail #hostel_desc{
	width:33%;  
	text-align:justify;
	height:100%;
	margin-left:0.5%;
	float:left;
  } 
     .hostel_detail #hostel_rest{
	width:42%;  
	height:100%;
	margin-left:0.5%;
	margin-right:0.5%;
	float:left;

  }
  
  
  </style>
  
  <script type="text/javascript" language="javascript">
  function showdata(val){
 parent.location="update_hostel.php?id="+val+"#title";
  }
  </script>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$hostel = 'active';
			include "menu.php";
	       $get_hostel_data_sql = 'select * from `hostel` order by `hostel_id`';   
			$get_hostel_data_query = mysql_query($get_hostel_data_sql) or die(mysql_error()); 
			 $get_hostel_data_num = mysql_num_rows($get_hostel_data_query);
		//$data['type']
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <h3>HOSTEL DETAILS<span style="float:right">Total Hostel : <?php echo $get_hostel_data_num; ?></span></h3>
                    <?php while($get_hostel_rows = mysql_fetch_array($get_hostel_data_query)){?>
                     <div class="hostel_detail" onClick="showdata(<?php echo $get_hostel_rows['Sno']; ?>)">
                       <div id="hostel_img"><img src="../../e-helpdesk/images/<?php echo $get_hostel_rows['photo'];?>"  height="100%" width="100%"/></div>
                       <div id="hostel_desc">
                          <div style="text-align:center"> <strong>Description</strong><br>
                          <?php
						  	if(strlen($get_hostel_rows['description']) <= 180)
						         echo $get_hostel_rows['description'];
							else
							   echo $hostel_desc = substr($get_hostel_rows['description'],0,180).'...';
						   ?>
							 </div>
                       </div>
                       <div id="hostel_rest">
                       <table>
                           <tr>
								<td width="45%" valign="top">
                                   <strong>Hostel Id:</strong>
                                </td> 
                                <td width="3%"></td>  
                                <td width="52%">
                                	<?php echo $get_hostel_rows['hostel_id']; ?>
                                </td>                        
                           </tr>
                            <tr>
								<td width="45%" valign="top">
                                   <strong>Hostel Name:</strong>
                                </td> 
                                <td width="3%"></td>  
                                <td>
                                	<?php echo $get_hostel_rows['hostel_name']; ?>
                                </td>                        
                           </tr>
                            <tr >
								<td width="45%" valign="top">
                                   <strong>Hostel Capacity:</strong>
                                </td> 
                                <td width="3%"></td>  
                                <td>
                                	<?php echo $get_hostel_rows['hostel_capacity']; ?>
                                </td>                        
                           </tr>
                             <tr>
								<td   width="45%" valign="top">
                                   <strong>Hostel Location:</strong>
                                </td> 
                                <td width="3%"></td>  
                                <td>
                                	<?php echo $get_hostel_rows['hostel_location']; ?>
                                </td>                        
                           </tr>
                       
                       
                       
                       </table>
                       </div>
					 </div>
                     <?php } ?>
                    </div>
              </div>
            </div>
         <?php   include "footer.php"; 
		 
		 if($_REQUEST['msg'] =='4')
		   $mes = "Data Updated Sucessfully!!";
		  else
		  $mes = '';
		  
		  if($mes !=''){
		  ?>
     <script type="text/javascript">alert('<?php echo $mes ?>');</script>
<?php } ?>
         </div>  
    </body>
</html>  