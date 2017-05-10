<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
 if($_REQUEST['st'] == '1')
    $mes = "Data Inserted Sucessfully.";
else if($_REQUEST['st'] == '0')
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
            <script type="text/javascript" src="scripts/calendarDateInput.js"></script>

              <title> HMS::ADD FORTHCOMING EVENTS</title>


    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$Post = 'active';
			include "menu.php";

		if(isset($_REQUEST['submit']) && $_REQUEST['submit'] != '')
		{
		$event_title = $_POST['event_title'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$details=$_POST['details'];
	
	if($result=mysql_query("INSERT INTO `forthcoming_event` (title,st_date,end_date 	,description) values ('".$event_title."','".$startdate."','".$enddate."','".$details."')")){
		header('location:forthcoming.php?st=1');
		}
		else
		header('location:forthcoming.php?st=0');
		
		}
		?>
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <h3>FORTHCOMING EVENTS</h3>
                        <form id="eventform" name="fcevent" enctype="multipart/form-data" method="post" action="" style="margin-left:250px; margin-top:10px;">
                       <table>
                        <tr>
                        <td width="33%"> Event Name:*</td>
                        <td width="67%"> <input type="text" name="event_title" id="event_title" size="54"/></td>
                        </tr> 
                        <tr>
                        <td> Start Date:*</td>
                        <td> <script>DateInput('startdate', true, 'YYYY-MM-DD')</script></td>
                        </tr> 
                         <tr>
                        <td> End Date:*</td>
                        <td>  <script>DateInput('enddate', true, 'YYYY-MM-DD')</script></td>
                        </tr>
                          <tr>
                        <td valign="top">Event Details:*</td>
                        <td>  <textarea id="details" name="details" rows="8" cols="40" id="details" ></textarea></td>
                        </tr>  
                         <tr>
							<td colspan="2" align="center">
                            <input name="submit" type="submit"  class="button" value="Submit" onClick="checkDate()"/>
                            </td>
                        </tr>       
                      </table>
                        
                        </form>

                    </div>
              </div>
            </div>
         <?php   include "footer.php";  ?><script>function checkDate(){
	var stdate = document.fcevent.startdate.value;
	var enddate = document.fcevent.enddate.value;
	if(enddate>=stdate)
	   return true;
	 else
		alert('Enter Valid number of Days. End date must be greater or Equal than Start Date!!');
	
}</script>
         </div>  
    </body>
</html>  