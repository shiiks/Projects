<?php
include 'core/init.php';
$get_category = mysql_query("SELECT * FROM `tbl_users` WHERE `delegate_form_applied` = 0 AND `press_form_applied` = 0");

							while ($rows = mysql_fetch_array($get_category)) {
								$userEmail =  $rows["userEmail"];
								$userName = $rows["userName"];
								if (mysql_num_rows(mysql_query("SELECT * FROM `delegateform` WHERE `user_1_email` = '$userEmail'"))>0) {
									echo"$userEmail<br>";
mysql_query("UPDATE  `tbl_users` SET  `delegate_form_applied` =1 WHERE  `userEmail` =  '$userEmail'");
								}
								elseif (mysql_num_rows(mysql_query("SELECT * FROM `delegateform` WHERE `user_2_email` = '$userEmail'"))>0) {
									echo"$userEmail<br>";
mysql_query("UPDATE  `tbl_users` SET  `delegate_form_applied` =1 WHERE  `userEmail` =  '$userEmail'");
								}
								elseif (mysql_num_rows(mysql_query("SELECT * FROM `ipform` WHERE `user_email` = '$userEmail'"))>0) {
									echo"$userEmail<br>";
mysql_query("UPDATE  `tbl_users` SET  `press_form_applied` =1 WHERE  `userEmail` =  '$userEmail'");
								}
								
}
																
								
							
?>