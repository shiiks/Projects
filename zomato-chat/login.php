<?php
if(isset($_POST['name']) && !isset($display_case)){
 $name=htmlspecialchars($_POST['name']);
 if($name==null){$user_home->redirect('index.php');}else{
 $ermsg=$user_home->login($name);
}}elseif(isset($display_case)){
 if(!isset($ermsg)){
?>
 <h2>Name Needed For Chatting</h2>
 You must provide a name for chatting. This name will be visible to other users.<br/><br/>
 <form class="form-horizontal" action="index.php" method="POST">
 <div class="form-group">
	<label class="control-label col-sm-1" for="name">Name:</label>
 <div class="col-sm-5">
  <input name="name" class="form-control" placeholder="Enter Name" required />
 </div>
 </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-default">Submit</button>
      </div>
    </div>
 </form>
<?php
 }else{
  echo $ermsg;
 }
}
?>
