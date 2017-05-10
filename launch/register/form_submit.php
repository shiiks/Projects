<?php
include 'connect.php';

if(isset($_POST['name']) && isset($_POST['company_name']) && isset($_POST['contact_no']) && isset($_POST['email'])
 && isset($_POST['area']) && isset($_POST['year']) && isset($_POST['revenue']) && isset($_POST['area_incorporation']) && isset($_POST['venture_type'])	
 && isset($_POST['team_size']) && isset($_POST['current_funding_req']) && isset($_POST['premoney_eval']) && isset($_POST['explanation']) && isset($_POST['past_investment']) && (isset($_POST['type_business']) || isset($_POST['type_business_other'])))
{
	if(!empty($_POST['name']) && !empty($_POST['company_name']) && !empty($_POST['contact_no']) && !empty($_POST['email'])
 && !empty($_POST['area']) && !empty($_POST['year']) && !empty($_POST['revenue']) && !empty($_POST['area_incorporation']) && !empty($_POST['venture_type'])	
 && !empty($_POST['team_size']) && !empty($_POST['current_funding_req']) && !empty($_POST['premoney_eval']) && !empty($_POST['explanation']) && !empty($_POST['past_investment']) && (!empty($_POST['type_business']) || !empty($_POST['type_business_other'])))
 {
	$name=$_POST['name'];
	$company_name=$_POST['company_name'];
	$contact_no=$_POST['contact_no'];
	$email=$_POST['email'];
	$type_business=$_POST['type_business'];
	$area=$_POST['area'];
	$year=$_POST['year'];
	$type_business=$_POST['type_business'];
	$type_business_other=$_POST['type_business_other'];
	$revenue=$_POST['revenue'];
	$area_incorporation=$_POST['area_incorporation'];
	$venture_type=$_POST['venture_type'];
	$team_size=$_POST['team_size'];
	$current_funding_req=$_POST['current_funding_req'];
	$premoney_eval=$_POST['premoney_eval'];
	$explanation=$_POST['explanation'];
	$past_investment=$_POST['past_investment'];
	
	
	$stmt=$dbh->prepare("INSERT INTO investor (name,company_name,contact_no,email,type_business,area,year,revenue,area_incorporation,venture_type,team_size,current_funding_req,premoney_eval,
	explanation,past_investment,type_business_other) VALUES (:name,:company_name,:contact_no,:email,:type_business,:area,:year,:revenue,:area_incorporation,:venture_type,:team_size,:current_funding_req,:premoney_eval,
	:explanation,:past_investment,type_business_other)");
	
	$stmt->bindparam(":name", $name);
	$stmt->bindparam(":company_name", $company_name);
	$stmt->bindparam(":contact_no", $contact_no);
	$stmt->bindparam(":email", $email);
	$stmt->bindparam(":type_business", $type_business);
	$stmt->bindparam(":type_business_other", $type_business_other);
	$stmt->bindparam(":area", $area);
	$stmt->bindparam(":year", $year);
	$stmt->bindparam(":revenue", $revenue);
	$stmt->bindparam(":area_incorporation", $area_incorporation);
	$stmt->bindparam(":venture_type", $venture_type);
	$stmt->bindparam(":team_size", $team_size);
	$stmt->bindparam(":current_funding_req", $current_funding_req);
	$stmt->bindparam(":premoney_eval", $premoney_eval);
	$stmt->bindparam(":explanation", $explanation);
	$stmt->bindparam(":past_investment", $past_investment);
	$stmt->execute();
	
	echo "Succesfully Registered.";
 }
 else
 {
	 echo 'Please Fill The Form Completely.';
 }
 
 }
 else
 {
	 echo 'Technical Problem';
 }
 
?>