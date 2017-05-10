<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="en"  ng-app="Myapp4" ng-controller="myappcontroller4">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content=" Maps Service">
  <meta name="keywords" content=" Maps Service">
  <title>Profile Page | Maps Service</title>

  <!-- Favicons-->
  <link rel="icon" href="<c:url value="/resources/images/favicon/favicon-32x32.png"/>" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<c:url value="/resources/images/favicon/apple-touch-icon-152x152.png"/>">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<c:url value="/resources/images/favicon/mstile-144x144.png"/>">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<c:url value="/resources/css/materialize.min.css"/>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<c:url value="/resources/css/style.min.css"/>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<c:url value="/resources/css/custom/custom.css"/>" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
      <script data-require="angular.js@*" data-semver="1.2.13" src="http://code.angularjs.org/1.2.13/angular.js"></script>
  <link href="<c:url value="/resources/js/plugins/prism/prism.css"/>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<c:url value="/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.css"/>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<c:url value="/resources/js/plugins/chartist-js/chartist.min.css"/>" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="dashboard.jsp" class="brand-logo darken-1"><img src="<c:url value="/resources/images/materialize-logo.png"/>" alt="materialize logo"></a> <span class="logo-text">Maps Service</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Maps Service"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="<c:url value="/resources/images/flag-icons/India.png"/>" alt="India" /></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                     
                       
                    </ul>
                    <!-- translation-button -->
                    <ul id="translation-dropdown" class="dropdown-content">
                      <li>
                        <a href="#!"><img src="<c:url value="/resources/images/flag-icons/United-States.png"/>" alt="English" />  <span class="language-select">English</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="<c:url value="/resources/images/flag-icons/France.png"/>" alt="French" />  <span class="language-select">French</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="<c:url value="/resources/images/flag-icons/China.png"/>" alt="Chinese" />  <span class="language-select">Chinese</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="<c:url value="/resources/images/flag-icons/Germany.png"/>" alt="German" />  <span class="language-select">German</span></a>
                      </li>
                      
                    </ul>
                   
                    
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="<c:url value="/resources/images/mypic.jpg"/>" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="profile.jsp"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a href="updateprofile.jsp"><i class="mdi-action-face-unlock"></i> Update Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.jsp"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><%
if(session!=null){
String name=(String)session.getAttribute("username");
String email=(String)session.getAttribute("useremail");
if(name==null || email==null){
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}
out.print(name);
 

}
else{
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}
%><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">Administrator</p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="dashboard.jsp" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            
            <li class="bold"><a onclick="getLocation()" class="waves-effect waves-cyan"><i class="mdi-maps-navigation"></i> Indoor Maps <span class="new badge"></span></a>
            </li>
            <li class="bold"><a href="runstatics.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-directions-walk"></i>RunStatics <span class="new badge"></span></a>
            </li>
          
                    <li class="bold"><a href="place-locate.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-place"></i> Place Locate <span class="new badge"></span></a>
                    </li>
                
             <li class="bold"><a href="plot.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-terrain"></i> Plot <span class="new badge"></span></a>
                        </li>
            
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">        

        <!--start container-->
        <div class="container">

          <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<c:url value="/resources/images/user-profile-bg.jpg"/>" alt="user background">                    
                </div>
                <figure class="card-profile-image">
                    <img src="<c:url value="/resources/images/mypic.jpg"/>" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                  <div class="row">                    
                    <div class="col s3 offset-s2">                        
                        <h4 class="card-title grey-text text-darken-4">{{users.fullName}}</h4>
                        <p class="medium-small grey-text">Intern</p>                        
                    </div>
                      <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">{{users.dob}}</h4>
                        <p class="medium-small grey-text">Birthday</p>                        
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">{{users.location}}</h4>
                        <p class="medium-small grey-text">Location</p>                        
                    </div>                    
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">{{users.contactNo}}</h4>
                        <p class="medium-small grey-text">Contact</p>                        
                    </div>                    
                     
                    <div class="col s1 right-align">
                      <a class="btn-floating activator waves-effect waves-light darken-2 right">
                          <i class="mdi-action-perm-identity"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal">
                    <p>
                      <span class="card-title grey-text text-darken-4">{{users.fullName}}<i class="mdi-navigation-close right"></i></span>
                      <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Intern</span>
                    </p>
                    
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{users.contactNo}}</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> {{users.userEmail}}</p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i>{{users.dob}}</p>
                    <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> {{users.location}}</p>
                </div>
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
              <!-- profile-page-sidebar-->
              <div id="profile-page-sidebar" class="col s12 m4">
               

                <!-- Profile About Details  -->
                <ul id="profile-page-about-details" class="collection z-depth-1">
                  <li class="collection-item">
                    <div class="row">
                      <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i> Lives in</div>
                      <div class="col s7 grey-text text-darken-4 right-align">{{users.location}}</div>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div class="row">
                      <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i> Birth date</div>
                      <div class="col s7 grey-text text-darken-4 right-align">{{users.dob}}</div>
                    </div>
                  </li>
                </ul>
                <!--/ Profile About Details  -->

            

              

                <!-- Map Card -->
                <div class="map-card">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <div id="map-canvas" data-lat="18.518213" data-lng="73.924459"></div>
                        </div>
                        <div class="card-content">                    
                            <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                <i class="mdi-maps-pin-drop"></i>
                            </a>
                            <h4 class="card-title grey-text text-darken-4"><a href="http://www.inautix.co.in" class="grey-text text-darken-4">iNautix Technologies</a>
                            </h4>
                            <p class="blog-post-content">A Bank of New York Mellon Company</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">iNautix Technologies <i class="mdi-navigation-close right"></i></span>                   
                            <p>	iNautix Technologies India Private Limited is a group company of Bank of New York Mellon - a leading financial services provider. We provide technology development, business & technology operations and remote infrastructure management services for BNY Mellon and its subsidiaries. iNautix also develops and delivers comprehensive technology solutions and software development products for customers of BNY Mellon. </p>
                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Kaveri Ramaniraj</p>
                            <p><i class="mdi-communication-business cyan-text text-darken-2"></i> Tower-8, Magarpatta City, Pune, India</p>
                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +91999999999</p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> support@inautix.co.in</p>                    
                        </div>
                    </div>
                </div>
                <!-- Map Card -->

              </div>
              <!-- profile-page-sidebar-->

                

            </div>
          </div>
        </div>
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->



    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="http://aaog.online" target="_blank">Shikhar Saran Srivastava</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://aaog.online">Shikhar</a></span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/jquery-1.11.2.min.js"/>"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<c:url value="/resources/js/materialize.min.js"/>"></script>
    <!--prism-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/prism/prism.js"/>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"/>"></script>
    

    <!-- sparkline -->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/sparkline/jquery.sparkline.min.js"/>"></script>
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/sparkline/sparkline-script.js"/>"></script>
    
    <!-- google map api -->

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
     <!--google map-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/google-map/google-map-script.js"/>"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins.min.js"/>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<c:url value="/resources/js/custom-script.js"/>"></script>

    <!-- Toast Notification -->
    <script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hi! I am Mapee.</span>', 1500);
        }, 1500);
        setTimeout(function() {
            Materialize.toast('<span>You can enjoy Maps Services Now!</span>', 3000);
        }, 5000);
        /*setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 15000);*/
    });
    </script>
     <script>
    var userModule = angular.module('Myapp4', []);
    userModule.controller('myappcontroller4', function ($scope,$http,$window) {
     var urlBase='${pageContext.request.contextPath}';

     $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
     $scope.id='<%
    	 int userid=(Integer)session.getAttribute("userid");
     out.print(userid);%>';
       $http.get(urlBase + '/view/'+$scope.id).success(function(response) {
        $scope.users=response;
        
          });


    });
    
    </script>
    <script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
  {  
  window.location.href="https://www.google.com/maps/place/@" + position.coords.latitude + "," + position.coords.longitude+","+"19z";
  //window.location.href="https://www.google.com/maps/place/@40.7504932,-73.9934641,19z";
  }
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