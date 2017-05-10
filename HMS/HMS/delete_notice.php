<?php session_start(); ?><!DOCTYPE html>
<html>
<head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="css/style1.css" type="text/css" />
			<title>HMS::NOTICE</title>
    </head>
<body >
        <div class="page3">
            <?php 
               session_start();
			   include('../include/db.inc.php');
			   
			 
             ?>  
             <div class="body">
				
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
                            <tr  onclick='window.location="delete_notice1.php?nm=<?php echo $row['notice_id']; ?>"'>
                                <td width='12%'><?php echo $row['date']; ?></td>
                                <td width='70%'><label><?php echo $row['subject']; ?>  </label> </td>
                            </tr>
                        </table>
                       </div>    
                       <div style="clear:both; height:8px;"></div> 

                        <?php } ?>
                    </div> 
                    <?php
					  $msg = $_GET['msg'];
					  if(msg==5)
					  {
				 echo '<script language="javascript">alert("Notice is Deleted")</script>';	  
					  }
					?> 
                        
                    </div>
          </div>
   
</div> 
</body>
</html>  