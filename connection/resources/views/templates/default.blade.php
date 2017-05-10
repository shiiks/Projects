<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>Welcome | The Connection</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		@include('templates.partials.navigation')
		<div class="container">
			@include('templates.partials.alerts')
			@yield('content')
		</div>
	</body>
</html>
