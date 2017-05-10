<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html class="google" lang="en-IN">
  <head>

    <meta charset="utf-8">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <meta content=
    "Maps Services">
    <title>
      Maps Services
    </title>
    <script src="https://www.google.com/js/google.js">
    </script>
    <link href=
    'https://fonts.googleapis.com/css?family=Oswald:400,300,700|Roboto:400,100,100italic,300,300italic,400italic,500,500italic|Product+Sans&amp;subset=latin,cyrillic-ext,greek,cyrillic,vietnamese,greek-ext,latin-ext&amp;mmfb=1'
    rel='stylesheet' type='text/css'>
    <link href="https://www.google.co.in/maps/about/css/main.css?mmfb=1" rel="stylesheet">
    <meta content=
    "Maps Services" name="keywords">
	<script src="https://www.gstatic.com/external_hosted/modernizr/modernizr.js">
    </script>
    <link href="<c:url value="/resources/images/favicon/favicon-32x32.png"/>" rel="shortcut icon">
    <meta content="About - Google Maps" property="og:title">
    <meta content="<c:url value="/resources/images/favicon/favicon-32x32.png"/>" property=
    "og:image">
    <meta content=
    "Maps Services"
    property="og:description">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link href="https://www.google.com/intl/in/maps/about/partners/indoormaps/" rel="canonical">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.google.co.in/maps/about/js/device-detection.min.js">
    </script>

  </head>
  <body class="page-indoormaps">
    <div class="nav-wrapper" ng-controller="NavCtrl">
      <div class="nav-toolbar">
        <div class="hamburger-outer" ng-click="nav.toggle()">
          <div class="hamburger-inner hamburger-open" ng-show="nav.state() == 'closed'">
            <svg enable-background="new 0.5 0.5 18 12" version="1.1" viewbox="0.5 0.5 18 12"
            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
            "http://www.w3.org/1999/xlink">
            <path d=
            "M0.5,7.5h18v-2h-18C0.5,5.5,0.5,7.5,0.5,7.5z M0.5,12.5h18v-2h-18C0.5,10.5,0.5,12.5,0.5,12.5z M0.5,0.5v2 h18v-2C18.5,0.5,0.5,0.5,0.5,0.5z">
            </path></svg>
          </div>
          <div class="hamburger-inner hamburger-close" ng-show="nav.state() == 'open'">
            <svg enable-background="new 0 0 17.5 17.5" version="1.1" viewbox="0 0 17.5 17.5" x=
            "0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
            "http://www.w3.org/1999/xlink" y="0px">
            <polygon fill="#FFFFFF" points=
            "16.5,2.7 14.8,1 8.7,7 2.7,1 1,2.7 7,8.7 1,14.8 2.7,16.5 8.7,10.5 14.8,16.5 16.5,14.8 10.5,8.7">
            </polygon></svg>
          </div>
        </div>
        <h1>
          <a data-g-action="Maia: Header" data-g-event="Maia: Header" data-g-label="Google Maps"
          href="https://www.google.co.in/maps/about/">
          <div class="lock-up">
            <div class="logo">
              <img src="<c:url value="/resources/images/materialize-logo.png"/>"/>
            </div>
            
          </div></a>
        </h1>
        <div class="nav-close-convenience" ng-click="nav.toggle()"></div>
        <div class="nav-right">
          <a class="download-button" href=
          "https://itunes.apple.com/us/app/google-maps/id585027354"><svg enable-background=
          "new 0 0 24 24" version="1.1" viewbox="0 0 24 24" x="0px" xml:space="preserve" xmlns=
          "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
          <path d=
          "M17.7,11.6c0,3.2,2.8,4.2,2.8,4.3c0,0.1-0.4,1.5-1.5,3c-0.9,1.3-1.8,2.6-3.2,2.6c-1.4,0-1.9-0.8-3.5-0.8 c-1.6,0-2.1,0.8-3.4,0.9c-1.4,0.1-2.4-1.4-3.3-2.7c-1.8-2.6-3.2-7.4-1.3-10.6c0.9-1.6,2.6-2.6,4.4-2.6c1.4,0,2.6,0.9,3.5,0.9 c0.8,0,2.4-1.1,4-1c0.7,0,2.6,0.3,3.9,2.1C19.9,7.7,17.7,8.9,17.7,11.6 M15.1,3.8c0.7-0.9,1.2-2.1,1.1-3.4c-1.1,0-2.3,0.7-3.1,1.6 c-0.7,0.8-1.3,2-1.1,3.3C13.2,5.4,14.4,4.7,15.1,3.8">
          </path></svg></a> <a class="download-button" href=
          "https://play.google.com/store/apps/details?id=com.google.android.apps.maps&amp;amp;hl=en"><svg enable-background="new 0 0 24 24"
          version="1.1" viewbox="0 0 24 24" x="0px" xml:space="preserve" xmlns=
          "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
          <path d=
          "M6.5,18.5c0,0.5,0.4,0.9,0.9,0.9h0.9v3.2c0,0.8,0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4v-3.2h1.8v3.2c0,0.8,0.6,1.4,1.4,1.4 s1.4-0.6,1.4-1.4v-3.2h0.9c0.5,0,0.9-0.4,0.9-0.9V9.3h-11V18.5z M4.2,9.3c-0.8,0-1.4,0.6-1.4,1.4v6.4c0,0.8,0.6,1.4,1.4,1.4 s1.4-0.6,1.4-1.4v-6.4C5.6,9.9,5,9.3,4.2,9.3z M19.8,9.3c-0.8,0-1.4,0.6-1.4,1.4v6.4c0,0.8,0.6,1.4,1.4,1.4c0.8,0,1.4-0.6,1.4-1.4 v-6.4C21.2,9.9,20.6,9.3,19.8,9.3z M15.2,3.9l1.2-1.2c0.2-0.2,0.2-0.5,0-0.7c-0.2-0.2-0.5-0.2-0.7,0l-1.4,1.4 c-0.7-0.4-1.6-0.6-2.4-0.6c-0.9,0-1.7,0.2-2.4,0.6L8.2,2.1C8,1.9,7.7,1.9,7.5,2.1c-0.2,0.2-0.2,0.5,0,0.7l1.2,1.2 c-1.4,1-2.3,2.6-2.3,4.4h11C17.5,6.5,16.6,4.9,15.2,3.9z M10.2,6.5H9.2V5.6h0.9V6.5z M14.8,6.5h-0.9V5.6h0.9V6.5z">
          </path></svg></a> <a class="download-button" href=
          "https://maps.google.com/?hl=en"><svg enable-background="new 0 0 24 24" version="1.1" viewbox=
          "0 0 24 24" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
          "http://www.w3.org/1999/xlink" y="0px">
          <path d=
          "M20,18.9c1.1,0,2-0.9,2-2l0-10c0-1.1-0.9-2-2-2H4c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2H0v2h24v-2H20z M4,6.9h16v10H4V6.9z">
          </path></svg></a>
        </div>
      </div>
      <nav class="nav-menu">
        <ul class="nav-list">
          <li class="nav-list-item">
            <a href="place-locate.jsp">
            <div class="nav-item-title">
             Place Locator
            </div>
            <div class="nav-item-description">
              Locate the places like restaurants,hospitals and many more.
            </div></a>
          </li>
          <li class="nav-list-item">
            <a href="runstatics.jsp">
            <div class="nav-item-title">
              RunStatics
            </div>
            <div class="nav-item-description">
              See the nearest location with your travel mode.
            </div></a>
          </li>
          <li class="nav-list-item">
            <a href="login.jsp">
            <div class="nav-item-title">
              Indoor Maps
            </div>
            <div class="nav-item-description">
              Integrate your floor plans with Google Maps.
            </div></a>
          </li>
          <li class="nav-list-item">
            <a href="plot.jsp">
            <div class="nav-item-title">
              Plot
            </div>
            <div class="nav-item-description">
              Search for plots
            </div></a>
          </li>
        </ul>
        <ul class="nav-social-links">
          <li class="nav-g-plus">
            <a href="http://plus.google.com/MapsServices"><svg enable-background="new 0 0 25 15" version=
            "1.1" viewbox="0 0 25 15" x="0px" xml:space="preserve" xmlns=
            "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
            <g>
              <polygon fill="#fff" points=
              "24,6 22,6 22,4 20,4 20,6 18,6 18,8 20,8 20,10 22,10 22,8 24,8"></polygon>
              <g>
                <path d=
                "M12.8,8.8c-0.1,1.3-1.3,3.4-4.3,3.4c-2.6,0-4.6-2.1-4.6-4.7s2.1-4.7,4.6-4.7 c1.5,0,2.4,0.6,3,1.1l0,0l2-2c-1.3-1.2-3-2-5-2C4.4,0,1,3.4,1,7.5S4.4,15,8.5,15c4.3,0,7.2-3,7.2-7.3c0-0.6-0.1-1.1-0.2-1.5h-7 v2.7H12.8z"
                fill="#fff"></path>
                <rect fill="none" height="15" width="15" x="1"></rect>
              </g>
              <rect fill="none" height="15" width="25"></rect>
            </g></svg></a>
          </li>
          <li class="nav-youtube">
            <a href="http://www.youtube.com/user/MapsServices"><svg enable-background=
            "new 0 0 77.205 76.441" version="1.1" viewbox="0 0 77.205 76.441" x="0px" xml:space=
            "preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
            "http://www.w3.org/1999/xlink" y="0px">
            <path d=
            "M59.252,54.203h-3.844l0.019-2.232c0-0.992,0.814-1.803,1.811-1.803h0.245 c0.998,0,1.813,0.811,1.813,1.803L59.252,54.203z M44.842,49.42c-0.976,0-1.772,0.655-1.772,1.457V61.73 c0,0.8,0.797,1.453,1.772,1.453c0.979,0,1.775-0.653,1.775-1.453V50.877C46.617,50.075,45.82,49.42,44.842,49.42z M68.242,43.349 v20.646c0,4.951-4.295,9.004-9.543,9.004H19.453c-5.252,0-9.545-4.053-9.545-9.004V43.349c0-4.951,4.293-9.004,9.545-9.004h39.246 C63.947,34.345,68.242,38.398,68.242,43.349z M22.07,66.236L22.067,44.49l4.865,0.001v-3.222l-12.968-0.02v3.168l4.048,0.011v21.808 H22.07z M36.653,47.728h-4.056v11.613c0,1.68,0.102,2.52-0.006,2.816c-0.33,0.9-1.812,1.856-2.39,0.098 c-0.099-0.309-0.012-1.238-0.014-2.834l-0.017-11.693h-4.033l0.012,11.51c0.003,1.764-0.039,3.08,0.014,3.678 c0.099,1.055,0.064,2.287,1.044,2.988c1.824,1.315,5.321-0.195,6.196-2.075l-0.008,2.397l3.257,0.004V47.728z M49.63,61.027 l-0.009-9.666c-0.003-3.684-2.759-5.89-6.501-2.909l0.018-7.187l-4.054,0.006l-0.02,24.804l3.331-0.05L42.7,64.48 C46.959,68.389,49.636,65.713,49.63,61.027z M62.323,59.746l-3.041,0.017c-0.002,0.12-0.006,0.26-0.008,0.411v1.697 c0,0.908-0.75,1.647-1.662,1.647h-0.595c-0.913,0-1.662-0.739-1.662-1.647v-0.188v-1.866v-2.409h6.964v-2.621 c0-1.915-0.049-3.831-0.207-4.926c-0.498-3.464-5.361-4.015-7.817-2.241c-0.771,0.555-1.359,1.295-1.703,2.292 c-0.346,0.997-0.517,2.358-0.517,4.087v5.762C52.075,69.342,63.712,67.986,62.323,59.746z M46.724,28.459 c0.208,0.508,0.533,0.92,0.976,1.231c0.435,0.306,0.993,0.46,1.659,0.46c0.584,0,1.103-0.158,1.554-0.483 c0.449-0.324,0.829-0.81,1.138-1.455l-0.076,1.591h4.521V10.576h-3.56v14.965c0,0.81-0.669,1.473-1.484,1.473 c-0.812,0-1.481-0.663-1.481-1.473V10.576h-3.714v12.969c0,1.651,0.029,2.753,0.077,3.311C46.388,27.41,46.515,27.943,46.724,28.459 z M33.021,17.598c0-1.846,0.155-3.286,0.46-4.325c0.308-1.035,0.861-1.868,1.662-2.496c0.799-0.63,1.821-0.945,3.065-0.945 c1.046,0,1.941,0.205,2.69,0.607c0.752,0.404,1.332,0.93,1.735,1.577c0.41,0.65,0.688,1.318,0.837,2.002 c0.151,0.692,0.227,1.739,0.227,3.148v4.862c0,1.783-0.072,3.096-0.21,3.929c-0.137,0.835-0.433,1.61-0.891,2.337 c-0.451,0.719-1.034,1.256-1.74,1.599c-0.714,0.347-1.53,0.516-2.454,0.516c-1.029,0-1.898-0.142-2.614-0.44 c-0.717-0.295-1.271-0.74-1.666-1.332c-0.399-0.593-0.681-1.315-0.85-2.156c-0.17-0.842-0.252-2.105-0.252-3.791V17.598z M36.562,25.236c0,1.09,0.812,1.979,1.797,1.979c0.987,0,1.794-0.889,1.794-1.979V15.001c0-1.088-0.807-1.977-1.794-1.977 c-0.985,0-1.797,0.889-1.797,1.977V25.236z M24.05,30.405h4.266l0.005-14.747l5.04-12.633h-4.665l-2.68,9.384L23.298,3h-4.616 l5.362,12.666L24.05,30.405z"
            fill="#FFFFFF"></path></svg></a>
          </li>
          <li class="nav-facebook">
            <a href="http://www.facebook.com/MapsServices"><svg enable-background="new 0 0 77.205 76.441"
            version="1.1" viewbox="0 0 77.205 76.441" x="0px" xml:space="preserve" xmlns=
            "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
            <path d=
            "M43.416,72.22v-31.93h11.498l1.721-12.445H43.416v-7.944c0-3.603,1.073-6.058,6.615-6.058 L57.1,13.84V2.71c-1.223-0.151-5.418-0.49-10.3-0.49c-10.191,0-17.169,5.799-17.169,16.449v9.176H18.105v12.445h11.525v31.93H43.416 z"
            fill="#FFFFFF" id="Facebook_1_"></path></svg></a>
          </li>
          <li class="nav-instagram">
            <a href="http://instagram.com/MapsServices"><svg enable-background=
            "new 0 0 77.205 76.441" version="1.1" viewbox="0 0 77.205 76.441" x="0px" xml:space=
            "preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
            "http://www.w3.org/1999/xlink" y="0px">
            <path clip-rule="evenodd" d=
            "M65.527,32.833h-6.094 c0.443,1.724,0.705,3.524,0.705,5.387c0,11.898-9.641,21.539-21.537,21.539c-11.895,0-21.537-9.641-21.537-21.539 c0-1.862,0.264-3.663,0.707-5.387h-6.094v29.619c0,1.484,1.205,2.689,2.695,2.689h48.459c1.49,0,2.695-1.205,2.695-2.689V32.833z M65.527,13.988c0-1.486-1.205-2.691-2.695-2.691h-8.074c-1.488,0-2.693,1.205-2.693,2.691v8.078c0,1.486,1.205,2.692,2.693,2.692 h8.074c1.49,0,2.695-1.206,2.695-2.692V13.988z M38.602,24.758c-7.434,0-13.461,6.025-13.461,13.461 c0,7.433,6.027,13.462,13.461,13.462c7.436,0,13.463-6.029,13.463-13.462C52.064,30.784,46.037,24.758,38.602,24.758 M65.527,73.221 h-53.85c-4.459,0-8.074-3.617-8.074-8.08V11.296c0-4.461,3.615-8.076,8.074-8.076h53.85c4.461,0,8.076,3.615,8.076,8.076v53.844 C73.604,69.604,69.988,73.221,65.527,73.221"
            fill="#FFFFFF" fill-rule="evenodd"></path></svg></a>
          </li>
          <li class="nav-twitter">
            <a href="http://twitter.com/MapsServices"><svg enable-background="new 0 0 77.205 76.441"
            version="1.1" viewbox="0 0 77.205 76.441" x="0px" xml:space="preserve" xmlns=
            "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
            <path d=
            "M73.603,16.511c-2.575,1.141-5.344,1.914-8.249,2.261c2.966-1.777,5.243-4.591,6.315-7.946 c-2.775,1.646-5.849,2.842-9.12,3.485c-2.619-2.791-6.352-4.534-10.482-4.534c-7.932,0-14.361,6.43-14.361,14.36 c0,1.126,0.127,2.222,0.371,3.272c-11.936-0.598-22.518-6.315-29.6-15.005c-1.236,2.121-1.945,4.589-1.945,7.22 c0,4.982,2.535,9.379,6.39,11.954c-2.354-0.075-4.569-0.721-6.505-1.796c-0.002,0.06-0.002,0.119-0.002,0.181 c0,6.958,4.951,12.763,11.521,14.082c-1.205,0.328-2.474,0.504-3.783,0.504c-0.927,0-1.825-0.09-2.702-0.258 c1.827,5.705,7.131,9.857,13.415,9.973c-4.915,3.854-11.106,6.148-17.835,6.148c-1.16,0-2.303-0.068-3.427-0.201 c6.355,4.076,13.905,6.453,22.015,6.453c26.416,0,40.861-21.883,40.861-40.862c0-0.622-0.014-1.241-0.043-1.857 C69.242,21.919,71.678,19.39,73.603,16.511z"
            fill="#FFFFFF"></path></svg></a>
          </li>
        </ul>
      </nav>
      <div class="nav-mobile-download">
        <a class="download-button download-maps" download-link="" href=
        "https://www.google.com/maps/about/">Download Maps Services</a>
      </div>
    </div>
    <div class="full-bg"></div>
    <div class="section header textcenter selfclear gweb-autoheight">
      <div class="content main-title">
        <div class="header-copy">
          <h1 class="element">
            Go inside with Maps Services
          </h1>
          <p>
            Create a more convenient and enjoyable visitor experience, available on
            Maps Serices with new exciting features.
          </p>
        </div>
      </div>
    </div>
    <div class="main-page selfclear">
      <div id="maia-main" role="main">
        <div class="maia-teleport" id="content"></div>
        <div class="section selfclear sidespace integrate-maps" id="how-it-works">
          <div class="intro">
            <h1>
              How does it work?
            </h1>
            <p>
              With indoor Maps Services, visitors can spend less time searching for building
              directories and more time discovering new points of interest. Simply zoom in and out
              of a building and go floor to floor with indoor maps.
            </p>
          </div>
          <div class="imagery">
            <div class="maia-cols">
              <div class="maia-col-3 zoom-in">
                <strong>Zoom in to navigate</strong>
                <p>
                  Zoom in to see the indoor floor plan of a building. You can also search within
                  the building once you're fully zoomed in.
                </p>
                <div class="zoom-in">
                  <strong>Improved location accuracy</strong>
                  <p>
                    Digital directory in the palm of your hand
                  </p>
                </div>
              </div>
              <div class="maia-col-3 switch-floor">
                <strong>Switch floors with a tap</strong>
                <p>
                  Use the level switcher in the bottom right-hand corner to move from floor to
                  floor in the building.
                </p>
                <div class="switch-floor">
                  <strong>Universal icons</strong>
                  <p>
                    Easily recognizable symbols represent different points of interest inside
                  </p>
                </div>
              </div>
              <div class="maia-col-6 video-container">
                <div class="demo-video">
                  <img alt="" class="mobile-indoormaps" src=
                  "https://www.google.co.in/maps/about/images/partners/indoormaps/mobile-cover.jpg">
                  <div class="phone-shell">
                    <img alt="" class="stretch" src=
                    "https://www.google.co.in/maps/about/images/partners/indoormaps/nexus5-phone.png">
                  </div><video class="integrate-video replay-video gweb-viewdetection" preload=
                  "auto"><source src="https://www.google.co.in/maps/about/assets/video/partners/demo-video.mp4"
                  type="video/mp4"> <source src=
                  "https://www.google.co.in/maps/about/assets/video/partners/demo-video.webm" type=
                  "video/webm"></video>
                </div>
                <div class="replay-area">
                  <a class="replay" href="javascript:void(0);"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <div class="section add-floormaps fullwidth selfcenter" id="floorplan">
          
          <div class="steps-area">
            <div class="steps">
              <div class="step">
                <div class="step-content step1">
                  <div class="step-title">
                    Airports
                  </div>
                  <p>
                    Find the building on the map.
                  </p>
                </div>
              </div>
              <div class="step">
                <div class="step-content step2">
                  <div class="step-title">
                    Malls
                  </div>
                  <p>
                    Plan your visit to the mall and park closer to the stores you know and love
                  </p>
                </div>
              </div>
              <div class="step">
                <div class="step-content step3">
                  <div class="step-title">
                    Stadiums
                  </div>
                  <p>
                    Don't miss the game! Locate the nearest restroom to your section
                  </p>
                </div>
              </div>
              <div class="step">
                <div class="step-content step4">
                  <div class="step-title">
                    Transit
                  </div>
                  <p>
                    Anticipate your transfer before arriving at the transit center
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="steps-content textcenter intro sidespace">
            <p>
              Our resources are currently focused on high density locations such as airports,
              malls, stadiums and transit stations
            </p>
            <p>
             Want to explore  <span class="bold">Maps Services:</span>
            </p><a class="maia-button" href=
            "register.jsp">Register</a>
			<a class="maia-button" href=
            "login.jsp">Login</a>
          </div>
        </div>
        <div class="section indoormaps-bucket divider wide-width sidespace selfcenter" id="more">
          <div class="intro">
            <h1>
              More on Maps
            </h1>
            <p>
              Learn more about indoor maps or place locator, plot and RunStatics on Maps Services.
            </p>
          </div>
          <div class="maia-cols buckets">
            <div class="maia-col-4 textcenter bucket-container">
              <a class="bucket match-height" href=
              "login.jsp"><img alt="" height=200px class="hi-dpi" src=
              "<c:url value="/resources/images/place-locator2.jpg"/>">
              <div class="content">
                <h2>
                  Place Locator
                </h2>
                <p>
                  Find out the places you want to go like restaurants, pizza places and hospital etc.
                </p>
              </div></a>
            </div>
            <div class="maia-col-4 textcenter bucket-container">
              <a class="bucket match-height" href="login.jsp"><img alt=""
              height=200px class="hi-dpi" src="<c:url value="/resources/images/place-locator.jpg"/>">
              <div class="content">
                <h2>
                  RunStatics
                </h2>
                <p>
                  Find out in your choice of travelling modes which place is nearest with your travel time.
                </p>
              </div></a>
            </div>
            <div class="maia-col-4 textcenter bucket-container">
              <a class="bucket match-height" href=
              "login.jsp"><img alt="" class="hi-dpi" src=
              "https://www.google.co.in/maps/about/images/partners/indoormaps-carousel3.jpg">
              <div class="content">
                <h2>
                  Plot
                </h2>
                <p>
                 Draw an area and find out the avalibale plots in that area.
                </p>
              </div></a>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="footer-social">
          <div class="follow-us">
            <div class="cta">
              Follow us on:
            </div>
            <ul class="footer-social-links">
              <li class="footer-g-plus">
                <a href="https://plus.google.com/MapsServices"><svg enable-background="new 0 0 25 15"
                version="1.1" viewbox="0 0 25 15" x="0px" xml:space="preserve" xmlns=
                "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
                <g>
                  <polygon fill="#fff" points=
                  "24,6 22,6 22,4 20,4 20,6 18,6 18,8 20,8 20,10 22,10 22,8 24,8"></polygon>
                  <g>
                    <path d=
                    "M12.8,8.8c-0.1,1.3-1.3,3.4-4.3,3.4c-2.6,0-4.6-2.1-4.6-4.7s2.1-4.7,4.6-4.7 c1.5,0,2.4,0.6,3,1.1l0,0l2-2c-1.3-1.2-3-2-5-2C4.4,0,1,3.4,1,7.5S4.4,15,8.5,15c4.3,0,7.2-3,7.2-7.3c0-0.6-0.1-1.1-0.2-1.5h-7 v2.7H12.8z"
                    fill="#fff"></path>
                    <rect fill="none" height="15" width="15" x="1"></rect>
                  </g>
                  <rect fill="none" height="15" width="25"></rect>
                </g></svg></a>
              </li>
              <li class="footer-youtube">
                <a href="https://www.youtube.com/user/MapsServices"><svg enable-background=
                "new 0 0 77.205 76.441" version="1.1" viewbox="0 0 77.205 76.441" x="0px"
                xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
                "http://www.w3.org/1999/xlink" y="0px">
                <path d=
                "M59.252,54.203h-3.844l0.019-2.232c0-0.992,0.814-1.803,1.811-1.803h0.245 c0.998,0,1.813,0.811,1.813,1.803L59.252,54.203z M44.842,49.42c-0.976,0-1.772,0.655-1.772,1.457V61.73 c0,0.8,0.797,1.453,1.772,1.453c0.979,0,1.775-0.653,1.775-1.453V50.877C46.617,50.075,45.82,49.42,44.842,49.42z M68.242,43.349 v20.646c0,4.951-4.295,9.004-9.543,9.004H19.453c-5.252,0-9.545-4.053-9.545-9.004V43.349c0-4.951,4.293-9.004,9.545-9.004h39.246 C63.947,34.345,68.242,38.398,68.242,43.349z M22.07,66.236L22.067,44.49l4.865,0.001v-3.222l-12.968-0.02v3.168l4.048,0.011v21.808 H22.07z M36.653,47.728h-4.056v11.613c0,1.68,0.102,2.52-0.006,2.816c-0.33,0.9-1.812,1.856-2.39,0.098 c-0.099-0.309-0.012-1.238-0.014-2.834l-0.017-11.693h-4.033l0.012,11.51c0.003,1.764-0.039,3.08,0.014,3.678 c0.099,1.055,0.064,2.287,1.044,2.988c1.824,1.315,5.321-0.195,6.196-2.075l-0.008,2.397l3.257,0.004V47.728z M49.63,61.027 l-0.009-9.666c-0.003-3.684-2.759-5.89-6.501-2.909l0.018-7.187l-4.054,0.006l-0.02,24.804l3.331-0.05L42.7,64.48 C46.959,68.389,49.636,65.713,49.63,61.027z M62.323,59.746l-3.041,0.017c-0.002,0.12-0.006,0.26-0.008,0.411v1.697 c0,0.908-0.75,1.647-1.662,1.647h-0.595c-0.913,0-1.662-0.739-1.662-1.647v-0.188v-1.866v-2.409h6.964v-2.621 c0-1.915-0.049-3.831-0.207-4.926c-0.498-3.464-5.361-4.015-7.817-2.241c-0.771,0.555-1.359,1.295-1.703,2.292 c-0.346,0.997-0.517,2.358-0.517,4.087v5.762C52.075,69.342,63.712,67.986,62.323,59.746z M46.724,28.459 c0.208,0.508,0.533,0.92,0.976,1.231c0.435,0.306,0.993,0.46,1.659,0.46c0.584,0,1.103-0.158,1.554-0.483 c0.449-0.324,0.829-0.81,1.138-1.455l-0.076,1.591h4.521V10.576h-3.56v14.965c0,0.81-0.669,1.473-1.484,1.473 c-0.812,0-1.481-0.663-1.481-1.473V10.576h-3.714v12.969c0,1.651,0.029,2.753,0.077,3.311C46.388,27.41,46.515,27.943,46.724,28.459 z M33.021,17.598c0-1.846,0.155-3.286,0.46-4.325c0.308-1.035,0.861-1.868,1.662-2.496c0.799-0.63,1.821-0.945,3.065-0.945 c1.046,0,1.941,0.205,2.69,0.607c0.752,0.404,1.332,0.93,1.735,1.577c0.41,0.65,0.688,1.318,0.837,2.002 c0.151,0.692,0.227,1.739,0.227,3.148v4.862c0,1.783-0.072,3.096-0.21,3.929c-0.137,0.835-0.433,1.61-0.891,2.337 c-0.451,0.719-1.034,1.256-1.74,1.599c-0.714,0.347-1.53,0.516-2.454,0.516c-1.029,0-1.898-0.142-2.614-0.44 c-0.717-0.295-1.271-0.74-1.666-1.332c-0.399-0.593-0.681-1.315-0.85-2.156c-0.17-0.842-0.252-2.105-0.252-3.791V17.598z M36.562,25.236c0,1.09,0.812,1.979,1.797,1.979c0.987,0,1.794-0.889,1.794-1.979V15.001c0-1.088-0.807-1.977-1.794-1.977 c-0.985,0-1.797,0.889-1.797,1.977V25.236z M24.05,30.405h4.266l0.005-14.747l5.04-12.633h-4.665l-2.68,9.384L23.298,3h-4.616 l5.362,12.666L24.05,30.405z"
                fill="#FFFFFF"></path></svg></a>
              </li>
              <li class="footer-facebook">
                <a href="https://www.facebook.com/MapsServices"><svg enable-background=
                "new 0 0 77.205 76.441" version="1.1" viewbox="0 0 77.205 76.441" x="0px"
                xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
                "http://www.w3.org/1999/xlink" y="0px">
                <path d=
                "M43.416,72.22v-31.93h11.498l1.721-12.445H43.416v-7.944c0-3.603,1.073-6.058,6.615-6.058 L57.1,13.84V2.71c-1.223-0.151-5.418-0.49-10.3-0.49c-10.191,0-17.169,5.799-17.169,16.449v9.176H18.105v12.445h11.525v31.93H43.416 z"
                fill="#FFFFFF" id="Facebook_1_"></path></svg></a>
              </li>
              <li class="footer-instagram">
                <a href="http://instagram.com/MapsServices"><svg enable-background=
                "new 0 0 77.205 76.441" version="1.1" viewbox="0 0 77.205 76.441" x="0px"
                xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink=
                "http://www.w3.org/1999/xlink" y="0px">
                <path clip-rule="evenodd" d=
                "M65.527,32.833h-6.094 c0.443,1.724,0.705,3.524,0.705,5.387c0,11.898-9.641,21.539-21.537,21.539c-11.895,0-21.537-9.641-21.537-21.539 c0-1.862,0.264-3.663,0.707-5.387h-6.094v29.619c0,1.484,1.205,2.689,2.695,2.689h48.459c1.49,0,2.695-1.205,2.695-2.689V32.833z M65.527,13.988c0-1.486-1.205-2.691-2.695-2.691h-8.074c-1.488,0-2.693,1.205-2.693,2.691v8.078c0,1.486,1.205,2.692,2.693,2.692 h8.074c1.49,0,2.695-1.206,2.695-2.692V13.988z M38.602,24.758c-7.434,0-13.461,6.025-13.461,13.461 c0,7.433,6.027,13.462,13.461,13.462c7.436,0,13.463-6.029,13.463-13.462C52.064,30.784,46.037,24.758,38.602,24.758 M65.527,73.221 h-53.85c-4.459,0-8.074-3.617-8.074-8.08V11.296c0-4.461,3.615-8.076,8.074-8.076h53.85c4.461,0,8.076,3.615,8.076,8.076v53.844 C73.604,69.604,69.988,73.221,65.527,73.221"
                fill="#FFFFFF" fill-rule="evenodd"></path></svg></a>
              </li>
              <li class="footer-twitter">
                <a href="https://twitter.com/MapsServices"><svg enable-background="new 0 0 77.205 76.441"
                version="1.1" viewbox="0 0 77.205 76.441" x="0px" xml:space="preserve" xmlns=
                "http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
                <path d=
                "M73.603,16.511c-2.575,1.141-5.344,1.914-8.249,2.261c2.966-1.777,5.243-4.591,6.315-7.946 c-2.775,1.646-5.849,2.842-9.12,3.485c-2.619-2.791-6.352-4.534-10.482-4.534c-7.932,0-14.361,6.43-14.361,14.36 c0,1.126,0.127,2.222,0.371,3.272c-11.936-0.598-22.518-6.315-29.6-15.005c-1.236,2.121-1.945,4.589-1.945,7.22 c0,4.982,2.535,9.379,6.39,11.954c-2.354-0.075-4.569-0.721-6.505-1.796c-0.002,0.06-0.002,0.119-0.002,0.181 c0,6.958,4.951,12.763,11.521,14.082c-1.205,0.328-2.474,0.504-3.783,0.504c-0.927,0-1.825-0.09-2.702-0.258 c1.827,5.705,7.131,9.857,13.415,9.973c-4.915,3.854-11.106,6.148-17.835,6.148c-1.16,0-2.303-0.068-3.427-0.201 c6.355,4.076,13.905,6.453,22.015,6.453c26.416,0,40.861-21.883,40.861-40.862c0-0.622-0.014-1.241-0.043-1.857 C69.242,21.919,71.678,19.39,73.603,16.511z"
                fill="#FFFFFF"></path></svg></a>
              </li>
            </ul>
          </div>
          
        </div>
        <div class="footer-maps">
          <ul class="category-list">
            <li class="category">
              <div class="category-header">
                About
              </div>
              <ul class="link-list">
                <li class="category-link">
                  <a href='index.jsp'>Maps Services</a>
                </li>
                <li class="category-link">
                  <a href='https://www.google.com'>Google</a>
                </li>
                <li class="category-link">
                  <a href='https://developers.google.com/maps/'>Google Maps API</a>
                </li>
               
              </ul>
            </li>
            
           
            <li class="category">
              <div class="category-header">
                Explore
              </div>
              <ul class="link-list">
                <li class="category-link">
                  <a href='login.jsp'>View all
                  Maps Services</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="footer-google">
          
          <ul class="google-info">
            <li>
              <a href="index.html">Maps Services</a>
            </li>
            <li>
              <a href="https://www.gogle.com">About Google</a>
            </li>
            <li>
              <a href="http://aaog.online">Copyright &copy; 2017</a>
            </li>
             <li>
              <a href="http://aaog.online"><i class="fa fa-code" aria-hidden="true"></i> By Shikhar Saran Srivastava</a>
            </li>
          </ul>
        </div>
      </footer>
      <script async defer src="https://apis.google.com/js/plusone.js">
      </script> 
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular.min.js">
      </script> 
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular-touch.min.js">
      </script> 
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular-animate.min.js">
      </script> 
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.9/angular-aria.min.js">
      </script> 
      <script src="https://www.gstatic.com/external_hosted/lodash/lodash.min.js">
      </script> 
      <script src=
      "https://www.gstatic.com/external_hosted/ng_ui_router/release/angular-ui-router.min.js">
      </script> 
      
      
    </div>
    <script src="https://www.google.co.in/maps/about/js/partners/indoormaps.min.js">
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