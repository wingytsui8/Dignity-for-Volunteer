// MUST insert first before other controllers
var app = angular.module("digVol", []);
app.controller("CommonController", function($scope) {
  $scope.tableStyle = {
  	"color" : "orange",
  	"padding" : "50px"
  }
});