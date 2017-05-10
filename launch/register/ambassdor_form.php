<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('register/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('metaheader.php');?>

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/style1.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set2.css" />
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
<link rel="stylesheet" href="css/mains.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Page Wrap -->
<div id="wrap"> 
  
  <!-- Header -->
  <header> 
    <?php include('header.php');?>
  </header>
  <!-- Header End --> 
  
  <!--======= HOME MAIN SLIDER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.3">
    <div class="overlay-gr">
      <div class="container">
        <h2>Concalve Ambassdor Form</h2>
        <p>Fill the form for applying to conclave ambassdor form</p>
      </div>
    </div>
  </section>
  
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Concalve Program</li>
    <li class="active">Conclave Ambassdor Form</li>
  </ol>
  
   
  <!-- CONTENT START -->
  <div class="content"> 
      <section class="sec-100px history" style="background:#E6E6FA;">
      <div class="container">
		<section class="sec-100px history" style="background:#E6E6FA;">
      <div class="container">
        <div class="col-md-12">
		<div class="container">
			<div class="form-container">
           
            <h2>Conclave Ambassdor Form</h2><hr />
			<form method="post" action="form_submit2.php">
            <section class="content bgcolor-1">
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="name" type="text" id="input-6" />
					<label class="input__label input__label--nao" for="input-6">
						<span class="input__label-content input__label-content--nao">Enter Your Name</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>	
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="email" type="email" id="input-7" />
					<label class="input__label input__label--nao" for="input-7">
						<span class="input__label-content input__label-content--nao">Enter Your Email</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>	
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="contact_no" type="text" id="input-1" />
					<label class="input__label input__label--nao" for="input-1">
						<span class="input__label-content input__label-content--nao">Enter Your Contact Number</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>	
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="university" type="text" id="input-2" />
					<label class="input__label input__label--nao" for="input-2">
						<span class="input__label-content input__label-content--nao">Enter Your University</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>					
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="why_ambassdor" type="text" id="input-3" />
					<label class="input__label input__label--nao" for="input-3">
						<span class="input__label-content input__label-content--nao">Why do you wish to be an ambassador to CELT ?</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>			
		
				<span class="input input--nao">
					<input class="input__field input__field--nao" name="market_publicize" type="text" id="input-4" />
					<label class="input__label input__label--nao" for="input-4">
						<span class="input__label-content input__label-content--nao">How do you think you can market and publicize this conclave in your university ?</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				<span class="input input--nao">
					<input class="input__field input__field--nao" type="text" name="experience" id="input-5" />
					<label class="input__label input__label--nao" for="input-5">
						<span class="input__label-content input__label-content--nao">Do you have any prior experience in being a campus ambassador for any such conclave or summit ?</span>
					</label>
					<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				
				<div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="submit" style="text-align:center;width:auto;">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Submit
                </button>
				</div>
				</section>
        </form>
       </div>
       </div>
       </div>
	   </div>
    
	  </div>
    </section>
  </div>
  <!--======= Footer =========-->
  <footer>
   <?php include 'footer.php' ?>
  </footer>
</div>
<!-- Wrap End --> 

<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.stellar.min.js"></script> 
<script src="js/jquery.magnific-popup.min.html"></script> 
<script src="js/smooth-scroll.js"></script> 
<script src="js/jquery.isotope.min.html"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/main1.js"></script> 
<script src="js/classie.js"></script>
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
</body>
</html>