<?php session_start(); ?><?php
error_reporting(E_ALL ^ E_NOTICE);
if($_REQUEST['st'] == '1')
    $mes = "Updated Sucessfully";
else if($_REQUEST['st'] == '2')
    $mes = "SORRY, TRY AGAIN!!";
else if($_REQUEST['st'] == '3')
    $mes = "No such roll exists!!";
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
            <title> HMS::DELETE STUDENT</title>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$indact = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                  <?php     if(isset($_POST['Submit']))
                             {
							$roll = (isset($_POST['roll'])) ? $_POST['roll'] : '';
							$query= "select * from indisciplinary_activity where roll='".$roll."' and bit='0'";
						    $result4=  mysql_query($query) or die(mysql_error());
							$count= mysql_num_rows($result4);
							if($count>0)
							 {
							?>
			        <table width="80%"  style="margin-left:60px" border="1" rules="all">
                     <tr>
                      <th>Name</th>
                      <th>Roll</th>
                      <th>Hostel</th>
                      <th>Branch</th>
                      <th>Cause</th>
                      <th>Amount</th>
                      <th>Duration</th>
                      <th>Status</th>
                      <th>Click to Update</th>
                     </tr>
               <?php
              while ($row = mysql_fetch_array($result4,MYSQL_ASSOC))
               {
				    if($row['bit']==0)
				       $status = 'Unsloved';
					  else
					    $status='Sloved';
                 ?>  
               <tr>
                   <td style="text-transform:capitalize" align="center"><?php echo $row['name']; ?></td>
                   <td align="center"><?php echo $row['roll']; ?></td>
                   <td align="center"><?php echo $row['hostel']; ?></td>
                   <td align="center"><?php echo $row['branch']; ?></td>
                   <td align="center"><?php echo $row['cause']; ?></td>
                   <td align="center"><?php echo $row['amount']; ?></td>
                   <td align="center"><?php echo $row['duration']; ?></td>
                   <td align="center"><?php echo $status; ?></td>
                   <td align="center"><a onClick="change_status('<?php echo $roll;?>')">Click Here</a></td>


               </tr>
               <?php
			   }
               
               ?>
               
               
           </table>
           <?php
				}
				else
				  {
					?>
                    No Unslove Indiciplaine Activity for this roll number
                    <?php  
				  }
					         }
					  
			        ?>
                    
              </div>
              </div>
              <script type="text/javascript">
 function change_status(val)
 {
	 //alert(val);
	 //return false;
	if(window.confirm("Are you Sure to change the status??")){
      parent.location="update_idiscact_process.php?&msgID="+val;
      }
 }
</script>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  