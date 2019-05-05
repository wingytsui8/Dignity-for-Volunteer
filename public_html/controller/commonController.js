// MUST insert first before other controllers
var app = angular.module("digVol", []);
app.controller("CommonController", function($scope) {
$scope.menuStyle = {
  	"color" : "#e28a00",
  	"background-color" : "black",
  }
	$scope.mainStyle = {
  	"color" : "white",
  	"background-color" : "black",
  }


  $scope.bodyStyle = {
  	"color" : "black",
  	"background-color" : "white",
  }

  $scope.header1Style = {
  	"color" : "#e28a00",
  	"font-weight" : "700",
  	"letter-spacing": "1px",
  	"font-size": "25px";
  }

  $scope.tableStyle = {
  	"color" : "orange",
  	"padding" : "50px"
  }

  $scope.footerStyle = {
  	"color" : "#ffb835",
  	"background-color" : "black",
  	"padding" : "10px"
  }
});