<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style.css" type="text/css" />
            <link rel="stylesheet" href="css/menu.css" type="text/css" />
			<title>HMS::NOTICE</title>
    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$Post = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured">  
               <div>
                 <div id='noticontainer'>
                        <table width="100%" >
                            <tr >
                                <td width='12%' style="font-size:20px;"><strong>NOTICE DATE</strong></td>
                                <td width='70%' align="center"><label><strong>SUBJECT</strong> </label> </td>
                            </tr>
                        </table>
                  </div>    
                  <div style="clear:both; height:8px;"></div>
                    <?php
					   $query4 = 'SELECT * FROM notice';
    					$result4=  mysql_query($query4) or die(mysql_error());
						while($row = mysql_fetch_array($result4)){
					?>
                        <div id='noticontainer'>
                        <table width="100%" >
                            <tr  onclick='window.location="complete_notice.php?nm=<?php echo $row['notice_id']; ?>"'>
                                <td width='12%'><?php echo $row['date']; ?></td>
                                <td width='70%'><label><?php echo $row['subject']; ?>  </label> </td>
                            </tr>
                        </table>
                       </div>    
                       <div style="clear:both; height:8px;"></div> 

                        <?php } ?>
                    </div>  
                        
                    </div>
              </div>
         <?php 		  include "footer.php";             ?> 
         </div> 
    </body>
</html>  