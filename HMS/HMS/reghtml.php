<?php session_start();
include('../include/warning.php');
error_reporting(E_ALL ^ E_NOTICE);
 if($_REQUEST['st'] == '1')
    $mes = "Data Inserted Sucessfully.";
else if($_REQUEST['st'] == '0')
    $mes = "Unsucessfull Data Entry.Try Later!!";
else if($_REQUEST['st'] == '3')
    $mes = "Roll Number already registered";
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
            <title>HMS::REGISTER STUDENT</title>
			<script type="text/javascript" src="scripts/calendarDateInput.js"></script>
            <script type="text/javascript" src="css/jquery-1.2.6.min.js"></script>
            
            <script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
            <script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>
<script type="text/javascript">
					
                    
                    /*############# FOR AJAX FUNCTION ##################*/
                    
                    function initXMLHTTPRequest() {
                        var xmlHttp = null;
                        try {
                                // Firefox, Opera 8.0+, Safari
                            xmlHttp = new XMLHttpRequest();
                        }
                        catch (e) {
                                // Internet Explorer
                            try {
                                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                            }
                            catch (e) {
                                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                        }
                        return xmlHttp;
                    }
                    /*############# AJAX CODE END ##################*/
					function getbranch(val){
						getsem();
                        var url="ret_branchbycourse.php?id="+val;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("branch").innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
										
                    }
					function getsem(){
						var val = document.getElementById("course").value;
                        var url="ret_semester.php?id="+val;
                        var xmlHttp = initXMLHTTPRequest();
                        xmlHttp.open("GET",url, true);
                        xmlHttp.onreadystatechange = function () 
                        {
                            if (xmlHttp.readyState == 4) 
                            {
                                var xmlDoc = xmlHttp.responseText;		
                                //alert(xmlDoc);
                                document.getElementById("semester").innerHTML = xmlDoc;	
                            }
                        };
                    xmlHttp.send(null);	
										
                    }
				   
	    </script>


    </head>
   <body >
        <div class="page">
            <?php 
			include "top.php";
			$reg = 'active';
			include "menu.php";
			 
             ?>  
             <div class="body">
				<div id="welcome"> WELCOME <?php echo $data['name']; ?></div>
                    <div class="featured"> 
                     <h3>Register Student Details</h3>
                     
<form action="regprocess.php" method="post" name="student_reg" enctype="multipart/form-data" style="padding-top:10px;" >
<table width="961" border="0" align="center">
   <tr class="qbullet">
	<td class="qbullet" valign="top" width="41%"><span class="style5">Name (as in University Records)</span></td>
    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>

    <td valign="top" width="56%">
      <span class="style5">
        <input name="first_name" id="first_name" size="60" type="text">
      </span>
  </td></tr>
  <tr class="qbullet">
  	<td class="qbullet" valign="top" width="41%"><span class="style5">Father's/Mother's Name</span></td>
      <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>

      <td valign="top" width="56%">
        <span class="style5">
          <input name="pname" id="pname" size="60" type="text">
        </span>
  </td></tr>

      <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Roll </span></td>


    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>

    <td valign="top" width="56%">
      <span class="style5">
          <input name="roll" id="roll" size="10" type="text" value= "">
      </span>
    </td>
  </tr> 
  
    <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Gender </span></td>
     <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
     <td valign="top" width="56%">
      <span class="style5">
          <select name="gender" id="gender" >
          <option selected value="" disabled>Select One</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          </select>
      </span>
    </td>
  </tr> 
  
  
   <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Date of Birth</span></td>
    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top" width="56%">
      <script>DateInput('dob_dd', true, 'YYYY-MM-DD')</script>
    </td>
  </tr>

  <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Physically Handicapped</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
	 <span class="style5">
		<input name="ph" value="1" type="radio">Yes
	    <input name="ph" value="0" checked="checked" type="radio">No
     </span>
     </td>
   </tr>
   
  <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Foreign student</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
        <input name="fr" value="1" type="radio"> Yes
  	    <input name="fr" value="0" checked="checked" type="radio"> No
      </span>
    </td>
  </tr>
  <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Course of study</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
       <select name="course" size="1" id="course" onChange="getbranch(this.value)">
          <option value="" selected disabled>Select Course</option> 
		<?php
        $sql="select * from `course`";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
        echo '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';  
        }  
        ?>
        </select>
     </span></td>
  </tr>

  <tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Name of the School</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
      <select size="1" name="dept" >
          <option value="" selected disabled>Select Department</option> 
          <?php
        $sql="select * from `dept`";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
        echo '<option value="'.$row['dept_name'].'">'.$row['dept_name'].'</option>';  
        } 
        ?>
     </select>
    </span></td>
  </tr> 
  
  
  
  
  <tr class="qbullet">
	<td class="qbullet" valign="top" width="41%"><span class="style5">Name of branch</span></td>
    <td valign="top" width="3%"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top" width="56%">
      <span class="style5">
       <select name="branch" id="branch">
        <option value="" selected="selected" disabled="disabled">Select Branch</option>
       </select>
      </span>
  </td></tr>
<tr class="qbullet">
    <td class="qbullet" valign="top"><span class="style5">Section</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
      <span class="style5">
        <select name="section" id="section" size="1">
        <option value="" selected="selected" disabled="disabled">SELECT</option>
        <option value="">N/A</option>    
        <option value="1">1</option>    
        <option value="2">2</option>    
        <option value="3">3</option>    
        <option value="4">4</option>    
        <option value="5">5</option>    
        <option value="6">6</option>    
        <option value="7">7</option>    
        <option value="8">8</option>    
        </select> 
     &nbsp;  &nbsp;  &nbsp;&nbsp;Semester &nbsp;<strong>:</strong>
    <select name="semester" id="semester">
              <option selected="selected" value="1">
       1       </option>

              <option value="2">
       2       </option>
              <option value="3">
       3       </option>
              <option value="4">
       4       </option>    <option value="5">
       5       </option>    <option value="6">
       6       </option>
            
            </select>    
    </span></td>
  </tr>
  
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Expected date of completion of the course</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>

    <td valign="top">
         <script>DateInput('ex_dd', true, 'YYYY-MM-DD')</script>
</td>
  </tr>
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Date from which accommodation in the&nbsp; Hostel is required</span></td>

    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">      <script>DateInput('acc_dd', true, 'YYYY-MM-DD')</script>
</td>
  </tr>

  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Permanent Address with Pincode </span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
    <textarea autofocus rows="2" cols="40" name="per_addr" ></textarea>
    </td>
  </tr>  
  
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Contact number </span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
<input type="text" name="mob1"  />    </td>
  </tr>
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Address for Correspondence</span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
     <td valign="top">
    <textarea autofocus rows="2" cols="40" name="cor_addr" ></textarea>
     </td>
  </tr>
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Contact number </span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
<input type="text" name="mob" />    </td>
  </tr>
  
  <tr class="qbullet">
    <td class="qbullet" height="23" valign="top"><span class="style5">Upload photo </span></td>
    <td valign="top"><div class="style5" align="center"><strong>:</strong></div></td>
    <td valign="top">
                        <input type="file" name="upload" id="upload" value="" />
    </td>
  </tr> 
  <tr class="qbullet">
    <td colspan="3" height="23" valign="top">
      <div align="center">
        <input name="Submit" value="Submit" type="submit">
        </div>    </td>
    </tr>
    

</table>
<div align="center">
</div>
 </form>
<script type='text/javascript'>
// <![CDATA[
var student_regValidator = new Validator("student_reg");

student_regValidator.EnableOnPageErrorDisplay();
student_regValidator.SetMessageDisplayPos("right");

student_regValidator.EnableMsgsTogether();
student_regValidator.addValidation("first_name","req","Please fill in Name");
student_regValidator.addValidation("pname","req","Please fill in Father's/Mother's name ");
student_regValidator.addValidation("roll","req","Please fill in Roll Number");
student_regValidator.addValidation("roll","numeric"," Roll Number should be a valid numeric value");
student_regValidator.addValidation("ph","selone","Please select an option for ph");
student_regValidator.addValidation("fr","selone","Please select an option for fr");
student_regValidator.addValidation("course","dontselect=","Please select an option for course");
student_regValidator.addValidation("dept","dontselect=","Please select an option for dept");
student_regValidator.addValidation("branch","dontselect=SELECT BRANCH","Please select an option for branch");
student_regValidator.addValidation("section","dontselect=SELECT","Please select an option for section");
student_regValidator.addValidation("per_addr","req","Please fill in Permanent Address");
student_regValidator.addValidation("mob1","numeric"," Mobile Number  should be a valid numeric value");
student_regValidator.addValidation("mob1","maxlen=10","The length of the input for mobile should not exceed 10");
student_regValidator.addValidation("mob1","minlen=10","The length of the input for mobile should be at least 10.");


// ]]>

</script>

                
              </div>
              </div>
         <?php   include "footer.php";  ?>
         </div>  
    </body>
</html>  