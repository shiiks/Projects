<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/db.inc.php'); 
include('warning.php');
require_once("img_upload.php");	
			$notsendmsg=0;


	if($_REQUEST['message']==1){
	$AllMember = $_SESSION['ALLMEMBER'];
	$ALLMEMBER = implode(", ",$AllMember);
	}
	
	
	// for finding all the members.....
	if($_POST['che'] == 'all')
	{
		$rdBtn = "checked='checked'";
		$sho = "y";		
	}
	
	if(count($_POST)>0 && $_REQUEST['hid']==1){
	$select_user_query = mysql_query("SELECT `email` FROM `student`");
		while($select_user_fetch = mysql_fetch_array($select_user_query)){
		    $allmember .= $select_user_fetch['email'].",";
		    $allmemberID = rtrim($allmember,",");
		}
		//echo $allmemberID;
		
	}
	
	if($_POST['che'] == 'team')
	{
		$rdBtn1 = "checked='checked'";
		$sho1 = "y";		
		//echo 'hi';
	}
	
	//fetching section names from database
	$total_team	= mysql_query("SELECT * FROM `section`");
	while($totalteam = mysql_fetch_assoc($total_team)){
	 	if($_REQUEST["team"] == $totalteam["sec_name"])
			$team_master.='<option value='.$totalteam["sec_name"].' selected >'.$totalteam["sec_name"].'</option>';
		else
			$team_master.='<option value='.$totalteam["sec_name"].'>'.$totalteam["sec_name"].'</option>';
	}	
	

	if(count($_POST)>0 && $_REQUEST['hid']==2){
	$teamName = $_POST['team'];
	if($teamName!=""){
		$select_user_query = mysql_query("SELECT `email` FROM `student` WHERE `sec_name`='".$teamName."'");
			while($select_user_fetch = mysql_fetch_array($select_user_query)){
			$member_team .= $select_user_fetch['email'].",";
			$allmemberID_team = rtrim($member_team,",");
			}	    
		}
	}
		
	if(count($_POST)>0 && $_REQUEST['hid']==3){
			$image=$_FILES['anyfile']['name'];
			//if it is not empty
			if ($image) 
			{ 	
			$filename = stripslashes($_FILES['anyfile']['name']);
			$extension = strtolower($extension);
			$temp_dir  = $_FILES['anyfile']['tmp_name'];
			$commonimagename      = strtolower(substr($filename, 0, strrpos($filename, ".")));
			$commonimagetype      = strtolower(substr($filename, strrpos($filename, ".")+1));
			$dimension = getimagesize($temp_dir);
			$width     = $dimension[0];
			$height    = $dimension[1];	
			$perm_dir="images_msg/";
			if($commonimagetype =='gif' || $commonimagetype =='jpg' || $commonimagetype =='jpeg' || $commonimagetype =='png' || $commonimagetype =='bmp' || $commonimagetype =='GIF' || $commonimagetype =='JPG' || $commonimagetype =='JPEG' || $commonimagetype =='PNG' || $commonimagetype =='BMP') {
				$newname  = "images_msg/".uploadwithoutcanvas(800, 800, $width, $height, $temp_dir, $perm_dir, $commonimagename, $filename, $commonimagetype);
			}else{			
				$image_name=$image;
				$newname="images_msg/".$image_name;
				$copied = copy($_FILES['anyfile']['tmp_name'], $newname);
			}
		}
			
		if($_POST['FCKeditor_CheckoutCompletion']!="" && $_POST['subject']!="" && ($_POST['allmember']!="" || $_POST['teammember']!="" ||$_POST['individual']!=""))
		   {
			$msgToAll = $_POST['allmember'];
			$msgToTeam = $_POST['teammember'];
			date_default_timezone_set('GMT');
			$sent_date = date("Y-m-d");
			$msgToIndividual = $_POST['individual'];
			$subject = $_POST['subject'];
				if(!empty($msgToAll)){
				$IdForSend = explode(",",$msgToAll);
				}
				if(!empty($msgToTeam)){
				$IdForSend = explode(",",$msgToTeam);
				}
				if(!empty($msgToIndividual)){
				$IdForSend = explode(",",$msgToIndividual);
				}
			foreach($IdForSend as $val){
				$emailId = $val;
				$messegeToUser = $_POST['FCKeditor_CheckoutCompletion'];
				$from = $_SESSION["email"].','.$_SESSION['UserId'];
				mysql_query("insert into `sent_message`
                        (`subject`, `text`, `sent_date`,`from`, `to`,`image`)
						 values ('".$subject."', '".$messegeToUser."', '".$sent_date."','".$_SESSION['email']."','".$emailId."','".$image."');");
				
				//mysql_query("INSERT INTO `sent_messege` set `email`='".$emailId."',`subject`='".$subject."', `messege`='".$messegeToUser."',`image`='".$image."',`admin_Id` = '".$admin_Id."',`date`='".date("Y-m-d")."'");
				}	
				$_SESSION['ALLMEMBER']=$IdForSend;
				header("location:ComposeMessage.php?message=1");
			}
		else{
			$notsendmsg=1;
		}	
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head >
<title>HOME</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="stylesheet" href="../css/3_column.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-slidedeck.pack.lite.js"></script>
</head>


<body id="top">
<?php
include_once("../wrapperRow1.php");
$profile='active';
$gallary = 'last';
include_once("../wrapperRow2.php");


?>

<div class="wrapper row4">
    <div id="container" class="clear">
       
			<?php 	
            include_once("left.php");
            ?>
        <div id="content1">
      <h1 class="title">Create Message</h1>
      
      
     <?php if ($ALLMEMBER!=""){ ?>
<fieldset style="border:2px solid #8199A9;padding:5px; width:75%; margin:0 auto; position:relative; top:20px;">
<div style="height:10px"></div>

<table width="80%" border="0" align="center">
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#8199A9" align="center">Message Has sent to the below users.</td>
  </tr>
  <tr height="15"><td></td></tr>
  <tr>  
    <td align="center">
    	<table width="100%" style="border:1px solid #FFED99; background:#aebec8 ">
          <tr>
            <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#000"><?php echo $ALLMEMBER ?></td>
          </tr>
        </table>
	</td>
  </tr>
</table>
<div style="height:20px"></div>
<div style="height:20px"><center><a href="ComposeMessage.php" style="outline:none"><img src="../images/back_btn.png" border="0"  alt="Back"/></a></center></div>
<div style="height:20px"></div>
</fieldset>

<?php }else{?>
       
<div style="height:10px; color:#FF0000; font-weight:bold; font-size:16px">
<?php if($notsendmsg == 1){ 	
?>
     <center><i>Please fill all the required fields.</i></center> 
     <?  } ?>
</div>


<form name="messege" method="POST" action="" enctype="multipart/form-data">
<table width="100%" border="0">
    <tr>
    <td colspan="3">
  <table width="100%" border="0" >
            <tr>
                <td width="391" style="color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><strong>Please Choose option if you want to send message </strong></td>
                <td width="106">To All :&nbsp;
              <input type="radio" id="che" name="che" value="all" onClick="openall();" <?php echo $rdBtn; ?> /></td>
              <td width="130">To Team :&nbsp;
              <input type="radio" id="che" name="che" value="team" onClick="openteam();" <?php echo $rdBtn1; ?>/></td>
              <td width="293">To Individual :&nbsp;
              <input type="radio" id="che" name="che" value="indi" onClick="openindividual();" /></td>
          </tr>
      </table>    </td>
  </tr>
  <tr >
  	<td colspan="3">
    <?php 
	if ($sho == '')	
      echo '  <div id="msgtoall" style="display:none">';
	else 
	   echo ' <div id="msgtoall" style="display:block">';
     ?>
            <table width="100%">
                <tr>
                    <td width="14%" align="right" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><div align="left"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>To<strong> : </strong>&nbsp;&nbsp;</div></td>
                  <td width="40%" align="left"><textarea id="allmember" name="allmember" style="background:#F0F0F6;border:1px solid #FFFFFF;color:#000000;width:350px; height:100px"><?php echo $allmemberID ?></textarea></td>
                  <td width="46%"><br /><br /><img src="../images/find_member.png" border="0" onClick="findMember();"   />
                  <input type="hidden" id="hid" name="hid" value="" /></td>
              </tr>
            </table>
      <?php echo '</div>'; 
      
   // for team id box  ///////////////////////////////////////////////////////////////
     
	if ($sho1 == '')	
      echo '  <div id="msgteam" style="display:none">';
	else 
	   echo ' <div id="msgteam" style="display:block">';
     ?>
       
           <table width="100%">
                <tr>
                    <td width="15%" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><div align="left"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>Choose Team<strong> : </strong>&nbsp;&nbsp;</div></td>
                  <td width="31%" align="left"><select id="team" name="team" onChange="findteam();" style="background:#F0F0F6;border:1px solid #FFFFFF" ><option value="">-Select Team-</option><?php echo $team_master; ?></select></td>
                  <td width="54%">&nbsp;</td>
              </tr>
                <tr>
                    <td width="15%" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><div align="left"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>To<strong> : </strong>&nbsp;&nbsp;</div></td>
                  <td width="31%" align="left"><textarea id="teammember" name="teammember" style="background:#F0F0F6;border:1px solid #FFFFFF;color:#000000;width:350px; height:100px"><?php echo $allmemberID_team?></textarea></td>
                  <td>&nbsp;</td>
                </tr>                
            </table>
    <?php echo '    </div>
        <div id="ind" style=" display:none">
	
            <table width="100%">
                <tr>
                    <td width="14%" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>To<strong> : </strong>&nbsp;&nbsp;</td>
                    <td align="left" width="50%"><input type="text" name="individual" id="individual"  size = 80 style="background:#F0F0F6;border:1px solid #FFFFFF;color:#000000;width:350px;"/></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>  ';
		?>   
      </td>
  </tr>
  <tr>
  	<td colspan="3" >
        <table width="100%">
            <tr>
                <td width="15%" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><span style="color:#FF0000; font-weight:bold; font-size:18px"></span>Upload File<strong> : </strong>&nbsp;&nbsp;</td>
              <td width="31%" align="left"><input type="file" id="anyfile" name="anyfile" style="background:#F0F0F6;border:1px solid #FFFFFF;color:#000000;width:350px;" size="50"></td>
              <td ></td>
          </tr>
        </table>    
    </td>
  </tr>  
  <tr>
  	<td colspan="3">
        <table width="100%">
            <tr>
                <td width="15%" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>Subject<strong> : </strong>&nbsp;&nbsp;</td>
              <td width="55%" align="left"><input type="text" id="subject" name="subject" style="background:#F0F0F6;border:1px solid #FFFFFF;color:#000000;width:500px; "></td>
              <td ></td>
          </tr>
        </table>    
    </td>
  </tr>
  <tr height="200">
    <td colspan="2" align="left" style=" color:#000; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold"><span style="color:#FF0000; font-weight:bold; font-size:18px">*</span>Message<strong> : </strong>&nbsp;&nbsp;</td>
    <td width="70%" align="left">
          <table width="70%" border="0">
                <tr>
                    <td>
                    <?php
					    include_once("../fckeditor/fckeditor.php");  
                        $oFCKeditor = new FCKeditor('FCKeditor_CheckoutCompletion') ;
                        $oFCKeditor->BasePath = '../fckeditor/' ;
                        $oFCKeditor->Value = '';
                        $oFCKeditor->Create() ;
                    ?>
                    </td>
                </tr>
                <tr height="15">
                	<td></td>
                </tr>
                <tr>
                	<td align="center"><a href="#1" onClick="sendmail();" style="outline:none"><img src="../images/submit_btn.png" border="0" alt="submit"/></a>
                    <!--<input type="image" src="images/submit_btn.png" border="0" onclick="sendmail();" />--></td>
                </tr>
            </table>     
    </td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>          
<div style="height:20px"></div>


<script language="javascript" type="text/javascript">
function openall(){
document.getElementById("msgtoall").style.display="block";
document.getElementById("msgteam").style.display="none";
document.getElementById("ind").style.display="none";
//document.getElementById("textare").style.display="block";
}
function openteam(){
document.getElementById("msgteam").style.display="block";
document.getElementById("msgtoall").style.display="none";
document.getElementById("ind").style.display="none";
//document.getElementById("textare").style.display="block";
}
function openindividual(){
document.getElementById("ind").style.display="block";
document.getElementById("msgteam").style.display="none";
document.getElementById("msgtoall").style.display="none";
//document.getElementById("textare").style.display="block";
}
function findMember(){

document.getElementById("hid").value=1;
document.messege.submit();
}
function findteam(){
document.getElementById("hid").value=2;
document.messege.submit();
}
function sendmail(){
document.getElementById("hid").value=3;
document.messege.submit();
}
</script>

   <? } ?>
    <div class="clear"></div>
  </div>
     
    </div>
</div>
<?php  include("../footer.php");?>
</body>
</html>

