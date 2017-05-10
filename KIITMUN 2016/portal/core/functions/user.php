<?php
function add_to_db(&$arr){
$user_1_name = form_input($arr[0]);
$user_1_email = form_input($arr[1]);
$user_1_gender = form_input($arr[2]);
$user_1_address = form_input($arr[3]);
$user_1_institute = form_input($arr[4]);
$user_1_year = form_input($arr[5]);
$user_1_nationality = form_input($arr[6]);
$user_1_accomodation = form_input($arr[7]);
$user_1_mun = form_input($arr[8]);
$double_delegate = form_input($arr[9]);
$user_2_name = form_input($arr[10]);
$user_2_email = form_input($arr[11]);
$user_2_gender = form_input($arr[12]);
$user_2_address = form_input($arr[13]);
$user_2_institute = form_input($arr[14]);
$user_2_year = form_input($arr[15]);
$user_2_nationality = form_input($arr[16]);
$user_2_accomodation = form_input($arr[17]);
$user_2_mun = form_input($arr[18]);
$why_kiitmun = form_input($arr[19]);
$com1 = form_input($arr[20]);
$com1cont1 = form_input($arr[21]);
$com1cont2 = form_input($arr[22]);
$com2 = form_input($arr[23]);
$com2cont1 = form_input($arr[24]);
$com2cont2 = form_input($arr[25]);
$com3 = form_input($arr[26]);
$com3cont1 = form_input($arr[27]);
$com3cont2 = form_input($arr[28]);
$munmail = "webteam@kiitmun.org";
mysql_query("INSERT INTO delegateform (`user_1_name`,`user_1_email`,`user_1_gender`,`user_1_address`,`user_1_institute`,`user_1_year`,`user_1_nationality`,`user_1_accomodation`,`user_1_mun`,`double_delegate`,`user_2_name`,`user_2_email`,`user_2_gender`,`user_2_address`,`user_2_institute`,`user_2_year`,`user_2_nationality`,`user_2_accomodation`,`user_2_mun`,`why_kiitmun`,`com1`,`com1cont1`,`com1cont2`,`com2`,`com2cont1`,`com2cont2`,`com3`,`com3cont1`,`com3cont2`)
VALUES ('$user_1_name','$user_1_email','$user_1_gender','$user_1_address','$user_1_institute','$user_1_year','$user_1_nationality','$user_1_accomodation','$user_1_mun','$double_delegate','$user_2_name','$user_2_email','$user_2_gender','$user_2_address','$user_2_institute','$user_2_year','$user_2_nationality','$user_2_accomodation','$user_2_mun','$why_kiitmun','$com1','$com1cont1','$com1cont2','$com2','$com2cont1','$com2cont2','$com3','$com3cont1','$com3cont2')");
mysql_query("UPDATE `tbl_users` SET `delegate_form_applied`=1 WHERE `userID`=".$_SESSION['userSession']."");
if(mysql_num_rows(mysql_query("SELECT * FROM tbl_users WHERE userEmail= '$user_2_email'")) > 0){
mysql_query("UPDATE `tbl_users` SET `delegate_form_applied`=1 WHERE `userEmail`= '$user_2_email'");}
echo "<script>window.location='index.php?success';</script>";
mail_user($user_1_email, 'Confirmation of registration (KIITMUN 2016)', "Dear $user_1_name,\n\nYou shall be hearing from us with the allotment as and when they are released.Stay tuned to us on our social platforms and the website! \n\nRegards\nSecretariat\nKIIT International MUN 2016\n\nF: www.facebook.com/kiitmun\nT: www.twitter.com/kiitmun\nL : in.linkedin.com/in/kiitmun\nG: plus.google.com/+kiitmun\nM : +91-7855024743 | +91-8908689500");
mail_user($user_2_email, 'Confirmation of registration (KIITMUN 2016)', "Dear $user_2_name,\n\nYou shall be hearing from us with the allotment as and when they are released.Stay tuned to us on our social platforms and the website! \n\nRegards\nSecretariat\nKIIT International MUN 2016\n\nF: www.facebook.com/kiitmun\nT: www.twitter.com/kiitmun\nL : in.linkedin.com/in/kiitmun\nG: plus.google.com/+kiitmun\nM : +91-7855024743 | +91-8908689500");
mail_user($munmail, 'New registration (Delegate)', "$user_1_name\n having an email: $user_1_email,\n of institute: $user_1_institute\n and country: $user_1_nationality\n has registered successfully.\n Accomodation: $user_1_accomodation\n Double delegate: $double_delegate.\n\n regards\n The Webteam KIITMUN 2016");
}
function add_to_ip(&$arr){
	$user_name = form_input($arr[0]);
	$user_email = form_input($arr[1]);
	$user_gender = form_input($arr[2]);
	$user_address = form_input($arr[3]);
	$user_institute = form_input($arr[4]);
	$user_year = form_input($arr[5]);
	$user_nationality = form_input($arr[6]);
	$user_accomodation = form_input($arr[7]);
	$mun_exp = form_input($arr[8]);
	$press_exp = form_input($arr[9]);
	$post_apply = form_input($arr[10]);
	$anser_to_question = form_input($arr[11]);
	$munmail = "webteam@kiitmun.org";

	mysql_query("INSERT INTO ipform (`user_name`,`user_email`,`user_gender`,`user_address`,`user_institute`,`user_year`,`user_nationality`,`user_accomodation`,`mun_exp`,`press_exp`,`post_apply`,`anser_to_question`)
VALUES ('$user_name','$user_email','$user_gender','$user_address','$user_institute','$user_year','$user_nationality','$user_accomodation','$mun_exp','$press_exp','$post_apply','$anser_to_question')");
	mysql_query("UPDATE `tbl_users` SET `press_form_applied`=1 WHERE `userID`=".$_SESSION['userSession']."");
	echo "<script>window.location='index.php?success';</script>";
mail_user($user_email, 'Confirmation of registration (KIITMUN 2016)', "Dear $user_name,\n\nYou shall be hearing from us with the allotment as and when they are released.Stay tuned to us on our social platforms and the website! \n\nRegards\nSecretariat\nKIIT International MUN 2016\n\nF: www.facebook.com/kiitmun\nT: www.twitter.com/kiitmun\nL : in.linkedin.com/in/kiitmun\nG: plus.google.com/+kiitmun\nM : +91-7855024743 | +91-8908689500");
mail_user($munmail, 'New registration (Press)', "$user_name\n having an email: $user_email,\n of institute: $user_institute\n and country: $user_nationality\n has registered successfully.\n Accomodation: $user_accomodation\n\n regards\n The webteam kiitmun2016");
}
function add_ques(&$arr){
	$user_name = form_input($arr[0]);
	$user_email = form_input($arr[1]);
	$user_msg = form_input($arr[2]);
        $munmail = "webteam@kiitmun.org";

	mysql_query("INSERT INTO contactus (`contact_name`,`contact_email`,`contact_msg`)
VALUES ('$user_name','$user_email','$user_msg')");
echo "<script>window.location='../index.html';</script>";
mail_user($user_email, 'Thanks for asking (KIITMUN 2016)', "Dear $user_name\n\nThank you for registering with KIIT International MUN 2016. We have received your query. We shall get back to you soon. Stay tuned to our social platforms for news and updates!\n//OR Keep in touch with Kemun for the latest updates!\n\nRegards\nSecretariat\nKIIT International MUN 2016\n\nF: www.facebook.com/kiitmun\nT: www.twitter.com/kiitmun\nL : in.linkedin.com/in/kiitmun\nG: plus.google.com/+kiitmun\nM :  +91-7855024743 | +91-8908689500");
mail_user($munmail, 'New Query recieved (KIITMUN 2016)', "$user_name\n having an email: $user_email\n has asked the following question.\n$user_msg\n\n regards\n The webteam kiitmun2016");
}
function validate_name($name){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    	return false;
}
else{
	return true;
}
}
function validate_email($email){
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	return false;
}
else{
	return true;
}
}
function logged_in()
{
	if (isset($_SESSION['userSession'])) {
		$id = $_SESSION['userSession'];
		return true;
	}
	else {

		return false;
	}
}
function user_data($user_id, $num)
{
	$user_id =(int)$user_id;
	$get_category = mysql_query("SELECT * FROM  tbl_users WHERE userID = $user_id");

							while ($rows = mysql_fetch_array($get_category)) {
								$name = $rows["FullName"];
								$username = $rows["userName"];
								$email = $rows["userEmail"];
																
								$data = array("$name","$username", "$email");
									return $data[$num];
								
							}
	
}
?>