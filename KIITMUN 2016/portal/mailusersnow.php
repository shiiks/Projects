<?php

include 'core/init.php';
$get_category = mysql_query("SELECT * FROM `tbl_users` WHERE `delegate_form_applied` = 0 AND `press_form_applied` = 0");
                                                        $count = 0;

							while ($rows = mysql_fetch_array($get_category)) {
                                                                $count++;
								$userEmail =  $rows["userEmail"];
								$userName = $rows["userName"];
								echo"$count. $userEmail<br>";
                                                                if($count > 351){
                                                                //echo"mailed<br><br>";
								//mail_user($userEmail, 'Registrations closing (KIIT Intl MUN)', "Greetings $userName,\nThank you for registering and showing your keen interest but it seems that your registration has not been completed. To complete the procedure kindly fill up the Delegate/International Press form at the earliest.\nClick at the following link to complete your registration.\nhttp://www.kiitmun.org/portal/ \n\nRegards,\nSecretariat,\nKIIT International MUN 2016.\n\nN.B ~ Country matrix is present on your dashboard and for any queries click 'Contact us' on your dashboard.");
}
}
						
?>