<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Maps Service">
  <meta name="keywords" content="Maps Service">
  <title>Maps Services | Plot</title>
<style>
    
      #map {
        bottom:42px;
        height: 69%;
        left: 240px;
        position: absolute;
        right: 0px;
      }
      .options-box {
        background: #fff;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100%;
        line-height: 35px;
        padding: 10px 10px 30px 10px;
        text-align: left;
        width: 340px;
      }
      #pano {
        width: 200px;
        height: 200px;
      }
      #places-search,
      #search-within-time-text {
        width: 84%;
      }
      .text {
        font-size: 12px;
      }
      #toggle-drawing {
        width: 27%;
        position: relative;
        margin-left: 50px;
      }
    </style>
</style>
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
                      <li><h1 class="logo-wrapper"><a href="dashboard.jsp" class="brand-logo darken-1"><img src="<c:url value="/resources/images/1.png"/>" alt="materialize logo"></a> <span class="logo-text">Maps Services</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input id="places-search" type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Place Locator"/>
                    </div>
                    
                    <ul class="right hide-on-med-and-down">
                    <li><input id="go-places" type="hidden" value="Go"></input></li>
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
                    <!-- notifications-dropdown -->
                    
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
            
            <li class="bold"><a onclick="getLocation()" class="waves-effect waves-cyan"><i class="mdi-maps-navigation"></i>Indoor Maps <span class="new badge"></span></a>
            </li>
            <li class="bold"><a href="runstatics.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-directions-walk"></i> RunStatics <span class="new badge"></span></a>
            
            </li>
            
                    <li class="bold"><a href="place-locate.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-place"></i> Place Locate <span class="new badge"></span></a>
                    </li>
                
             <li class="bold"><a href="plot.jsp" class="waves-effect waves-cyan"><i class="mdi-maps-terrain"></i> Plot<span class="new badge"></span></a>
                    </li>
           
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" id="places-search" name="Search" class="header-search-input z-depth-2" placeholder="Explore Place Locator">
                  <input id="go-places" type="hidden" value="Go">
            </div>
          
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">
<div style="display:none">
          <input id="show-listings" type="button" value="Show Listings">
          <input id="hide-listings" type="button" value="Hide Listings">
          <hr>
          </div>
          <span class="text"> Draw a shape to search within it for homes!</span>
          <input id="toggle-drawing"  type="button" value="Drawing Tools">
           <input id="zoom-to-area-text" type="text" placeholder="Enter your favorite area!">
          <input id="zoom-to-area" type="button" value="Zoom">
          </div>
          <div style="display:none">
           <span class="text"> Within </span>
          <select id="max-duration">
            <option value="10">10 min</option>
            <option value="15">15 min</option>
            <option value="30">30 min</option>
            <option value="60">1 hour</option>
          </select>
          <select id="mode">
            <option value="DRIVING">drive</option>
            <option value="WALKING">walk</option>
            <option value="BICYCLING">bike</option>
            <option value="TRANSIT">transit ride</option>
          </select>
          <span class="text">of</span>
          <input id="search-within-time-text" type="text" placeholder="Ex: Google Office NYC or 75 9th Ave, New York, NY">
          <input id="search-within-time" type="button" value="Go">
       </div>
           <div id="map"></div>
           <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
          <!-- Floating Action Button -->
           <div class="fixed-action-btn" style="bottom: 50px; right: 49px;">
                        <a class="btn-floating btn-large">
                          <i class="mdi-action-stars"></i>
                        </a>
                        <ul>
                          <li><a href="updateprofile.jsp" class="btn-floating red"><i class="mdi-image-tag-faces"></i></a></li>
                          <li><a href="index.jsp" class="btn-floating yellow darken-1"><i class="mdi-action-home"></i></a></li>
                          <li><a href="profile.jsp" class="btn-floating green"><i class="mdi-action-face-unlock"></i></a></li>
                  
                        </ul>
                    </div>
            <!-- Floating Action Button -->
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
        <!-- jQuery Library -->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/jquery-1.11.2.min.js"/>"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<c:url value="/resources/js/materialize.min.js"/>"></script>
    <!--prism
    <script type="text/javascript" src="js/prism/prism.js"></script>-->
    <!--scrollbar-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"/>"></script>
    <!-- chartist -->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins/chartist-js/chartist.min.js"/>"></script>   
    <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry,drawing&key=AIzaSyDUr1EH3Pbiwc9cmNPQyMThC6YxtC2cDYY&v=3&callback=initMap">
    </script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<c:url value="/resources/js/plugins.min.js"/>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<c:url value="/resources/js/custom-script.js"/>"></script>
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
      var map;
      // Create a new blank array for all the listing markers.
      var markers = [];
      // This global polygon variable is to ensure only ONE polygon is rendered.
      var polygon = null;
      // Create placemarkers array to use in multiple functions to have control
      // over the number of places that show.
      var placeMarkers = [];
      function initMap() {
        // Create a styles array to use with the map.
        var styles = [
          {
            featureType: 'water',
            stylers: [
              { color: '#19a0d8' }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.stroke',
            stylers: [
              { color: '#ffffff' },
              { weight: 6 }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.fill',
            stylers: [
              { color: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -40 }
            ]
          },{
            featureType: 'transit.station',
            stylers: [
              { weight: 9 },
              { hue: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'labels.icon',
            stylers: [
              { visibility: 'off' }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
              { lightness: 100 }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
              { lightness: -100 }
            ]
          },{
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [
              { visibility: 'on' },
              { color: '#f0e4d3' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.fill',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -25 }
            ]
          }
        ];
        // Constructor creates a new map - only center and zoom are required.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 18.5164248, lng: 73.9242472},
          zoom: 16,
          styles: styles,
          mapTypeControl: false
        });
        // This autocomplete is for use in the search within time entry box.
        var timeAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('search-within-time-text'));
        // This autocomplete is for use in the geocoder entry box.
        var zoomAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('zoom-to-area-text'));
        // Bias the boundaries within the map for the zoom to area text.
        zoomAutocomplete.bindTo('bounds', map);
        // Create a searchbox in order to execute a places search
        var searchBox = new google.maps.places.SearchBox(
            document.getElementById('places-search'));
        // Bias the searchbox to within the bounds of the map.
        searchBox.setBounds(map.getBounds());
        // These are the real estate listings that will be shown to the user.
        // Normally we'd have these in a database instead.
        var locations = [
          {title: 'Magarpatta City,Hadapsar', location: {lat: 18.5144291, lng: 73.9310953}},
          {title: 'Aditi Garden', location: {lat: 18.5158989, lng: 73.9277958}},
          {title: 'Deccan Harvest', location: {lat: 18.5142186, lng: 73.927414}},
          {title: 'Administration Office', location: {lat: 18.5135859, lng:73.9244088}},
          {title: 'Little Millennium School', location: {lat: 18.5147597, lng: 73.9209701}},
          {title: 'Cafe Chokolade', location: {lat: 18.5191798, lng:73.9316144}}
        ];
        var largeInfowindow = new google.maps.InfoWindow();
        // Initialize the drawing manager.
        var drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_LEFT,
            drawingModes: [
              google.maps.drawing.OverlayType.POLYGON
            ]
          }
        });
        // Style the markers a bit. This will be our listing marker icon.
        var defaultIcon = makeMarkerIcon('0091ff');
        // Create a "highlighted location" marker color for when the user
        // mouses over the marker.
        var highlightedIcon = makeMarkerIcon('FFFF24');
        // The following group uses the location array to create an array of markers on initialize.
        for (var i = 0; i < locations.length; i++) {
          // Get the position from the location array.
          var position = locations[i].location;
          var title = locations[i].title;
          // Create a marker per location, and put into markers array.
          var marker = new google.maps.Marker({
            position: position,
            title: title,
            animation: google.maps.Animation.DROP,
            icon: defaultIcon,
            id: i
          });
          // Push the marker to our array of markers.
          markers.push(marker);
          // Create an onclick event to open the large infowindow at each marker.
          marker.addListener('click', function() {
            populateInfoWindow(this, largeInfowindow);
          });
          // Two event listeners - one for mouseover, one for mouseout,
          // to change the colors back and forth.
          marker.addListener('mouseover', function() {
            this.setIcon(highlightedIcon);
          });
          marker.addListener('mouseout', function() {
            this.setIcon(defaultIcon);
          });
        }
        document.getElementById('show-listings').addEventListener('click', showListings);
        document.getElementById('hide-listings').addEventListener('click', function() {
          hideMarkers(markers);
        });
        document.getElementById('toggle-drawing').addEventListener('click', function() {
          toggleDrawing(drawingManager);
        });
        document.getElementById('zoom-to-area').addEventListener('click', function() {
          zoomToArea();
        });
        document.getElementById('search-within-time').addEventListener('click', function() {
          searchWithinTime();
        });
        // Listen for the event fired when the user selects a prediction from the
        // picklist and retrieve more details for that place.
        searchBox.addListener('places_changed', function() {
          searchBoxPlaces(this);
        });
        // Listen for the event fired when the user selects a prediction and clicks
        // "go" more details for that place.
        document.getElementById('go-places').addEventListener('click', textSearchPlaces);
        // Add an event listener so that the polygon is captured,  call the
        // searchWithinPolygon function. This will show the markers in the polygon,
        // and hide any outside of it.
        drawingManager.addListener('overlaycomplete', function(event) {
          // First, check if there is an existing polygon.
          // If there is, get rid of it and remove the markers
          if (polygon) {
            polygon.setMap(null);
            hideMarkers(markers);
          }
          // Switching the drawing mode to the HAND (i.e., no longer drawing).
          drawingManager.setDrawingMode(null);
          // Creating a new editable polygon from the overlay.
          polygon = event.overlay;
          polygon.setEditable(true);
          // Searching within the polygon.
          searchWithinPolygon(polygon);
          // Make sure the search is re-done if the poly is changed.
          polygon.getPath().addListener('set_at', searchWithinPolygon);
          polygon.getPath().addListener('insert_at', searchWithinPolygon);
        });
      }
      // This function populates the infowindow when the marker is clicked. We'll only allow
      // one infowindow which will open at the marker that is clicked, and populate based
      // on that markers position.
      function populateInfoWindow(marker, infowindow) {
        // Check to make sure the infowindow is not already opened on this marker.
        if (infowindow.marker != marker) {
          // Clear the infowindow content to give the streetview time to load.
          infowindow.setContent('');
          infowindow.marker = marker;
          // Make sure the marker property is cleared if the infowindow is closed.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
          var streetViewService = new google.maps.StreetViewService();
          var radius = 50;
          // In case the status is OK, which means the pano was found, compute the
          // position of the streetview image, then calculate the heading, then get a
          // panorama from that and set the options
          function getStreetView(data, status) {
            if (status == google.maps.StreetViewStatus.OK) {
              var nearStreetViewLocation = data.location.latLng;
              var heading = google.maps.geometry.spherical.computeHeading(
                nearStreetViewLocation, marker.position);
                infowindow.setContent('<div>' + marker.title + '</div><div id="pano"></div>');
                var panoramaOptions = {
                  position: nearStreetViewLocation,
                  pov: {
                    heading: heading,
                    pitch: 30
                  }
                };
              var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('pano'), panoramaOptions);
            } else {
              infowindow.setContent('<div>' + marker.title + '</div>' +
                '<div>No Street View Found</div>');
            }
          }
          // Use streetview service to get the closest streetview image within
          // 50 meters of the markers position
          streetViewService.getPanoramaByLocation(marker.position, radius, getStreetView);
          // Open the infowindow on the correct marker.
          infowindow.open(map, marker);
        }
      }
      // This function will loop through the markers array and display them all.
      function showListings() {
        var bounds = new google.maps.LatLngBounds();
        // Extend the boundaries of the map for each marker and display the marker
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
          bounds.extend(markers[i].position);
        }
        map.fitBounds(bounds);
      }
      // This function will loop through the listings and hide them all.
      function hideMarkers(markers) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
      }
      // This function takes in a COLOR, and then creates a new marker
      // icon of that color. The icon will be 21 px wide by 34 high, have an origin
      // of 0, 0 and be anchored at 10, 34).
      function makeMarkerIcon(markerColor) {
        var markerImage = new google.maps.MarkerImage(
          'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|'+ markerColor +
          '|40|_|%E2%80%A2',
          new google.maps.Size(21, 34),
          new google.maps.Point(0, 0),
          new google.maps.Point(10, 34),
          new google.maps.Size(21,34));
        return markerImage;
      }
      // This shows and hides (respectively) the drawing options.
      function toggleDrawing(drawingManager) {
        if (drawingManager.map) {
          drawingManager.setMap(null);
          // In case the user drew anything, get rid of the polygon
          if (polygon !== null) {
            polygon.setMap(null);
          }
        } else {
          drawingManager.setMap(map);
        }
      }
      // This function hides all markers outside the polygon,
      // and shows only the ones within it. This is so that the
      // user can specify an exact area of search.
      function searchWithinPolygon() {
        for (var i = 0; i < markers.length; i++) {
          if (google.maps.geometry.poly.containsLocation(markers[i].position, polygon)) {
            markers[i].setMap(map);
          } else {
            markers[i].setMap(null);
          }
        }
      }
      // This function takes the input value in the find nearby area text input
      // locates it, and then zooms into that area. This is so that the user can
      // show all listings, then decide to focus on one area of the map.
      function zoomToArea() {
        // Initialize the geocoder.
        var geocoder = new google.maps.Geocoder();
        // Get the address or place that the user entered.
        var address = document.getElementById('zoom-to-area-text').value;
        // Make sure the address isn't blank.
        if (address == '') {
          window.alert('You must enter an area, or address.');
        } else {
          // Geocode the address/area entered to get the center. Then, center the map
          // on it and zoom in
          geocoder.geocode(
            { address: address,
              componentRestrictions: {locality: 'India'}
            }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                map.setZoom(15);
              } else {
                window.alert('We could not find that location - try entering a more' +
                    ' specific place.');
              }
            });
          }
        }
      // This function allows the user to input a desired travel time, in
      // minutes, and a travel mode, and a location - and only show the listings
      // that are within that travel time (via that travel mode) of the location
      function searchWithinTime() {
        // Initialize the distance matrix service.
        var distanceMatrixService = new google.maps.DistanceMatrixService;
        var address = document.getElementById('search-within-time-text').value;
        // Check to make sure the place entered isn't blank.
        if (address == '') {
          window.alert('You must enter an address.');
        } else {
          hideMarkers(markers);
          // Use the distance matrix service to calculate the duration of the
          // routes between all our markers, and the destination address entered
          // by the user. Then put all the origins into an origin matrix.
          var origins = [];
          for (var i = 0; i < markers.length; i++) {
            origins[i] = markers[i].position;
          }
          var destination = address;
          var mode = document.getElementById('mode').value;
          // Now that both the origins and destination are defined, get all the
          // info for the distances between them.
          distanceMatrixService.getDistanceMatrix({
            origins: origins,
            destinations: [destination],
            travelMode: google.maps.TravelMode[mode],
            unitSystem: google.maps.UnitSystem.IMPERIAL,
          }, function(response, status) {
            if (status !== google.maps.DistanceMatrixStatus.OK) {
              window.alert('Error was: ' + status);
            } else {
              displayMarkersWithinTime(response);
            }
          });
        }
      }
      // This function will go through each of the results, and,
      // if the distance is LESS than the value in the picker, show it on the map.
      function displayMarkersWithinTime(response) {
        var maxDuration = document.getElementById('max-duration').value;
        var origins = response.originAddresses;
        var destinations = response.destinationAddresses;
        // Parse through the results, and get the distance and duration of each.
        // Because there might be  multiple origins and destinations we have a nested loop
        // Then, make sure at least 1 result was found.
        var atLeastOne = false;
        for (var i = 0; i < origins.length; i++) {
          var results = response.rows[i].elements;
          for (var j = 0; j < results.length; j++) {
            var element = results[j];
            if (element.status === "OK") {
              // The distance is returned in feet, but the TEXT is in miles. If we wanted to switch
              // the function to show markers within a user-entered DISTANCE, we would need the
              // value for distance, but for now we only need the text.
              var distanceText = element.distance.text;
              // Duration value is given in seconds so we make it MINUTES. We need both the value
              // and the text.
              var duration = element.duration.value / 60;
              var durationText = element.duration.text;
              if (duration <= maxDuration) {
                //the origin [i] should = the markers[i]
                markers[i].setMap(map);
                atLeastOne = true;
                // Create a mini infowindow to open immediately and contain the
                // distance and duration
                var infowindow = new google.maps.InfoWindow({
                  content: durationText + ' away, ' + distanceText +
                    '<div><input type=\"button\" value=\"View Route\" onclick =' +
                    '\"displayDirections(&quot;' + origins[i] + '&quot;);\"></input></div>'
                });
                infowindow.open(map, markers[i]);
                // Put this in so that this small window closes if the user clicks
                // the marker, when the big infowindow opens
                markers[i].infowindow = infowindow;
                google.maps.event.addListener(markers[i], 'click', function() {
                  this.infowindow.close();
                });
              }
            }
          }
        }
        if (!atLeastOne) {
          window.alert('We could not find any locations within that distance!');
        }
      }
      // This function is in response to the user selecting "show route" on one
      // of the markers within the calculated distance. This will display the route
      // on the map.
      function displayDirections(origin) {
        hideMarkers(markers);
        var directionsService = new google.maps.DirectionsService;
        // Get the destination address from the user entered value.
        var destinationAddress =
            document.getElementById('search-within-time-text').value;
        // Get mode again from the user entered value.
        var mode = document.getElementById('mode').value;
        directionsService.route({
          // The origin is the passed in marker's position.
          origin: origin,
          // The destination is user entered address.
          destination: destinationAddress,
          travelMode: google.maps.TravelMode[mode]
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            var directionsDisplay = new google.maps.DirectionsRenderer({
              map: map,
              directions: response,
              draggable: true,
              polylineOptions: {
                strokeColor: 'green'
              }
            });
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      // This function fires when the user selects a searchbox picklist item.
      // It will do a nearby search using the selected query string or place.
      function searchBoxPlaces(searchBox) {
        hideMarkers(placeMarkers);
        var places = searchBox.getPlaces();
        if (places.length == 0) {
          window.alert('We did not find any places matching that search!');
        } else {
        // For each place, get the icon, name and location.
          createMarkersForPlaces(places);
        }
      }
      // This function firest when the user select "go" on the places search.
      // It will do a nearby search using the entered query string or place.
      function textSearchPlaces() {
        var bounds = map.getBounds();
        hideMarkers(placeMarkers);
        var placesService = new google.maps.places.PlacesService(map);
        placesService.textSearch({
          query: document.getElementById('places-search').value,
          bounds: bounds
        }, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            createMarkersForPlaces(results);
          }
        });
      }
      // This function creates markers for each place found in either places search.
      function createMarkersForPlaces(places) {
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0; i < places.length; i++) {
          var place = places[i];
          var icon = {
            url: place.icon,
            size: new google.maps.Size(35, 35),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(15, 34),
            scaledSize: new google.maps.Size(25, 25)
          };
          // Create a marker for each place.
          var marker = new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location,
            id: place.place_id
          });
          // Create a single infowindow to be used with the place details information
          // so that only one is open at once.
          var placeInfoWindow = new google.maps.InfoWindow();
          // If a marker is clicked, do a place details search on it in the next function.
          marker.addListener('click', function() {
            if (placeInfoWindow.marker == this) {
              console.log("This infowindow already is on this marker!");
            } else {
              getPlacesDetails(this, placeInfoWindow);
            }
          });
          placeMarkers.push(marker);
          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        }
        map.fitBounds(bounds);
      }
    // This is the PLACE DETAILS search - it's the most detailed so it's only
    // executed when a marker is selected, indicating the user wants more
    // details about that place.
    function getPlacesDetails(marker, infowindow) {
      var service = new google.maps.places.PlacesService(map);
      service.getDetails({
        placeId: marker.id
      }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          // Set the marker property on this infowindow so it isn't created again.
          infowindow.marker = marker;
          var innerHTML = '<div>';
          if (place.name) {
            innerHTML += '<strong>' + place.name + '</strong>';
          }
          if (place.formatted_address) {
            innerHTML += '<br>' + place.formatted_address;
          }
          if (place.formatted_phone_number) {
            innerHTML += '<br>' + place.formatted_phone_number;
          }
          if (place.opening_hours) {
            innerHTML += '<br><br><strong>Hours:</strong><br>' +
                place.opening_hours.weekday_text[0] + '<br>' +
                place.opening_hours.weekday_text[1] + '<br>' +
                place.opening_hours.weekday_text[2] + '<br>' +
                place.opening_hours.weekday_text[3] + '<br>' +
                place.opening_hours.weekday_text[4] + '<br>' +
                place.opening_hours.weekday_text[5] + '<br>' +
                place.opening_hours.weekday_text[6];
          }
          if (place.photos) {
            innerHTML += '<br><br><img src="' + place.photos[0].getUrl(
                {maxHeight: 100, maxWidth: 200}) + '">';
          }
          innerHTML += '</div>';
          infowindow.setContent(innerHTML);
          infowindow.open(map, marker);
          // Make sure the marker property is cleared if the infowindow is closed.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
        }
      });
    }
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