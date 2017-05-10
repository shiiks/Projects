<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="en" ng-app="Myapp2" ng-controller="myappcontroller2">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Login</title>
		<meta name="description" content="Login" />
		<meta name="keywords" content="Login" />
		<meta name="author" content="Shikhar" />
	
		<script data-require="angular.js@*" data-semver="1.2.13" src="http://code.angularjs.org/1.2.13/angular.js"></script>
		<link rel="stylesheet" type="text/css" href="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/css/default.css" />
		<link rel="stylesheet" type="text/css" href="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/css/component.css" />
		<script src="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/js/modernizr.custom.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script
	src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.18/angular-resource.js"></script>
		  <!-- Favicons-->
    <link rel="icon" href="<c:url value="/resources/images/favicon/favicon-32x32.png"/>" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<c:url value="/resources/images/favicon/apple-touch-icon-152x152.png"/>">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<c:url value="/resources/images/favicon/mstile-144x144.png"/>">
    <!-- For Windows Phone -->
<style>
.cbp-mc-form button.cbp-mc-submit{
    background: #10689a;
    border: none;
    color: #fff;
    width: auto;
    cursor: pointer;
    text-transform: uppercase;
    display: inline-block;
    padding: 15px 30px;
    font-size: 1.1em;
    border-radius: 2px;
    letter-spacing: 1px;
    float:left;
    margin-left:40px;
}
</style>
	</head>
	<%
if(session!=null){
String name=(String)session.getAttribute("username");
String email=(String)session.getAttribute("useremail");
if(name!=null || email!=null){
	RequestDispatcher rd=request.getRequestDispatcher("profile.jsp");
	rd.forward(request,response);
}

}
%>
	<body>
		<div class="container">
			<header class="clearfix">
				<img src="<c:url value="/resources/images/1.png"/>">
				<span>Login</span>
				
			</header>	
			<div class="main" >
			
				<form class="cbp-mc-form">
					<div class="cbp-mc-column">
	  					<label for="email">Email Address</label>
	  					<input type="email" id="email" ng-model="userEmail" placeholder="Enter Email ID" required>
	  					<label for="password">Password</label>
	  					<input type="password" id="password" ng-model="userPass" placeholder="Enter Password" required>
	  					
	  				</div>
	  				
	  				
	  				<div class="cbp-mc-submit-wrap"><button class="cbp-mc-submit" ng-click="login()">Login</button></div>
				</form>
			</div>
		</div>
<script>
var userModule = angular.module('Myapp2', []);
userModule.controller('myappcontroller2', function ($scope,$http,$window) {
	var urlBase='${pageContext.request.contextPath}';

 //$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";


 //login
 $scope.login = function login() {
  if($scope.userEmail == undefined || $scope.userPass == undefined){
   alert("Insufficient Data! Please provide values for email and password");
  }
  else{

	  var dataObj = {
			  userEmail : $scope.userEmail,
			  userPass : $scope.userPass
		};
   $http.post(urlBase+'/login',dataObj).success(function(data) {
    if(data=="Found"){
    	$window.location='${pageContext.request.contextPath}'+"/editprofile.jsp";
    }else{
    	$window.alert("Not Found!!!");
    }
      });
  }
 };
 

});
</script>
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
	</body>
</html>
