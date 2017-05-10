			<?php 
			session_start();
			include "../include/db.inc.php";
			include "../include/warning.php";
            $notice_id=(isset($_REQUEST['nm']))?trim($_REQUEST['nm']):'';
            $query4 = 'delete from notice where notice_id="'.$notice_id.'"';
            $result4=  mysql_query($query4) or die(mysql_error());
			header("LOCATION:delete_notice.php?msg=5");
            ?>