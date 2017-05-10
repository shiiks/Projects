(function(){

var myApp = angular.module('myApp',[])

myApp.controller('mainController', ['$scope', function($scope) {

    $scope.feeds = [];
    var pageAccessToken = 'EAACEdEose0cBAAr7RFG4x2q6LcZAFm5YNWpDhQGAm7vA08abbRZAERqc1TY1jNkaGb90AfKCjdBIumSnnEu02M3r1hrUlyeQRC7jaxmi6zfNBHnWDTL3i9W9rgodJXNHALPPzsWOCHqP5VB90k83TQNfyE17jm8PlphatvZBgZDZD';
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '592280970945813',
            xfbml      : true,
            version    : 'v2.7'
        });

        FB.api(
            '/kiitmun/ratings',
            'GET',
            {
                access_token : pageAccessToken
            },
            function(response) {
                $scope.feeds.push(response);
                console.log(JSON.stringify(response));
            }
        );
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
   


}]);

}());


