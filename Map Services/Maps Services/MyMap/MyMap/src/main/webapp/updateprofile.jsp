<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="en" ng-app="Myapp3" ng-controller="myappcontroller3">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Update Profile</title>
		<meta name="description" content="Edit Profile" />
		<meta name="keywords" content="Edit Profile" />
		<meta name="author" content="Shikhar" />
	
		<script data-require="angular.js@*" data-semver="1.2.13" src="http://code.angularjs.org/1.2.13/angular.js"></script>
		<link rel="stylesheet" type="text/css" href="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/css/default.css" />
		<link rel="stylesheet" type="text/css" href="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/css/component.css" />
		<script src="https://tympanus.net/Blueprints/ResponsiveMultiColumnForm/js/modernizr.custom.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    display: inline-flex;
    padding: 15px 30px;
    font-size: 1.1em;
    border-radius: 2px;
    letter-spacing: 1px;
    float:left;
      margin-left:40px;
}
</style>
	</head>
	<body>
	<%
if(session!=null){
String name=(String)session.getAttribute("username");
String email=(String)session.getAttribute("useremail");
if(name==null || email==null){
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}

}else
{
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}
%>
		<div class="container">
			<header class="clearfix">
				<img src="<c:url value="/resources/images/1.png"/>">
				<span>Update Profile</span>
				
			</header>	
			<div class="main" >
				<form class="cbp-mc-form" enctype="multipart/form-data">
					<div class="cbp-mc-column">
	  					<label for="full_name">Full Name</label>
	  					<input type="text" id="full_name" ng-model="fullName" placeholder="Enter FullName" ng-pattern="/^[a-z A-Z]*$/" title="Wrong Format"/>
	  					<label for="contact_no">Contact Number</label>
	  					<input type="text" id="conno" ng-model="contactNo" placeholder="Enter Contact Number" ng-pattern="/^[0-9]*$/" title="Wrong Format"/>
	  					<label for="dob">Date Of Birth</label>
	  					<input type="date" id="dob" ng-model="dob" placeholder="Enter Date of Birth"/>
	  					<label for="location">Location</label>
	  					<input type="text" id="location" ng-model="location" placeholder="Enter Location" ng-pattern="/^[a-z A-Z]*$/" title="Wrong Format"/> 
						
	  				</div>
	  				<div class="cbp-mc-column">
	  				<label for="file">Select File</label>
						<input type="text" id="file" ng-model="file" placeholder="Choose File..."/> 
	  				</div>
	  				<div class="cbp-mc-submit-wrap"><button class="cbp-mc-submit" ng-click="update()">Update</button></div>
	  				<!--  <div class="cbp-mc-submit-wrap"><button class="cbp-mc-submit" ng-click="uploadFile()">Upload</button></div>-->
				</form>
			</div>
		</div>
<script>
var userModule = angular.module('Myapp3', []);
userModule.controller('myappcontroller3', function ($scope,$http,$window) {
 var urlBase='${pageContext.request.contextPath}';

 //$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";


 //add a new user
 $scope.update = function update() {
  if($scope.fullName==undefined || $scope.contactNo==undefined || $scope.dob == undefined || $scope.location == undefined || $scope.file == undefined){
   alert("Insufficient Data! Please provide values for id,fullname, contact number, dob, location, file or Invalid data entered.");
  }
  else{
	  $scope.userID='<%
	    	 int userid=(Integer)session.getAttribute("userid");
	     out.print(userid);%>';
	     
	     var dataObj = {
	    		  userID : $scope.userID,
				  fullName : $scope.fullName,
				  contactNo : $scope.contactNo,
				  dob : $scope.dob,
				  location : $scope.location,
				  file : $scope.file
			};
   $http.post(urlBase + '/update',dataObj).
    success(function(data) {
    alert("Profile Updated");
    $window.location='${pageContext.request.contextPath}'+"/profile.jsp";
    $scope.users = data; 
    $scope.userID="";
    $scope.fullName="";
    $scope.contactNo="";
    $scope.dob="";
    $scope.location="";
	$scope.file="";
      });
  }
 };
 

});



/*userModule.controller('myappcontroller3', ['$scope','$http', 'fileUpload', function($scope, $http, fileUpload){
	 //$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	 $scope.uploadFile = function(){
         var file = $scope.myFile;
         console.log('file is ' );
         console.dir(file);
         var uploadUrl = "http://localhost:8080/MyMap/upload?name=1.png";
         fileUpload.uploadFileToUrl(file, uploadUrl);
         $scope.filename=file.name;
  };
 

}]);
userModule.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
userModule.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        result= $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(){
        	console.log("uploaded");
        })
        .error(function(){
        });
    }
}]);*/
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
