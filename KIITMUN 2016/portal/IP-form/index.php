<?php
include '../core/init.php';
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

    <style type="text/css">
        #largeImgPanel {
            text-align: center;
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
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
        <span>Note from Head of Press:</span>
        <p><strong>Dear Prospective Applicants,</strong></p>

        <p>The press of KIIT International MUN shall be called the KIITMUN Observer Team and is divided into two

            news agencies, namely, Reuters &amp; Al-Jazeera. The applications are open for two roles- that of a

            Journalist/Photo-Journalist. The team shall take out daily newsletters and maintain a blog apart from

            managing social channels of the event.</p>

        <p>A total of 46 slots are open for journalists, one each from Reuters and Al-Jazeera in each of the twenty

            three delegate committees of the MUN. The journalists shall be covering committee proceedings as per

            his news agency’s brief for the daily newsletter and also be responsible for blog updates on the press

            website. The extensive guide shall be sent to selected journalists only and prior workshops taken in the

            lead up to the MUN.</p>

        <p>A total of 23 slots are open for photo-journalists. They shall be tasked with maintaining the Facebook,

            Twitter, g+ and Instagram profiles of the MUN with hourly updates of the committee they are allotted

            through well captioned and related photos/360 degree photos/short videos. They shall also be judged

            on other assignments that shall be explained in the workshop on Day 1 of the event.</p>

        <p>DSLRs are strictly not allowed in the case of photo-journalists. I advise you use a smart-phone with a

            medium degree of photo-clarity.</p>

        <p>Happy applying and I hope to meet you in case you make it through to the KIIT MUN Observer Team.</p>

        <address>Regards<br/>

            NABADIP DEB<br/>

            <a href="mailto:nabadipdeb@yahoo.com?Subject=KIITMUN%20IP%20query" target="_top">nabadipdeb@yahoo.com</a>
        </address>
    </header>
    <div class="main">
        <h3 id="errorError" style="color: yellow; text-align: center;"></h3>
        <form class="cbp-mc-form" action="" method="POST">
            <div class="cbp-mc-column">
                <label for="name">Name</label>
                <h5 id="errorName" style="color: yellow;"></h5>
                <input type="text" id="name" name="username" placeholder="Kemun" value="<?php
                        if (isset($_POST['username'])) {
                            echo form_input($_POST['username']);
                        }
                        ?>">
                <label for="email">Email Address</label>
                <h5 id="errorEmail" style="color: yellow;"></h5>
                <input type="text" id="email" name="useremail" placeholder="Kemun@example.com" value="<?php
                        echo user_data($_SESSION['userSession'], 2);
                        ?>">
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
	  					<textarea id="address" name="useraddress"><?php 
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
	  					?>">
                <label for="year">Year/Grade</label>
                <h5 id="errorYear" style="color: yellow;"></h5>
                <input type="text" id="year" name="useryear" value="<?php 
	  					if (isset($_POST['useryear'])) {
	  						echo form_input($_POST['useryear']);
	  					}
	  					?>" placeholder="second / tenth">
            </div>
            <div class="cbp-mc-column">
                <label for="country">Nationality</label>
                <h5 id="errorCountry" style="color: yellow;"></h5>
                <input type="text" id="country" name="usercountry" value="<?php 
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
                <label for="pressteam">MUN Experience(s) as member of the Press Team</label>
                <h5 id="errorpressteam" style="color: yellow;"></h5>
	  					<textarea id="pressteam" name="pressteam"><?php 
	  					if (isset($_POST['pressteam'])) {
	  						echo form_input($_POST['pressteam']);
	  					} ?></textarea>
                <label for="exp">Other Journalism related experiences</label>
                <h5 id="errorMunexp" style="color: yellow;"></h5>
	  					<textarea id="exp" name="usermunexp" placeholder="If none, write ‘NONE’"><?php 
	  					if (isset($_POST['usermunexp'])) {
	  						echo form_input($_POST['usermunexp']);
	  					} ?></textarea>
            </div>
            <div class="cbp-mc-column">
                <label>Post Applying For</label>
                <h5 id="errorpostOpt" style="color: yellow;"></h5>
                <select id="post" name="postOpt" onchange="postCheck()">
                    <option disabled selected hidden>Select One</option>
                    <option id="journalist" style="color:#212121;" value="Journalist">Journalist</option>
                    <option id="photojournalist" style="color:#212121;" value="Photo-Journalist">Photo-Journalist
                    </option>
                </select>
                <div id="journalistdiv" style="display: none;">
                    <label for="comments">Which would be your news agency preference? In either case, write about

                        why you choose the same over the other.</label>
                    <h5 id="errorcomments" style="color: yellow;"></h5>
	  					<textarea id="comments" name="comments" placeholder="Minimum 100 Words"><?php 
	  					if (isset($_POST['comments'])) {
	  						echo form_input($_POST['comments']);
	  					} ?></textarea>
                </div>

                <div id="photojournalistdiv" style="display: none;">
                    <label for="comments">Write a caption for the following

                        photo :</label>
                    <a href="#popup" onclick="showImage(this.src, 'img/ip.jpg');">(Click to expand)<img src="img/ip.jpg"
                                                                                                        width="380px"
                                                                                                        height="220px"></a>
                    <div id="largeImgPanel" onclick="this.style.display='none'">
                        <img id="largeImg"
                             style=" position: fixed; top: 0; bottom: 0; left: 0; right: 0; max-width: 100%; max-height: 100%; margin: auto; overflow: auto;"/>
                    </div>
                    <h5 id="errorcommentsPic" style="color: yellow;"></h5>
	  					<textarea id="comments" name="commentsPic" placeholder="Maximum 50 Words"><?php 
	  					if (isset($_POST['commentsPic'])) {
	  						echo form_input($_POST['commentsPic']);
	  					} ?></textarea>
                </div>
            </div>
            <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="submit" type="submit" value="Apply"/>
            </div>
        </form>
    </div>
    <?php
		}
		?>
</div>

<script type="text/javascript">
    function postCheck() {
        if (document.getElementById("journalist").selected) {
            document.getElementById("journalistdiv").style.display = "block";
            document.getElementById("photojournalistdiv").style.display = "none";
        }
        else if (document.getElementById("photojournalist").selected) {
            document.getElementById("photojournalistdiv").style.display = "block";
            document.getElementById("journalistdiv").style.display = "none";
        }
    }
    function showImage(smSrc, lgSrc) {
        document.getElementById('largeImg').src = smSrc;
        showLargeImagePanel();
        unselectAll();
        setTimeout(function () {
            document.getElementById('largeImg').src = lgSrc;
        }, 1)
    }
    function showLargeImagePanel() {
        document.getElementById('largeImgPanel').style.display = 'block';
    }
    function unselectAll() {
        if (document.selection)
            document.selection.empty();
        if (window.getSelection)
            window.getSelection().removeAllRanges();
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
if (validate_email_ip($useremail)) {
array_push($arr, $useremail);
$array[1] = $useremail;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorEmail').innerHTML = '* Email is already registered !';</script>";
$errors++;
}
}else{
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
$array[9] = $usermunexp;

}
else{
echo "
<script type='text/javascript'>document.getElementById('errorMunexp').innerHTML = '* Please write your Journalism experiences';</script>";
$errors++;
}
if (isset($_POST['pressteam']) && !empty($_POST['pressteam'])) {
$pressteam = $_POST['pressteam'];
$pressteam = form_input($pressteam);
array_push($arr, $pressteam);
$array[8] = $pressteam;

}
else{
echo "
<script type='text/javascript'>document.getElementById('errorpressteam').innerHTML = '* Please write your MUN experiences';</script>";
$errors++;
}
if (isset($_POST['postOpt']) && !empty($_POST['postOpt'])) {
$postOpt = $_POST['postOpt'];
$postOpt = form_input($postOpt);
array_push($arr, $postOpt);
$array[10] = $postOpt;

if ($postOpt == "Journalist") {
if (isset($_POST['comments']) && !empty($_POST['comments'])) {
$comments = $_POST['comments'];
$comments = form_input($comments);
array_push($arr, $comments);
$array[11] = $comments;

}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcomments').innerHTML = '* Please write your answer';</script>";
$errors++;
}
}
elseif ($postOpt == "Photo-Journalist") {
if (isset($_POST['commentsPic']) && !empty($_POST['commentsPic'])) {
$commentsPic = $_POST['commentsPic'];
$commentsPic = form_input($commentsPic);
array_push($arr, $commentsPic);
$array[11] = $commentsPic;
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorcommentsPic').innerHTML = '* Please write your answer';</script>";
$errors++;
}
}
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorpostOpt').innerHTML = '* Please select your Post option';</script>";
$errors++;
}
if ($errors == 0) {
add_to_ip($array);
}
else{
echo "
<script type='text/javascript'>document.getElementById('errorError').innerHTML = '* Error ! This form contain(s) error(s) :';</script>";
}
}
?>