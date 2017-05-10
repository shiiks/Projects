<?php
include 'connect.php';

if(isset($_POST['why_ambassdor']) && isset($_POST['market_publicize']) && isset($_POST['experience']) && isset($_POST['contact_no']) && isset($_POST['university']) && isset($_POST['name']) && isset($_POST['email']))
{
	if(!empty($_POST['why_ambassdor']) && !empty($_POST['market_publicize']) && !empty($_POST['experience']) && !empty($_POST['contact_no']) && !empty($_POST['university']) && !empty($_POST['name']) && !empty($_POST['email']))
 {
	$why_ambassdor=$_POST['why_ambassdor'];
	$market_publicize=$_POST['market_publicize'];
	$experience=$_POST['experience'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$university=$_POST['university'];
	$stmt=$dbh->prepare("INSERT INTO campusambassador(why_ambassdor,market_publicize,experience,name,email,contact_no,university) VALUES (:why_ambassdor,:market_publicize,:experience,:name,:email,:contact_no,:university)");
	
	$stmt->bindparam(":why_ambassdor", $why_ambassdor);
	$stmt->bindparam(":market_publicize", $market_publicize);
	$stmt->bindparam(":experience", $experience);
	$stmt->bindparam(":name", $name);
	$stmt->bindparam(":email", $email);
	$stmt->bindparam(":contact_no", $contact_no);
	$stmt->bindparam(":university", $university);
	
	$stmt->execute();
	echo "Succesfully Registered.";

 }
 else
 {
	 
	 echo "Please Fill The Form Completely.";

 }
 
 }
 else
 { 
		echo "Technical Problem"; 
 }
 
?>