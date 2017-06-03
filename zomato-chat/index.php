<?php
session_start();
require_once 'class.user.php';
$user_home=new USER();
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ChatRoom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="jumbotron text-center">
  <h1>ChatRoom</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
       <div class="users">
     		<?php include("users.php");?>
    </div>
    </div>
    <div class="col-sm-8">
       <div class="chatbox">
			 <?php
			 if($user_home->is_logged_in()){
			  include("chatbox.php");
			 }else{
			  $display_case=true;
			  include("login.php");
			 }
			 ?>
    </div>
    </div>
   
  </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="chat.js"></script>
 <script>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
$(document).on("contextmenu",function(e){        
	   e.preventDefault();
	});
</script>
</body>
</html>
