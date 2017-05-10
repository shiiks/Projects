<?php session_start(); ?><?php
 include "css/valid.php";
?>
<div id='f1_errorloc' class='error_strings' style=''></div>
<script src='scripts/gen_validatorv5.js' type='text/javascript'></script>
<script src='scripts/sfm_moveable_popup.js' type='text/javascript'></script>

<form name="f1" action="" method="post" onSubmit="">
<input type="hidden" name="service" value="UPDATEPASS">
 <span  id="thead">Change Password</span>
 <table width="80%" border="0" cellspacing="20" align="center" cellpadding="5">
<tr><td align="right" width="40%">Old password:</td><td><input type="password" name="opass"></td></tr>
<tr><td align="right">New Password:</td><td><input type="password" name="npass"></td></tr>
<tr><td align="right">Confirm Password:</td><td><input type="password" name="cpass"></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Change Password"></td></tr>
</table>
</form>
<script type='text/javascript'>
// <![CDATA[
var f1Validator = new Validator("f1");

f1Validator.EnableOnPageErrorDisplay();
f1Validator.SetMessageDisplayPos("right");

f1Validator.EnableMsgsTogether();
f1Validator.addValidation("opass","req","Please fill in opass");
f1Validator.addValidation("opass","minlen=6","The length of the input for opass should be at least 6.");
f1Validator.addValidation("npass","req","Please fill in npass");
f1Validator.addValidation("npass","minlen=6","The length of the input for npass should be at least 6.");
f1Validator.addValidation("cpass","req","Please fill in cpass");
f1Validator.addValidation("cpass","minlen=6","The length of the input for cpass should be at least 6.");
f1Validator.addValidation("cpass","eqelmnt=npass","cpass should be equal to npass");

// ]]>
</script>

