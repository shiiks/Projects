<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<!-- LB -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Hey! Just a  sec.</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="http://d1ohp0h9n9u652.cloudfront.net/assets/favicon-0d8da21f7e9900df77d7ef00df602771ef06e2f0df28862283d59b9915517283.ico">
  <style type="text/css">
    body {
      margin: 0;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	  
    }
    a {
      text-decoration: none;
      font-weight: 600;
      color: #00bcd4;
    }
    h1 {
      color: #444444;
      font-size: 36px;
      line-height: 44px;
      margin-bottom: 20px;
    }
    p {
      color: #666666;
      font-size: 16px;
      line-height: 24px;
    }
    .container {
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      margin: 0 auto;
      max-width: 1200px;
      min-height: 100vh;
      align-items: center;
    }
    .content {
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      width: 100%;
    }
    .message {
      margin-left: 30px;
      padding: 15px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      width: 50%;
    }
    .message-content {
      width: 75%;
    }
    .message-logo {
      width: 98px;
    }
    .image {
      text-align: right;
      width: 50%;
      margin-right: 30px;
    }
    .image > img {
      max-width: 365px;
    }
    .author {
      margin-top: 50px;
    }
    .author-credit {
      font-size: 12px;
    }
    .author-avatar {
      height: 25px;
    }

    @media screen and (max-width: 768px) {
      .content {
        flex-wrap: wrap;
        max-width: 391px;
        margin: 0 auto;
        position: relative;
      }
      .image {
        width: 100%;
        text-align: center;
        margin-right: 0;
      }
      .image > img {
        max-width: 359px;
      }
      .message {
        width: 100%;
        text-align: center;
        margin-left: 0;
      }
      .message-logo {
        position: absolute;
        top: 15px;
        left: 25px;
      }
      .message-content {
        margin: 0 auto;
        width: 100%;
      }
    }

    @media screen and (max-width: 414px) {
      .image > img {
        max-width: 243px;
      }
      .message {
        width: 100%;
        text-align: center;
      }
      .message-content {
        max-width: 414px;
      }
      .message-logo {
        position: absolute;
        top: 10px;
      }
      h1 {
        font-size: 28px;
        line-height: 37px;
      }
      
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <div class="image">
        <img src="http://dmypbau5frl9g.cloudfront.net/assets/common/50x-page/50x-image-616d02819eb978d9f07cd61de396b816.gif">
      </div>
      <div class="message">
        <img src="<c:url value="/resources/images/login-logo.png"/>" class="message-logo">
        <div class="message-content">
          <h1>Ooops! Looks like we broke something.</h1>
          <p>
            But don't worry. Our best minds are on it and will have it fixed shortly. In the meantime, try refreshing and check <a href="https://twitter.com/shikhar_447">@shikhar_447</a> if we aren't back up in a few minutes.
          </p>
          <p>Still not working? <a href="http://aoog.online">Contact Support.</a></p>
          <div class="author">
            <p class="author-credit">Page designed by Shikhar</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
