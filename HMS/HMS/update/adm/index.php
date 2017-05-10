
<!DOCTYPE html>
<html>
<head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="style.css" type="text/css" />

<title>Update</title>
    </head>
<body >
        <div class="page">
          
             <div class="body">
				<div id="welcome"> Upload By choose folder</div>
                    <div class="featured"> 

                    
                   <div style="margin-bottom:50px;"> 
                    <form action="#" method="post">
                    <label>View Directory :</label>
                    <input type="text" name="dir_name" id="dir_name" >
                    <input type="submit" value="submit" name="submit"/>
                    </form>
                    
                    <form name="delform" action="" method="post" enctype="multipart/form-data" style=" margin-top:20px;">
                        <table border="0">
                        <tr>
                        <td> Add Directory </td>
                        <td><input type="text" name="add_dir_name" id="add_dir_name" ></td>
                        <td><input type="submit" name="submit4" id="sub" value="Submit" /></td></tr>
                        </table>
                       </form>
                       
                    <form name="delform" action="" method="post" enctype="multipart/form-data" style=" margin-top:20px;">
                        <table border="0">
                        <tr>
                        <td> Delete Directory </td>
                        <td><input type="text" name="del_dir_name" id="del_dir_name" ></td>
                        <td><input type="submit" name="submit3" id="sub" value="Submit" /></td></tr>
                        </table>
                       </form>
                       
                       
                    <form name="upform" action="" method="post" enctype="multipart/form-data" style=" margin-top:20px;">
                        <table border="0">
                        <tr>
                        <td>Directory name:</td>
                        <td><input type="text" name="dir_name" id="dir_name" ></td>
                        </tr>
                        <tr>
                        <td>select file</td>
                        <td>
                        <input type="file" name="upload" id="upload" value="" />
                        </td>
                        </tr>
                        <tr><td><input type="submit" name="submit2" id="sub" value="UPLOAD" /></td></tr>
                        </table>
                       </form>
                        
                      
                    <br>
				 <?php
                session_start();
                error_reporting(E_ALL ^ E_NOTICE);
                if($_POST['submit']){
                    $dirname = $_POST['dir_name'];
					if(is_dir($dirname)){	
                   $dir = opendir($dirname);
                     echo '<div style="text-align:center; font-size:18px;"><label style="color:#00c">'.$dirname.'</label> &nbsp;&nbsp; Directory List</div>';	
                    while(false != ($file = readdir($dir)))
                       {
							if(($file != ".") and ($file != ".."))
							{
							echo '<div style="width:50%; float:left;padding-top:20px; background-color:#999; margin-bottom:10px;">'.$file.'</div>';
							}
                        }
					}
					else
					  echo 'folder not found';
                   }
				else if($_POST['submit2']){
                    $dirname = $_POST['dir_name'];	
			     	$file_name = $_FILES['upload']['name'];
                    move_uploaded_file($_FILES['upload']['tmp_name'], $dirname.'/'.$_FILES['upload']['name']);
                 }
				
				  else if($_POST['submit4']){
                    $dirname = $_POST['add_dir_name'];	
			     	if(is_dir($dirname))
						echo 'folder already exist';
					else
					     mkdir($dirname);	
                 }
                ?>
                </div>
                
                <div id = "upload" style="">
                 
						
                
                </div>
         </div>  
      </div>
   </div>
</body>
</html>  