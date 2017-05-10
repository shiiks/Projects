<?php
function form_input($data) {
$data = trim($data);
$data = strip_tags($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$data = mysql_real_escape_string($data);
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
do
{
$old_data = $data;
$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);
return $data;
}
function validate_email_ip($email){
$email = form_input($email);
if (mysql_num_rows(mysql_query("SELECT * FROM `ipform` WHERE `user_email` = '$email' ")) > 0) {
return false;
}
else{
return true;
}
}
function validate_email_ip_cross($email){
$email = form_input($email);
if (mysql_num_rows(mysql_query("SELECT * FROM `delegateform` WHERE `user_1_email` = '$email' OR `user_2_email` = '$email'")) > 0) {
return false;
}
else{
return true;
}
}
function mail_user($to, $subject, $body)
{
	mail($to, $subject, $body, 'From: autoemail@kiitmun.org');
}
function protect_page()
{
	if (logged_in()=== false) {
		echo "<script>window.open('../index.php','_self')</script>";
	}
}                
function show_committee_names($select){
	$select = form_input($select);
	$info = mysql_query("SELECT * FROM `comittee_names`");
	
	echo "<option disabled selected hidden>Choose your option</option>";
	while ($rows = mysql_fetch_array($info)) {
		$name = $rows['comm_name'];
		if ($name == $select) {
			echo "<option style='color:#212121;' value='$name' selected>$name</option>";
		}
		else{
		echo "<option style='color:#212121;' value='$name'>$name</option>";
	}
	}
}
?>