<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
            <title>HMS:: MESS MENU</title>
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

                    <?php
             $time=(isset($_POST['time']))?trim($_POST['time']):'';
            $hostel=(isset($_POST['hostel']))?trim($_POST['hostel']):'';
            $query='select * from mess where time="'.$time.'" and hostel_id="'.$hostel.'"';

             $result4=  mysql_query($query) or die(mysql_error());
              $data1 = mysql_fetch_array($result4);
          ?>
          <h3> MESS MENU <label style="float:right"><a href="#">Download List</a></label></h3>
                       <table border="0" width="100%"  align="center" cellpadding="5" cellspacing="1" style="padding-top:10px">
                       <tr height="10"><td colspan="5"></td>  </tr>
                       <tr bgcolor="#CCF" height="30">
                          <td width="14%"><div align="center" class="style1 style2"><span class="style7"> Monday</span></div></td>
                          <td width="14%"><div align="center" class="style3 style4"><span class="style7">Tuesday</span></div></td>
                          <td width="14%"><div align="center" class="style6">Wendesday</div></td>
                          <td width="14%"><div align="center" class="style8"> Thursday </div></td>
                          <td width="14%"><div align="center" class="style8"> Friday </div></td>
                          <td width="14%"><div align="center" class="style8">Saturday</div></td>
                          <td width="14%"><div align="center" class="style8">Sunday</div></td>
                      </tr>
                  <tr>
                 <td align="center"><?php echo $data1['mon']; ?></td>
                 <td align="center"><?php echo $data1['tues']; ?></td>
                 <td align="center"><?php echo $data1['wen']; ?></td>
                 <td align="center"><?php echo $data1['thr']; ?></td>
                 <td align="center"><?php echo $data1['fri']; ?></td>
                 <td align="center"><?php echo $data1['sat']; ?></td>
                 <td align="center"><?php echo $data1['sun']; ?></td>
            </tr>
            <tr style="height:20px;"></tr>
                    <tr style="height:10px;">  <td colspan="7" align="center"><input type="button" value="&lt;&lt;GO BACK" onClick="window.history.go(-1);"/></td> </tr>

        </table>
                    
                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  