// MUST insert first before other controllers
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"

var app = angular.module("digVol", ["oc.lazyLoad", "ngRoute"]);
var pages = [
"Home",
"List",
"Upcoming",
"Register"
];
var title = document.getElementsByTagName("title")[0].innerHTML.replace("Dignity For Volunteer - ", "");

var commonHeaderHtml = "<div><ul class=\"topnav\">" + 
	// icon image
	"<li><a href=\"http://dignityforchildren.org/\" target=\"1\"><img class=\"icon\" alt=\"gallery/dignity_logo\" src=\"gallery_gen/37c944c27b869908c211dea96575621f_190x60.png\"></a></li>";
// menu
for (var i = 0; i < pages.length; i++){
	commonHeaderHtml += "<li>";
	if (pages[i] == title){
		commonHeaderHtml += "<a class=\"active\" ";
	}else{
		commonHeaderHtml += "<a ";
	}
	commonHeaderHtml += "href=\"" + pages[i] + "/\" target=\"_self\">" + pages[i] + "</a></li>";
}
// login button
commonHeaderHtml += "</ul><ul class=\"loginNav\">" ;
commonHeaderHtml += "<li class=\"liLogin\">" ;
//commonHeaderHtml += "<button>Sign up</button><button id=\"loginform\">Login</button>";

commonHeaderHtml += 
"<div id=\"wrap\" ng-controller=\"loginController\">" +
"<div id=\"regbar\">" +
"<div id=\"navthing\">" +
"<div ng-style=\"{visibility: (lEmail!=null && lEmail.length > 0)?'hidden':'visible'}\">" +
"<div class = \"loginPanel\">" +
"<button>Sign up</button><button id=\"loginform\">Login</button>" + 
"</div>" +
"<div class=\"login\">" +
"<div class=\"arrow-up\"></div>" +
"<div class=\"formholder\">" + 
"<div class=\"randompad\">" +
"<fieldset>" +
"<label name=\"email\">Email</label>" +
"<input id=\"loginEmail\" type=\"email\" placeholder=\"example@example.com\" ng-model=\"email\"/>" +
"<label name=\"password\">Password</label>" + 
"<input id=\"loginPw\" placeholder = \"Date of birth (YYYMMDD)\" type=\"password\" ng-model=\"password\"/> " +
"<input type=\"submit\" value=\"Login\" ng-click=\"loginSubmit()\"/>" +
"</fieldset>" +
"</div>" +
"</div>" +
"</div>" +
"</div>" +
"<div ng-style=\"{visibility: (lEmail!=null && lEmail.length > 0)?'visible':'hidden'}\">" + 
"<div class=\"logged\">" +
"<fieldset>" + 
"<label name=\"loggedEmail\">{{lEmail}}</label>" + 
"</fieldset>" +
"</div>" +
"</div>" +
"</div>" +
"</div>" +
"</div>"

commonHeaderHtml += "</li>";

commonHeaderHtml += "</ul></div>";


var responseData = [];

// Directive
app.directive("commonheader", function() {
	return {
		restrict : 'E',
		template : commonHeaderHtml,
		styleUrls: ["../view/css/headerMenu.css"]
	};
});
app.directive("commonfooter", function() {
	return {
		restrict : 'E',
		template : "<div>© 2019 Dignity for Children Foundation (506188W).  Designed by <a href=\"https://github.com/neiamenase\">Sam Tang</a>, <a href=\"https://github.com/wingytsui8\">Winnie Tsui</a></div>"
	};
});


// Controller
app.controller("CommonController", ["$scope", "$ocLazyLoad", "$rootScope", "$route", function($scope, $ocLazyLoad, $rootScope, $route) {
	$rootScope.loading = true;

	$scope.reloadPage = function() {
		$route.reload();
	}

	$scope.menuStyle = {
		"color" : "#e28a00",
		"background-color" : "black",
	}
	$scope.mainStyle = {
		"color" : "white",
		"background-color" : "black",
	}

	$scope.bodyStyle = {
		"padding" : "50px",
		"color" : "black",
		"background-color" : "white",
	}

	$scope.header1Style = {
		"color" : "#e28a00",
		"font-weight" : "700",
		"letter-spacing": "1px",
		"font-size": "25px"
	}

	$scope.tableStyle = {
		"color" : "orange",
		"padding" : "50px"
	}
	$scope.eventDetail = {id: null}
	$scope.registeredList = {name: 'null'}
	$scope.getEventDetail = function(id) {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getEventDetail' ,  id: id},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.eventDetail = responseData[0];
		$scope.eventDetail.fromTime = new Date($scope.eventDetail.fromDate).toLocaleTimeString();
		$scope.eventDetail.fromDate = new Date($scope.eventDetail.fromDate);
		$scope.eventDetail.toTime = new Date($scope.eventDetail.toDate).toLocaleTimeString();
		$scope.eventDetail.toDate = new Date($scope.eventDetail.toDate).toLocaleDateString();
		$scope.eventDetail.applicationDeadline = new Date($scope.eventDetail.applicationDeadline);
		$scope.eventDetail.quota = Number($scope.eventDetail.quota);
		$scope.getRegisteredList();
	}

	$scope.postEvent = function() {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'postEvent' ,  id: $scope.eventDetail.id, name: $scope.eventDetail.name,},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.eventDetail = responseData;

	}
	$scope.getRegisteredList = function() {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getRegisteredList' ,  id: $scope.eventDetail.id},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.registeredList = responseData;
	}
	setTimeout(function(){
		$rootScope.loading = false;
		$ocLazyLoad.load('js/loginForm.js');
		$ocLazyLoad.load('js/sha256.js');
	}, 1000);

}]);

app.controller("PastEventController", function($scope) {
	$scope.pastEvents = [];
	$scope.init = function(){
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getEvent' ,  orderBy: 'DESC' ,  active: '1' ,  upcoming: 1 },
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.pastEvents = responseData;
	}
	$scope.init();
});

app.controller("UpcomingEventController", ["$scope", "$rootScope", function($scope, $rootScope) {
	$scope.upcomingEvents = [];
	$rootScope.upcomingInitChange = function(email){
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getRegisterEventDetails' ,  email: email },
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
				for (var i = 0 ;i<responseData.length;i++){
					if (responseData[i].registered == "1"){
						responseData[i].isRegistered = true;
					}else if(responseData[i].registered == "0"){
						responseData[i].isRegistered = false;
					}
				}
			}
		});

		$scope.upcomingEvents = responseData;
	}
	var email = sessionStorage.getItem("lEmail");
	if (email!= null && email != "undefined" && email.length > 0){
		$scope.init = function(){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getRegisterEventDetails' ,  email: email },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					for (var i = 0 ;i<responseData.length;i++){
						if (responseData[i].registered == "1"){
							responseData[i].isRegistered = true;
						}else if(responseData[i].registered == "0"){
							responseData[i].isRegistered = false;
						}
					}
				}
			});

			$scope.upcomingEvents = responseData;
		}
	}else{
		$scope.init = function(){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getEvent' ,  orderBy: 'ASC' ,  active: '1' ,  upcoming: 1 },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
				}
			});
			$scope.upcomingEvents = responseData;
		}
	}
	$scope.init();

// ----------------------------------vvvv init ^vvvv------------------

	$scope.confirmRegister = function(){
		if (confirm("Are you sure?")){
			var registerData = [];
			for(var i = 0 ; i < $scope.upcomingEvents.length ; i++){
				registerData.push({
					"eventId" : $scope.upcomingEvents[i].id,
					"isRegistered" : $scope.upcomingEvents[i].isRegistered?1:0
				});
			}
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'registerEvents' ,  email: $rootScope.lEmail , registerData: registerData },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					if (responseData){
						alert("change applied");
					}else{
						alert("Login session has passed. Please login again");
						sessionStorage.setItem("lEmail", "");
						$rootScope.lEmail = "";
						extEmail = "";
						location.reload();
					}
				}
			});
		}

	}

	$scope.init = function(){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getEvent' ,  orderBy: 'ASC' ,  active: '1' ,  upcoming: 1 },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
				}
			});
		}

}]);
























