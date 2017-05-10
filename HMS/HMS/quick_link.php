<?php session_start(); ?><?php
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
            <title>HMS::UPDATE QUICK LINKS</title>

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
			
			$link_name = $_POST['link_name'];
			$file_length = strlen($file_name);
			$ext = substr($file_name,$file_length-4,$file_length);
			
			$new_fname = $link_name.$ext;
			move_uploaded_file($_FILES['upload']['tmp_name'], "../../E-HelpDesk/downloads/".$new_fname);
			if($result=mysql_query("UPDATE `Quick_links` set `link_href`='".$new_fname."' where `link_name` = '".$link_name."'")){
			header('location:quick_link.php?st=1');
			}
			else
			header('location:quick_link.php?st=0');
			
			}
			?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                     <div>
							
                     <h3> UPLOAD QUICK LINKS</h3>

                   <form name="linkform" action="" method="post" enctype="multipart/form-data" style="margin-left:350px; margin-top:20px;">
                        <table border="0" >
                         <tr>
                          <td width="30%">Link</td>
                          <td width="70%">
                            <select name="link_name" id="link_name" size="1">
                            <option value="" selected="selected" disabled="disabled">SELECT</option>
							<?php
                            $quick_link_sql = "select `link_name` from `Quick_links`";
                            $quick_link_query = mysql_query($quick_link_sql);
                            while($quick_link_row = mysql_fetch_array($quick_link_query)){
                            ?>
                                <option value="<?php echo $quick_link_row['link_name'];?>" >
						         <?php echo $quick_link_row['link_name']; ?>
                                </option>
                          <?php } ?>
                    </select>
                    </td>
                    </tr>
                        <tr>
                        <td>Select file</td>
                        <td>
                        <input type="file" name="upload" id="upload" value="" />
                        </td>
                        </tr>
                        <tr><td colspan="2" align="center"><input type="submit" name="sub" id="sub" value="UPLOAD" /></td></tr>
                        </table>
                       </form>
                     </div>
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  