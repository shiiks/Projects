<!DOCTYPE html>
<html lang="en" class="no-js"><head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Welcome | The Connection</title>
		<meta name="description" content="Explore The Galaxy Of Opportunities">
		<meta name="keywords" content="The Connection">
		<meta name="author" content="The Connection">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="normalize.css">
		<link rel="stylesheet" type="text/css" href="demo.css">
		<link rel="stylesheet" type="text/css" href="component.css">
		<link href="http://fonts.googleapis.com/css?family=Raleway:200,400,800" rel="stylesheet" type="text/css">
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header" style="height: 306px;">
					<canvas id="demo-canvas" width="1366" height="306"></canvas>
					<h1 class="main-title">The <span class="thin">Connection</span></h1>
					<form method="post">
					<input class="main-title1" type="submit" name="submit" value="Start Exploring">
					</form>
<?php
if(isset($_POST['submit']))
{
	header('Location: public/');
}						
?>

				</div>
			</div>
		</div><!-- /container -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/easing/EasePack.min.js"></script>
		<script src="rAF.js"></script>
		<script src="demo-1.js"></script>
	
</body></html>