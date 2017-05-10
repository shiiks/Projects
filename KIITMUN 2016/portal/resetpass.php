<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];

	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);

	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];

			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-block' style='color:#df6589;'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match.
						</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));

				$msg = "<div class='alert alert-success' style='color:#df6589;'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed.
						</div>";
				header("refresh:5;index.php");
			}
		}
	}
	else
	{
		$msg = "<div class='alert alert-success' style='color:#df6589;'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";

	}


}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Password Reset | KIITMUN 2016</title>
    <!-- Bootstrap -->
		<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
		<meta name="google-site-verification" content="vnJXae1QIiQ2o83fbX68kFnV26PFb1qObYY6iCNJ_iI" />
        <meta name="title" content="KIIT INTERNATIONAL MUN 2016">
<meta name="description" content="The official website of KIITMUN INTL MUN 2016">
<meta name="keywords" content="kiitmun,kiit international mun,MUN,Bhubaneswar,MUN, Bhubaneswar, mun, bhubaneswar, Councils,UNGA,UNHRC,UNSC, UNODC,Marvel,KiiT ,Model,United,Nations, KiiT,kiit,mun">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="assets/images/favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<!-- KIITMUN,KIIT,MUN -->
<meta property="og:url" content="http://www.kiitmun.org"/>
<meta property="og:title" content="KIIT INTERNATIONAL MUN 2016 BETA"/>
<meta property="og:image" content="http://www.kiitmun.org/img/4.jpg"/>
<meta property="og:site_name" content="KIIT INTERNATIONAL MUN 2016 "/>
<meta property="og:description" content="To be held this autumn, KIIT International Model UN 2016 shall be the fourth edition of one of the world's largest MUNs. Hosted by KIIT University in Bhubaneswar, better known as the temple city in India, KIIT Intl MUN is considered to be one of the most loved conferences in India and invites applications from Class 9 onwards to Post Graduate students in committees of varying difficulties and topics."/>

		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="assets/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/set1.css" />
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<!--<link rel="stylesheet" type="text/css" href="assets/default.css" />-->
		<link rel="stylesheet" type="text/css" href="assets/component.css" />
		<script src="assets/modernizr.custom.js"></script>
		<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="KIITMUN 2016">
  <meta name="theme-color" content="#000">
<meta name="msapplication-navbutton-color" content="#000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000">
  <meta name="msapplication-TileColor" content="#000">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login" oncontextmenu="return false">
    <div class="container">
    	<div class='alert alert-success' style='color:#df6589;'>
			<strong>Hello !</strong>  <?php echo $rows['userName'] ?> you are here to reset your forgetton password.
		</div>
        <form method="post">
        <h3 class="form-signin-heading"></h3><!--<hr />-->
        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>

		<section class="content bgcolor-4">
			<h2>Forgot Password</h2>
			<span class="input input--kuro">
				<input class="input__field input__field--kuro" type="password" id="input-7" name="pass" required />
				<label class="input__label input__label--kuro" for="input-7">
					<span class="input__label-content input__label-content--kuro">New Password</span>
				</label>
			</span>
			<span class="input input--kuro">
				<input class="input__field input__field--kuro" type="password" id="input-8" name="confirm-pass" required />
				<label class="input__label input__label--kuro" for="input-8">
					<span class="input__label-content input__label-content--kuro">Confirm New Password</span>
				</label>
			</span>
		</section>
     <!--	<hr />-->
        <button class="btn btn-1 btn-1e" type="submit" name="btn-reset-pass">Reset Your Password</button>

      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
		<script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalButtons7Click = buttons7Click.length,
				totalButtons9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie.has( this, activatedClass ) ) {
					classie.add( this, activatedClass );
					setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>
  </body>
</html>
