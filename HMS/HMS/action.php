

<?php

if($_POST['yes'])
{
	$query4="UPDATE indisciplinary_dc_reports SET Forward_status=1 WHERE Ticket_no='".$ticket['Ticket_no']."'";
	if($query4_run=mysql_query($query4,$db))
	{
	    header("Location:index.php");
	}
    else{
        echo "Try Again Later.";
		}
	}
    else if($_POST['no'])
	{
	    $query5="UPDATE indisciplinary_dc_reports SET Closure_status=1 WHERE Ticket_no='".$ticket['Ticket_no']."'";
	    if($query5_run=mysql_query($query5,$db))
		{
			header("Location:index.php");
		}
		else
		{
			echo "Try Again Later.";
		}
	}
?>