<?php
include '../core/init.php';
require '../class.user.php';
session_start();
protect_page();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIIT INTERNATIONAL MUN | 2016</title>
    <meta name="description" content="KIITMUN IP Form"/>
    <meta name="keywords" content="kiit, kiitmun, webteam, ip, international, press, form"/>
    <meta name="author" content="KIITMUN Web Team"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/formdefault.css"/>
    <link rel="stylesheet" type="text/css" href="css/formcomponent.css"/>
    <script src="js/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
    <?php
			if (isset($_GET['success'])) {
				?>
    <!-- STYLE A SUCCESS PAGE HERE-->
    <h1 style="text-align: center;">Successfully submitted form.<br><br> Click <span style="font-style: italic;"><a
            href="../index.php">here</a></span> to go back !</h1>
    <?php
			}
			else{
			?>
    <header class="clearfix">
        <span>DELEGATE APPLICATION FORM:</span>
    </header>
    <div class="main">
        <h3 id="errorError" style="color: yellow; text-align: center;"></h3>
        <form class="cbp-mc-form" action="" method="POST">
            <div class="cbp-mc-column">
                <label for="name">Name</label>
                <h5 id="errorName" style="color: yellow;"></h5>
                <input type="text" id="name" name="username" placeholder="<?php 
	  					if (isset($_POST['username'])) {
	  						echo form_input($_POST['username']);
	  					}
	  					else{
	  						echo " Kemun";
                }
                ?>" value ="<?php
	  					if (isset($_POST['username'])) {
	  						echo form_input($_POST['username']);
	  					}
	  					?>">
                <label for="email">Email Address</label>
                <h5 id="errorEmail" style="color: yellow;"></h5>
                <input type="text" id="email" name="useremail" readonly value="<?php
	  					echo user_data($_SESSION['userSession'], 2);
	  					?>" placeholder="<?php 
	  					if (isset($_POST['useremail'])) {
	  						echo form_input($_POST['useremail']);
	  					}
	  					else{
	  						echo " Kemun@example.com";
                }
                ?>" >
                <label for="gender">Gender</label>
                <h5 id="errorGender" style="color: yellow;"></h5>
                <select id="gender" name="usergender">
                    <option disabled hidden>Choose your option</option>
                    <option style="color:#212121;" value="Female" <?php
                    if (isset($_POST['usergender']) == "Female") {
                    	echo "Selected";
                    }
                    ?>>Female</option>
                    <option style="color:#212121;" value="Male" <?php
                    if (isset($_POST['usergender']) == "Male") {
                    	echo "Selected";
                    }
                    ?>>Male</option>
                </select>
                <label for="Address">Address</label>
                <h5 id="errorAddress" style="color: yellow;"></h5>
	  					<textarea id="address" name="useraddress" placeholder="<?php 
	  					if (isset($_POST['useraddress'])) {
	  						echo form_input($_POST['useraddress']);
	  					}
	  					?>"><?php 
	  					if (isset($_POST['useraddress'])) {
	  						echo form_input($_POST['useraddress']);
	  					}
	  					?></textarea>
                <label for="institute">Institution</label>
                <h5 id="errorInstitute" style="color: yellow;"></h5>
                <input type="text" id="institute" name="userinstitute" value="<?php 
	  					if (isset($_POST['userinstitute'])) {
	  						echo form_input($_POST['userinstitute']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['userinstitute'])) {
	  						echo form_input($_POST['userinstitute']);
	  					}
	  					?>">
                <label for="year">Year/Grade</label>
                <h5 id="errorYear" style="color: yellow;"></h5>
                <input type="text" id="year" name="useryear" value="<?php 
	  					if (isset($_POST['useryear'])) {
	  						echo form_input($_POST['useryear']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['useryear'])) {
	  						echo form_input($_POST['useryear']);
	  					}
	  					else{
	  						echo " eg: second year/ tenth";
                }
                ?>">
                <label for="country">Nationality</label>
                <h5 id="errorCountry" style="color: yellow;"></h5>
                <input type="text" id="country" name="usercountry" value="<?php 
	  					if (isset($_POST['usercountry'])) {
	  						echo form_input($_POST['usercountry']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['usercountry'])) {
	  						echo form_input($_POST['usercountry']);
	  					}
	  					?>">
                <label for="accomodation">Accommodation Required</label>
                <h5 id="errorAccomodation" style="color: yellow;"></h5>
                <select id="accomodation" name="useraccomodation">
                    <option disabled hidden>Choose your option</option>
                    <option style="color:#212121;" value="Yes" <?php
                    if (isset($_POST['useraccomodation']) == "Yes") {
                    	echo "Selected";
                    }
                    ?>>Yes</option>
                    <option style="color:#212121;" value="No" <?php
                    if (isset($_POST['useraccomodation']) == "No") {
                    	echo "Selected";
                    }
                    ?>>No</option>
                </select>
                <label for="munexp">MUN Experience(s)</label>
                <h5 id="errorMunexp" style="color: yellow;"></h5>
	  					<textarea id="munexp" name="usermunexp" placeholder="<?php 
	  					if (isset($_POST['usermunexp'])) {
	  						echo form_input($_POST['usermunexp']);
	  					}
	  					else{
	  						echo " If none, write ‘NONE’";
                }
                ?>"><?php 
	  					if (isset($_POST['usermunexp'])) {
	  						echo form_input($_POST['usermunexp']);
	  					}
	  					?></textarea>
            </div>
            <div class="cbp-mc-column">
                <label for="doubledel">Applying in double delegation?</label>
                <h5 id="errorDoubledel" style="color: yellow;"></h5>
                <select id="doubledel" name="userdoubledel" onchange="postCheck()">
                    <option disabled selected hidden>Choose your option</option>
                    <option style="color:#212121;" id="no" value="No">No</option>
                    <option style="color:#212121;" id="yes" value="Yes">Yes</option>
                </select>
                <div id="yesdiv" style="display: none;">
                    <p>Delegate 2 details:</p>
                    <label for="name">Name</label>
                    <h5 id="errorName1" style="color: yellow;"></h5>
                    <input type="text" id="name" name="name" value="<?php 
	  					if (isset($_POST['name'])) {
	  						echo form_input($_POST['name']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['name'])) {
	  						echo form_input($_POST['name']);
	  					}
	  					else{
	  						echo " Gusto";
                    }
                    ?>" >
                    <label for="email">Email Address</label>
                    <h5 id="errorEmail1" style="color: yellow;"></h5>
                    <input type="text" id="email" name="email" value="<?php 
	  					if (isset($_POST['email'])) {
	  						echo form_input($_POST['email']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['email'])) {
	  						echo form_input($_POST['email']);
	  					}
	  					else{
	  						echo " Gusto@example.com";
                    }
                    ?>" >
                    <label for="gender">Gender</label>
                    <h5 id="errorGender1" style="color: yellow;"></h5>
                    <select id="gender" name="gender">
                        <option disabled hidden>Choose your option</option>
                        <option style="color:#212121;" value="Female"<?php
                    if (isset($_POST['gender']) == "Female") {
                    	echo "Selected";
                    }
                    ?>>Female</option>
                        <option style="color:#212121;" value="Male"<?php
                    if (isset($_POST['gender']) == "Male") {
                    	echo "Selected";
                    }
                    ?>>Male</option>
                    </select>
                    <label for="Address">Address</label>
                    <h5 id="errorAddress1" style="color: yellow;"></h5>
	  					<textarea id="address" name="address" placeholder="<?php 
	  					if (isset($_POST['address'])) {
	  						echo form_input($_POST['address']);
	  					}
	  					?>"><?php 
	  					if (isset($_POST['address'])) {
	  						echo form_input($_POST['address']);
	  					}
	  					?></textarea>
                    <label for="institute">Institution</label>
                    <h5 id="errorInstitute1" style="color: yellow;"></h5>
                    <input type="text" id="institute" name="institute" value="<?php 
	  					if (isset($_POST['institute'])) {
	  						echo form_input($_POST['institute']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['institute'])) {
	  						echo form_input($_POST['institute']);
	  					}
	  					?>">
                    <label for="year">Year/Grade</label>
                    <h5 id="errorYear1" style="color: yellow;"></h5>
                    <input type="text" id="year" name="year" value="<?php 
	  					if (isset($_POST['year'])) {
	  						echo form_input($_POST['year']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['year'])) {
	  						echo form_input($_POST['year']);
	  					}
	  					else{
	  						echo " second year/ tenth";
                    }
                    ?>">
                    <label for="country">Nationality</label>
                    <h5 id="errorCountry1" style="color: yellow;"></h5>
                    <input type="text" id="country" name="country" value="<?php 
	  					if (isset($_POST['country'])) {
	  						echo form_input($_POST['country']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['country'])) {
	  						echo form_input($_POST['country']);
	  					}
	  					?>">
                    <label for="accomodation">Accommodation Required</label>
                    <h5 id="errorAccomodation1" style="color: yellow;"></h5>
                    <select id="accomodation" name="accomodation">
                        <option disabled hidden>Choose your option</option>
                        <option style="color:#212121;" value="Yes" <?php
                    if (isset($_POST['accomodation']) == "Yes") {
                    	echo "Selected";
                    }
                    ?>>Yes</option>
                        <option style="color:#212121;" value="No" <?php
                    if (isset($_POST['accomodation']) == "No") {
                    	echo "Selected";
                    }
                    ?>>No</option>
                    </select>
                    <label for="munexp">MUN Experience(s)</label>
                    <h5 id="errorMunexp1" style="color: yellow;"></h5>
	  					<textarea id="munexp" name="munexp" placeholder="<?php 
	  					if (isset($_POST['munexp'])) {
	  						echo form_input($_POST['munexp']);
	  					}
	  					else{
	  						echo " If none, write ‘NONE’";
                    }
                    ?>" ><?php 
	  					if (isset($_POST['munexp'])) {
	  						echo form_input($_POST['munexp']);
	  					}
	  					?></textarea>
                </div>
                <label for="whymun"> Why do you want to participate in KIITMUN ?</label>
                <h5 id="errorWhymun" style="color: yellow;"></h5>
	  					<textarea id="whymun" name="whymun" placeholder="<?php 
	  					if (isset($_POST['whymun'])) {
	  						echo form_input($_POST['whymun']);
	  					}
	  					else{
	  						echo " Maximum 300 words";
                }
                ?>"><?php 
	  					if (isset($_POST['whymun'])) {
	  						echo form_input($_POST['whymun']);
	  					}
	  					?></textarea>
            </div>
            <div class="cbp-mc-column">
                <label for="committee1">Committee preference 1</label>
                <h5 id="errorcommittee1" style="color: yellow;"></h5>
                <select id='gender' name='committee1'>
                <?php
                if (isset($_POST['committee1'])) {
                	show_committee_names($_POST['committee1']);
                }
                else{
                    show_committee_names("");
                   }
                ?>
                </select>
                <label for="committee1country1">Country preference 1</label>
                <h5 id="errorcommittee1country1" style="color: yellow;"></h5>
                <input type="text" id="committee1country1" value="<?php 
	  					if (isset($_POST['committee1country1'])) {
	  						echo form_input($_POST['committee1country1']);
	  					}
	  					?>" name="committee1country1" placeholder="<?php 
	  					if (isset($_POST['committee1country1'])) {
	  						echo form_input($_POST['committee1country1']);
	  					}
	  					?>">
                <label for="committee1country2">Country preference 2</label>
                <h5 id="errorcommittee1country2" style="color: yellow;"></h5>
                <input type="text" id="committee1country2" name="committee1country2" value="<?php 
	  					if (isset($_POST['committee1country2'])) {
	  						echo form_input($_POST['committee1country2']);
	  					}
	  					?>" placeholder="<?php 
	  					if (isset($_POST['committee1country2'])) {
	  						echo form_input($_POST['committee1country2']);
	  					}
	  					?>">
                <br/><br/><br/>
                <label for="committee2">Committee preference 2</label>
                <h5 id="errorcommittee2" style="color: yellow;"></h5>
                <select id='gender' name='committee2'>
                <?php
                if (isset($_POST['committee2'])) {
                	show_committee_names($_POST['committee2']);
                }
                else{
                    show_committee_names("");
                   }
                ?>
                </select>
                <label for="committee2country1">Country preference 1</label>
                <h5 id="errorcommittee2country1" style="color: yellow;"></h5>
                <input type="text" id="committee2country1" value="<?php 
	  					if (isset($_POST['committee2country1'])) {
	  						echo form_input($_POST['committee2country1']);
	  					}
	  					?>" name="committee2country1" placeholder="<?php 
	  					if (isset($_POST['committee2country1'])) {
	  						echo form_input($_POST['committee2country1']);
	  					}
	  					?>">
                <label for="committee2country2">Country preference 2</label>
                <h5 id="errorcommittee2country2" style="color: yellow;"></h5>
                <input type="text" id="committee2country2" value="<?php 
	  					if (isset($_POST['committee2country2'])) {
	  						echo form_input($_POST['committee2country2']);
	  					}
	  					?>" name="committee2country2" placeholder="<?php 
	  					if (isset($_POST['committee2country2'])) {
	  						echo form_input($_POST['committee2country2']);
	  					}
	  					?>">
                <br/>
                <br/>
                <br/>
                <label for="committee3">Committee preference 3</label>
                <h5 id="errorcommittee3" style="color: yellow;"></h5>
                <select id='gender' name='committee3'>
                <?php
                if (isset($_POST['committee3'])) {
                	show_committee_names($_POST['committee3']);
                }
                else{
                    show_committee_names("");
                   }
                ?>
                </select>
                <label for="committee3country1">Country preference 1</label>
                <h5 id="errorcommittee3country1" style="color: yellow;"></h5>
                <input type="text" id="committee3country1" value="<?php 
	  					if (isset($_POST['committee3country1'])) {
	  						echo form_input($_POST['committee3country1']);
	  					}
	  					?>" name="committee3country1" placeholder="<?php 
	  					if (isset($_POST['committee3country1'])) {
	  						echo form_input($_POST['committee3country1']);
	  					}
	  					?>">
                <label for="committee3country2">Country preference 2</label>
                <h5 id="errorcommittee3country2" style="color: yellow;"></h5>
                <input type="text" id="committee3country2" value="<?php 
	  					if (isset($_POST['committee3country2'])) {
	  						echo form_input($_POST['committee3country2']);
	  					}
	  					?>" name="committee3country2" placeholder="<?php 
	  					if (isset($_POST['committee3country2'])) {
	  						echo form_input($_POST['committee3country2']);
	  					}
	  					?>">
            </div>
            <div class="cbp-mc-submit-wrap"><input name="submit" class="cbp-mc-submit" type="submit" value="Apply"/>
            </div>
        </form>
    </div>
    <?php
			}
			?>

</div>

<script type="text/javascript">
    function postCheck() {
        if (document.getElementById("yes").selected) {
            document.getElementById("yesdiv").style.display = "block";
        }
        else if (document.getElementById("no").selected) {
            document.getElementById("yesdiv").style.display = "none";
        }
    }
</script>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$errors = 0;
	$arr[] = array();
	if (isset($_POST['username']) && !empty($_POST['username'])) {
			$name = $_POST['username'];
			$name = form_input($name);
			if (validate_name($name)) {
				array_push($arr, $name);
				$array[0] = $name;
			}else{
				echo "<script type='text/javascript'>document.getElementById('errorName').innerHTML='* Only letters and white space allowed';</script>";
$errors++;
}

}
else
{
    echo
    "<script type='text/javascript'>document.getElementById('errorName').innerHTML='* Please fill in your name';</script>";
$errors++;
}
if (isset($_POST['useremail']) && !empty($_POST['useremail'])) {
$useremail = $_POST['useremail'];
$useremail = form_input($useremail);

if (validate_email($useremail)) {

if (validate_email_ip_cross($useremail)) {
array_push($arr, $useremail);
$array[1] = $useremail;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail').innerHTML = '* Email is already registered !';</script>";
$errors++;
}

}

else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail').innerHTML = '* Invalid email format';</script>";
$errors++;
}

}
else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail').innerHTML = '* Please fill in your email';</script>";
$errors++;
}
if (isset($_POST['usergender']) && !empty($_POST['usergender'])) {
$usergender = $_POST['usergender'];
$usergender = form_input($usergender);
array_push($arr, $usergender);
$array[2] = $usergender;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorGender').innerHTML = '* Please select your gender';</script>";
$errors++;
}
if (isset($_POST['useraddress']) && !empty($_POST['useraddress'])) {
$useraddress = $_POST['useraddress'];
$useraddress = form_input($useraddress);
array_push($arr, $useraddress);
$array[3] = $useraddress;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorAddress').innerHTML = '* Please type your address';</script>";
$errors++;
}
if (isset($_POST['userinstitute']) && !empty($_POST['userinstitute'])) {
$userinstitute = $_POST['userinstitute'];
$userinstitute = form_input($userinstitute);
if (validate_name($userinstitute)) {
array_push($arr, $userinstitute);
$array[4] = $userinstitute;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorInstitute').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}

}
else{
echo "
<script type='text/javascript'>document.getElementById('errorInstitute').innerHTML = '* Please type in your institute name';</script>";
$errors++;
}
if (isset($_POST['useryear']) && !empty($_POST['useryear'])) {
$useryear = $_POST['useryear'];
$useryear = form_input($useryear);

if (validate_name($useryear)) {
array_push($arr, $useryear);
$array[5] = $useryear;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorYear').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorYear').innerHTML = '* Please type in your year';</script>";
$errors++;
}
if (isset($_POST['usercountry']) && !empty($_POST['usercountry'])) {
$usercountry = $_POST['usercountry'];
$usercountry = form_input($usercountry);
if (validate_name($usercountry)) {
array_push($arr, $usercountry);
$array[6] = $usercountry;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorCountry').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorCountry').innerHTML = '* Please type in your country';</script>";
$errors++;
}
if (isset($_POST['useraccomodation']) && !empty($_POST['useraccomodation'])) {
$useraccomodation = $_POST['useraccomodation'];
$useraccomodation = form_input($useraccomodation);
array_push($arr, $useraccomodation);
$array[7] = $useraccomodation;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorAccomodation').innerHTML = '* Please select your accomodation requirement';</script>";
$errors++;
}
if (isset($_POST['usermunexp']) && !empty($_POST['usermunexp'])) {
$usermunexp = $_POST['usermunexp'];
$usermunexp = form_input($usermunexp);
array_push($arr, $usermunexp);
$array[8] = $usermunexp;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorMunexp').innerHTML = '* Please write your MUN experiences';</script>";
$errors++;
}
if (isset($_POST['userdoubledel']) && !empty($_POST['userdoubledel'])) {
$userdoubledel = $_POST['userdoubledel'];
$userdoubledel = form_input($userdoubledel);
$array[9] = $userdoubledel;
if ($userdoubledel == "Yes") {
if (isset($_POST['name']) && !empty($_POST['name'])) {
$name1 = $_POST['name'];
$name1 = form_input($name1);
if (validate_name($name1)) {
array_push($arr, $name1);
$array[9+1] = $name1;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorName1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorName1').innerHTML = '* Please write your partner\'s name';</script>";
$errors++;
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
$email = $_POST['email'];
$email = form_input($email);
if (validate_email($email)) {

if (validate_email_ip_cross($email)) {
array_push($arr, $email);
$array[10+1] = $email;
}
else{

echo "
<script type='text/javascript'>document.getElementById('errorEmail').innerHTML = '* Email is already registered !';</script>";
$errors++;
}
}else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail1').innerHTML = '* Invalid email format';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail1').innerHTML = '* Please write your partner\'s email';</script>";
$errors++;
}
if (isset($_POST['gender']) && !empty($_POST['gender'])) {
$gender = $_POST['gender'];
$gender = form_input($gender);
if (validate_name($gender)) {
array_push($arr, $gender);
$array[11+1] = $gender;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorGender1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorGender1').innerHTML = '* Please write your partner\'s gender';</script>";
$errors++;
}
if (isset($_POST['address']) && !empty($_POST['address'])) {
$address = $_POST['address'];
$address = form_input($address);
array_push($arr, $address);
$array[12+1] = $address;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorAddress1').innerHTML = '* Please write your partner\'s address';</script>";
$errors++;
}
if (isset($_POST['institute']) && !empty($_POST['institute'])) {
$institute = $_POST['institute'];
$institute = form_input($institute);
if (validate_name($institute)) {
array_push($arr, $institute);
$array[13+1] = $institute;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorInstitute1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorInstitute1').innerHTML = '* Please type in your partner\'s institute';</script>";
$errors++;
}
if (isset($_POST['year']) && !empty($_POST['year'])) {
$year = $_POST['year'];
$year = form_input($year);
if (validate_name($year)) {
array_push($arr, $year);
$array[14+1] = $year;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorYear1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorYear1').innerHTML = '* Please type in your partner\'s year of study';</script>";
$errors++;
}
if (isset($_POST['country']) && !empty($_POST['country'])) {
$country = $_POST['country'];
$country = form_input($country);
if (validate_name($country)) {
array_push($arr, $country);
$array[15+1] = $country;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorCountry1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorCountry1').innerHTML = '* Please type in your partner\'s country';</script>";
$errors++;
}
if (isset($_POST['accomodation']) && !empty($_POST['accomodation'])) {
$accomodation = $_POST['accomodation'];
$accomodation = form_input($accomodation);
array_push($arr, $accomodation);
$array[16+1] = $accomodation;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorAccomodation1').innerHTML = '* Please select your partner\'s accomodation requirement';</script>";
$errors++;
}
if (isset($_POST['munexp']) && !empty($_POST['munexp'])) {
$munexp = $_POST['munexp'];
$munexp = form_input($munexp);
array_push($arr, $munexp);
$array[17+1] = $munexp;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorMunexp1').innerHTML = '* Please write your partner\'s MUN experience';</script>";
$errors++;
}
}
else{
for($i=9; $i<=18; $i++){
$array[$i] = "-";
}
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorDoubledel').innerHTML = '* Please select one option';</script>";
$errors++;
}
if (isset($_POST['whymun']) && !empty($_POST['whymun'])) {
$whymun = $_POST['whymun'];
$whymun = form_input($whymun);
array_push($arr, $whymun);
$array[18+1] = $whymun;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorWhymun').innerHTML = '* Please write your answer';</script>";
$errors++;
}
if (isset($_POST['committee1']) && !empty($_POST['committee1'])) {
$committee1 = $_POST['committee1'];
$committee1 = form_input($committee1);
if (validate_name($committee1)) {
array_push($arr, $committee1);
$array[19+1] = $committee1;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1').innerHTML = '* Please select a committee';</script>";
$errors++;
}
if (isset($_POST['committee1country1']) && !empty($_POST['committee1country1'])) {
$committee1country1 = $_POST['committee1country1'];
$committee1country1 = form_input($committee1country1);
if (validate_name($committee1country1)) {
array_push($arr, $committee1country1);
$array[20+1] = $committee1country1;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1country1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1country1').innerHTML = '* Please select a country';</script>";
$errors++;
}
if (isset($_POST['committee1country2']) && !empty($_POST['committee1country2'])) {
$committee1country2 = $_POST['committee1country2'];
$committee1country2 = form_input($committee1country2);
if (validate_name($committee1country2)) {
array_push($arr, $committee1country2);
$array[21+1] = $committee1country2;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1country2').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee1country2').innerHTML = '* Please select a country';</script>";
$errors++;
}
if (isset($_POST['committee2']) && !empty($_POST['committee2'])) {
$committee2 = $_POST['committee2'];
$committee2 = form_input($committee2);
if (validate_name($committee2)) {
array_push($arr, $committee2);
$array[22+1] = $committee2;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2').innerHTML = '* Please select a committee';</script>";
$errors++;
}
if (isset($_POST['committee2country1']) && !empty($_POST['committee2country1'])) {
$committee2country1 = $_POST['committee2country1'];
$committee2country1 = form_input($committee2country1);
if (validate_name($committee2country1)) {
array_push($arr, $committee2country1);
$array[23+1] = $committee2country1;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2country1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2country1').innerHTML = '* Please select a country';</script>";
$errors++;
}
if (isset($_POST['committee2country2']) && !empty($_POST['committee2country2'])) {
$committee2country2 = $_POST['committee2country2'];
$committee2country2 = form_input($committee2country2);
if (validate_name($committee2country2)) {
array_push($arr, $committee2country2);
$array[24+1] = $committee2country2;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2country2').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee2country2').innerHTML = '* Please select a country';</script>";
$errors++;
}
if (isset($_POST['committee3']) && !empty($_POST['committee3'])) {
$committee3 = $_POST['committee3'];
$committee3 = form_input($committee3);
if (validate_name($committee3)) {
array_push($arr, $committee3);
$array[25+1] = $committee3;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3').innerHTML = '* Please select a committee';</script>";
$errors++;
}
if (isset($_POST['committee3country1']) && !empty($_POST['committee3country1'])) {
$committee3country1 = $_POST['committee3country1'];
$committee3country1 = form_input($committee3country1);
if (validate_name($committee3country1)) {
array_push($arr, $committee3country1);
$array[26+1] = $committee3country1;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3country1').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3country1').innerHTML = '* Please select a country';</script>";
$errors++;
}
if (isset($_POST['committee3country2']) && !empty($_POST['committee3country2'])) {
$committee3country2 = $_POST['committee3country2'];
$committee3country2 = form_input($committee3country2);
if (validate_name($committee3country2)) {
array_push($arr, $committee3country2);
$array[27+1] = $committee3country2;
}else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3country2').innerHTML = '* Only letters and white space allowed';</script>";
$errors++;
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommittee3country2').innerHTML = '* Please select a country';</script>";
$errors++;
}
if ($errors == 0) {
add_to_db($array);
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorError').innerHTML = '* Error ! This form contain(s) error(s) :';</script>";
}
}
?>