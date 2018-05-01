<?php
/*	Shikhar Saran Srivastava
**	Full Stack Web Developer
**	http://www.shiiks.com	
*/

require_once 'class.receivers.php';

$user_home = new RECEIVERS();
$stmt = $user_home->runQuery("SELECT * FROM blood_info");
$stmt->execute();
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Available Blood Sample</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body>	
		<div class="container">
		<h1>Available Blood Samples</h1>
		<form method="post">
			<table class="table table-bordered">
			<thead>
			  <tr>
				<th>Serial Number</th>
				<th>Blood Type</th>
				<th>Date</th>
				<th>Units</th>
				<th>Other Details</th>
				<th>Request</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
				while($userRow=$stmt->fetch(PDO::FETCH_ASSOC)){
						?><tr><td><?php print($userRow['id']); ?></td><?php
						?><td><?php print($userRow['blood_type']); ?></td><?php
						?><td><?php print($userRow['date']); ?></td><?php
						?><td><?php print($userRow['units']); ?></td><?php
						?><td><?php print($userRow['details']); ?></td>
						<td>
							<a href="request.php?id=<?php print($userRow['id']);//passing the id ?>" class="btn btn-large btn-primary" name="btn-request">Request Sample</a> 
						</td>
						</tr>
<?php					
					}
?>

			</tbody>
		  </table>
		  </form>
		</div>
		
        <!--/.fluid-container-->
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>
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
</html>