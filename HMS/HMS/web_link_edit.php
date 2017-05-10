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

              <title> HMS::ADD Web Links</title>


    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$edit = 'active';
			include "menu.php";

								if(isset($_REQUEST['submit']) && $_REQUEST['submit'] != '')
								{
								$web_name = $_POST['web_link_name'];
								$web_link_url=$_POST['web_link_url'];
								$web_pos=$_POST['web_pos'];
								include('../include/db.inc.php');
							
					if($result=mysql_query("INSERT INTO `e-helpdesk_web_link` (web_link_name,web_link_url,wed_link_pos) values ('".$web_name."','".$web_link_url."','".$web_pos."')")){
								header('location:web_link_edit.php?st=1');
								}
								else
								header('location:web_link_edit.php?st=0');
								
								}
								?>
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                    <div>
                    <h3>E-HelpDesk WebLink</h3>

<div id='eventform_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form id="eventform" name="fcevent" enctype="multipart/form-data" method="post" action="" style="margin-left:250px; margin-top:10px;">
                       <table>
                        <tr>
                        <td width="33%"> Web Link Name:*</td>
                        <td width="67%"> <input type="text" name="web_link_name" id="web_name" size="54"/></td>
                        </tr> 
                          <tr>
                      <td valign="top">Web Link Url:*</td>
                      <td>  <input type="text" name="web_link_url" id="link_url" size="54"/></td>
                        </tr>  
                         <tr>
                           <tr>
                      <td valign="top">Web Link Postion:*</td>
                      <td><select name="web_pos" id="pos">
                      <option value="Select">Select</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option><option value="4">4</option><option value="5">5</option>
                      <option value="6">6</option><option value="7">7</option><option value="8">8</option>
                      <option value="9">9</option><option value="10">10</option><option value="11">11</option>
                      <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                      <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                      <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                      </select></td>
                        </tr>  
                         <tr>
							<td colspan="2" align="center">
                            <input name="submit" type="submit"  class="button" value="Submit" onClick="checkDate()"/>
                            </td>
                        </tr>       
                      </table>
                        
                        </form>
<script type='text/javascript'>
// <![CDATA[
var eventformValidator = new Validator("eventform");

eventformValidator.EnableOnPageErrorDisplay();
eventformValidator.SetMessageDisplayPos("right");

eventformValidator.EnableMsgsTogether();
eventformValidator.addValidation("web_link_name","req","Please fill in Web Link Name");
eventformValidator.addValidation("web_link_url","req","Please fill in Web Link Url");
eventformValidator.addValidation("web_pos","dontselect=Select","Please select an option for Web Position");

// ]]>
</script>



                    </div>
              </div>
            </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  