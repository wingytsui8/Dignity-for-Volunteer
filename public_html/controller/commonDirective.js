var app = angular.module("digVol", []);
app.directive("headermenu", function() {
    return {
    	restrict : 'E',
        template : "<h1>Made by aasd directive!</h1>"
    };
});