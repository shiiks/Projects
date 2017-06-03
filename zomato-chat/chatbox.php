<?php
if($user_home->is_logged_in()){
?>
 <h2>ChatRoom</h2>
 <a class="btn btn-default" style="right: 20px;top: 20px;position: absolute;cursor: pointer;" href="logout.php">Exit</a>
 <div class='msgs' style="margin-bottom:100px;">
  <?php include("msgs.php");?>
 </div>
 <form id="msg_form" class="form-inline">
 <div class="form-group">
 <div class="col-sm-5">
    <input type="text" class="form-control" name="msg" size="30" style="margin-left:-14px;"/>
 </div>
 </div>
  	<button class="btn btn-default">Send</button>
  </form>
<?php
}
?>