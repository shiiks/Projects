<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$view = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured">  
                       <div>
                       <?php 
					        $notice_id=(isset($_REQUEST['nm']))?trim($_REQUEST['nm']):'';
							$query4 = 'SELECT * FROM notice where notice_id="'.$notice_id.'"';
							$result4=  mysql_query($query4) or die(mysql_error());
						?>
                         <table width="80%" cellpadding="2px"  cellspacing="10" style="flex-align: center;margin-left:90px;">
               <?php
               while ($row = mysql_fetch_array($result4,MYSQL_ASSOC)){ ?>
               <tr align="center"><td  colspan="3" align="center"><h1 style="color: #000000;"><?php echo $row['dept']; ?></h1></td></tr>
               <tr align="center"><td  colspan="3"><label style="color: #000000;">NOTICE</label></td> </tr>
               <tr>
                   <td ><h4 style="color:#000000;">Ref No:KIIT/HOSTEL/<?php echo $row['notice_id'];  ?></h4></td>
                   <td></td>
                   <td align="right"><h4 style="color: #000000;"> Date:-<?php echo $row['date']; ?></h4></td>
               </tr>
               <tr>
                    <td colspan="3">
                     <table width="100%">
                     <tr>
                     <td width="12%"><strong style="font-size:20px;">Subject</strong>:</td><td width="80%" style="font-size:17px;"><?php echo $row['subject']; ?></td>
                     </tr>
                     </table>
                    </td>    
              </tr>
               <tr style="height:10px;">   </tr>
               <tr> <td align="justify" colspan="3"><?php echo $row['body']; ?></td></tr>
               <tr style="height:10px;">   </tr>
               <tr>
                   <td align="left"><h3 style="color: #000000;"><p><?php echo $row['forward_by']; ?></p></h3></td>
                   <td></td>
                   <td></td>
               </tr>
                              <tr style="height:10px;">   </tr>
               <tr style="height:10px;">  <td colspan="3" align="right"><input type="button" value="&lt;&lt;GO BACK" onClick="window.history.go(-1);"/></td> </tr>

               <?php
               }
               ?>
           </table>
              </div>

              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  