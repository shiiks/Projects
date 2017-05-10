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
            <title>HMS::UPLOAD</title>

    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$Post = 'active';
			include "menu.php";
           
			if(isset($_REQUEST['sub']) && $_REQUEST['sub'] != '')
			{
			$file_name = $_FILES['upload']['name'];
			$caption = $_POST['caption'];
			$hostel_id=$_POST['hostel'];
			  
			 $timezone = "Asia/Calcutta";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$datetime = date("Y-m-d"); // create date time 
			
			move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-HelpDesk/uploaded/".$_FILES['upload']['name']);
			if($result=mysql_query("INSERT INTO `uploads` (name,hostel_id,description,adminid,upload_date)
			 values('".$file_name."','".$hostel_id."','".$caption."','".$_SESSION['s_admin_username']."','".$datetime."' )")){
			header('location:upload.php?st=1');
			}
			else
			header('location:upload.php?st=0');
			
			}
			?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                     <div>
							
                     <h3> UPLOAD FILE</h3>

<div id='upform_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="upform" action="" method="post" enctype="multipart/form-data" style="margin-left:350px; margin-top:20px;">
                        <table border="0">
                        <tr>
                    <td>Hostel</td><td><select name="hostel" id="section" size="1">
                    <option value="" selected="selected" disabled="disabled">SELECT</option>
                          <?php
                        $sql = "select hostel_id from hostel";
                        $query = mysql_query($sql);
                        while($row = mysql_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['hostel_id'];?>" >
                        <?php echo $row['hostel_id']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    </td>
                    </tr>
                        <tr>
                        <td>Caption</td>
                        <td>
                        <input type="text" name="caption" id="caption" value="" />
                        </td>
                        </tr>
                        
                        <tr>
                        <td>select file</td>
                        <td>
                        <input type="file" name="upload" id="upload" value="" />
                        </td>
                        </tr>
                        <tr><td><input type="submit" name="sub" id="sub" value="UPLOAD" /></td></tr>
                        </table>
                       </form>
<script type='text/javascript'>
// <![CDATA[
var upformValidator = new Validator("upform");

upformValidator.EnableOnPageErrorDisplay();
upformValidator.SetMessageDisplayPos("right");

upformValidator.EnableMsgsTogether();
upformValidator.addValidation("hostel","dontselect=","Please select an option for Hostel");
upformValidator.addValidation("caption","req","Please fill in caption");
upformValidator.addValidation("upload","req_file","File upload is required for upload");

// ]]>
</script>

                     </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  