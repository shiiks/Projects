<?php
include 'core/init.php';
$info = mysql_query("SELECT * FROM `comittee_names`");
	echo "<select id='gender' name='usergender'>";
	echo "<option disabled selected hidden>Choose your option</option>";
	while ($rows = mysql_fetch_array($info)) {
		$name = $rows['comm_name'];
		echo "<option style='color:#212121;' value='$name'>$name</option>";
	}
	echo "</select>";

?>