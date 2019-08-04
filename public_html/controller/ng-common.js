// MUST insert first before other controllers
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"

var app = angular.module("digVol", ["oc.lazyLoad", "ngRoute"]);
var pages = [
"Home",
"Events",
"Upcoming",
"Register",
"Management"
];
var title = document.getElementsByTagName("title")[0].innerHTML.replace("Dignity For Volunteer - ", "");

var commonHeaderHtml = "<div><ul class=\"topnav\">" + 
	// icon image
	"<li><a href=\"http://dignityforchildren.org/\" target=\"1\"><img class=\"logoIcon\" alt=\"gallery/dignity_logo\" src=\"gallery_gen/37c944c27b869908c211dea96575621f_190x60.png\"></a></li>";
// menu
for (var i = 0; i < pages.length; i++){
	commonHeaderHtml += "<li>";
	if (pages[i] == title){
		commonHeaderHtml += "<a class=\"active\" ";
	}else{
		commonHeaderHtml += "<a ";
	}
	commonHeaderHtml += "href=\"" + pages[i] + "/\" target=\"_self\""
	if (pages[i] == "Management"){
		commonHeaderHtml += " ng-show=\"(lEmail!=null && lEmail.length > 0 && lEmail.toLocaleLowerCase()=='dignityforvolunteer@gmail.com')\""
	}
	commonHeaderHtml += ">" + pages[i] + "</a></li>";
}
// login button
commonHeaderHtml += "</ul><ul class=\"loginNav\">" ;
commonHeaderHtml += "<li class=\"liLogin\">" ;
//commonHeaderHtml += "<button>Sign up</button><button id=\"loginform\">Login</button>";

commonHeaderHtml += 
"<div id=\"wrap\" ng-controller=\"loginController\">" +
"<div id=\"regbar\">" +
"<div id=\"navthing\">" +
"<div ng-style=\"{visibility: (lEmail!=null && lEmail.length > 0) || pageTitle == 'Home'?'hidden':'visible'}\">" +
"<div class = \"loginPanel\">" +
"<button onclick=\"location.href='https://dignityforchildren.org/join-us/#volunteers'\">Sign up</button><button id=\"loginform\">Login</button>" + 
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

	$scope.$watch('pageTitle', function () {
		$rootScope.pageTitle = $scope.pageTitle;
	});

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
	// $scope.eventDetail = {id: null}
	// $scope.registeredList = {name: 'null'}
	$scope.action = "";
	$scope.getEvents = function($upcoming){
		if ($upcoming){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getEvent' ,  orderBy: 'ASC' ,  active: '0' ,  upcoming: $upcoming },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					$scope.action = "Edit Upcoming Event";
				}
			});

		}else{
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getEvent' ,  orderBy: 'DESC' ,  active: '0' ,  upcoming: $upcoming },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					$scope.action = "Edit Past Event";
				}
			});
		}
		$scope.events = responseData;
		
	}

	$scope.createEmptyEvent = function() {
		$scope.eventDetail = {id: null}
		$scope.registeredList = {name: 'null'}
		$scope.action = "Create New Event"
	}

	$scope.getEventDetail = function(id) {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getEventManageDetail' ,  id: id},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.eventDetail = responseData[0];
		$scope.eventDetail.fromDate = new Date($scope.eventDetail.fromDate);
		$scope.eventDetail.toDate = new Date($scope.eventDetail.toDate);
		$scope.eventDetail.applicationDeadline = new Date($scope.eventDetail.applicationDeadline);
		$scope.eventDetail.quota = Number($scope.eventDetail.quota);
		$scope.getRegisteredList();
		$scope.getEventPhoto();
	}

	$scope.postEvent = function() {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { 
				action: 'postEvent' ,  
				id: $scope.eventDetail.id, 
				name: $scope.eventDetail.name,
				fromDate: $scope.eventDetail.fromDate.toISOString().split('T')[0] + " " + $scope.eventDetail.fromDate.getHours() + ":" + $scope.eventDetail.fromDate.getMinutes() + ":" + $scope.eventDetail.fromDate.getSeconds() , 
				toDate: $scope.eventDetail.toDate.toISOString().split('T')[0] + " " + $scope.eventDetail.toDate.getHours() + ":" + $scope.eventDetail.toDate.getMinutes() + ":" + $scope.eventDetail.toDate.getSeconds() , 
				venue: $scope.eventDetail.venue, 
				location: $scope.eventDetail.location,
				contactName: $scope.eventDetail.contactName, 
				contactEmail: $scope.eventDetail.contactEmail,
				applicationDeadline: $scope.eventDetail.applicationDeadline.toISOString().split('T')[0], 
				quota: $scope.eventDetail.quota,
				active: $scope.eventDetail.active
			},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.sql = responseData;
		$scope.getEventDetail($scope.eventDetail.id);
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
	$scope.downloadRegisteredList = function (){
		var csv = 'No.,Volunteer id,Name,Email,Registered Date,Status\n';
		for (var i = $scope.registeredList.length-1;i >=0 ; i--){
			csv += (i+1) + ',';
			csv += $scope.registeredList[i].volId + ',';
			csv += $scope.registeredList[i].name + ',';
			csv += $scope.registeredList[i].email + ',';
			csv += $scope.registeredList[i].createDate + ',';
			csv += $scope.registeredList[i].status;
			csv += "\n";
		}
		console.log(csv);
		var current = new Date();
		var hiddenElement = document.createElement('a');
		hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
		hiddenElement.target = '_blank';
		hiddenElement.download =  $scope.eventDetail.name + ' Registered List ' + current.getYear() + '-'  + current.getMonth() + '-'  + current.getDate() + '.csv';
		hiddenElement.click();
	}

	$scope.eventPhoto = null;
	$scope.getEventPhoto = function() {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getEventPhoto' ,  id: $scope.eventDetail.id},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.eventPhoto = responseData;
	}
	$scope.createEmptyPhoto = function() {
		var responseData = {id: null, path: null, type: "poster", des: null};
		$scope.eventPhoto.push(responseData);
	}
	$scope.deletePhoto = function($id) {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'deletePhoto' ,  id: $id},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.getEventPhoto();
	}
	$scope.postEvent = function() {
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { 
				// action: 'postPhoto' ,  
				// id: $scope.eventDetail.id, 
				// name: $scope.eventDetail.name,
				// contactEmail: $scope.eventDetail.contactEmail,
				// applicationDeadline: $scope.eventDetail.applicationDeadline.toISOString().split('T')[0], 
				// quota: $scope.eventDetail.quota,
				// active: $scope.eventDetail.active
			},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		$scope.sql = responseData;
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
			data : { action: 'getEvent' ,  orderBy: 'DESC' ,  active: '1' ,  upcoming: 0 },
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

app.controller("PastEventDetailsController", ["$scope", "$rootScope", function($scope, $rootScope) {
	$rootScope.loading = true;
	$scope.id = 0;
	// $scope.eventDetail = null;
	var queryString = window.location.href.split('/');
	for (var i = queryString.length-1;i >=0 ; i--){
		if(queryString[i] != null && queryString[i].length>0){
			if(queryString[i] == "Event"){
				return;
			}else{
				$scope.id = queryString[i];
				break;
			}
		}
	}
	if ($scope.id > 0){
		$scope.init = function(){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getEventDisplayDetail' ,  id: $scope.id },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					$rootScope.loading = false;
				}
			});
			$scope.eventDetail = responseData[0];
			$scope.eventDetail.fromDate = new Date($scope.eventDetail.From);
			$scope.eventDetail.toDate = new Date($scope.eventDetail.To);

			
			$fromDate = $scope.eventDetail.fromDate .toDateString();
			$fromHour = String($scope.eventDetail.fromDate.getHours()).padStart(2,0)
			$fromMin = String($scope.eventDetail.fromDate.getMinutes()).padStart(2,0) 

			$toDate = $scope.eventDetail.toDate .toDateString();
			$toHour = String($scope.eventDetail.toDate.getHours()).padStart(2,0)
			$toMin = String($scope.eventDetail.toDate.getMinutes()).padStart(2,0) 

			if ($fromDate!=$toDate){
				$scope.eventDetail.time = $fromDate +  "  " + $fromHour + ":" +  $fromMin + "  -  " + $toDate + "  " + $toHour + ":" +  $toMin ;
			}else{
				$scope.eventDetail.time = $fromDate +  "  " + $fromHour + ":" +  $fromMin + "  -  " + $toHour + ":" +  $toMin;
			}		
		}
		$scope.init();
	}
}]);

app.controller("RecentEventsController", function($scope) {
	$scope.recentEvents = [];
	$scope.start = 0;
	$scope.eol = false;
	$scope.init = function(){
		$scope.getMoreRecentEvent();
	}
	$scope.getMoreRecentEvent = function(){
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getRecentEventsList' ,  start: $scope.recentEvents.length },
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEPT','OCT','NOV','DEC'];		
		for (var i =0;i<responseData.length; i++){
			$from = new Date(responseData[i].fromDate);
			$fromDay = $from.getDate();
			$fromMonth = months[$from.getMonth()];
			
			$to = new Date(responseData[i].toDate);
			$toDay = $to.getDate();
			$toMonth = months[$to.getMonth()];

			if ($fromDay!=$toDay){
				responseData[i].dayStr = $fromDay + "-" + $toDay;
			}else{
				responseData[i].dayStr = $fromDay;
			}

			if ($fromMonth!=$toMonth){
				responseData[i].monthStr = $fromMonth + "/" + $toMonth;
			}else{
				responseData[i].monthStr = $fromMonth;
			}


			$scope.recentEvents.push(responseData[i]);

		}
		if (responseData.length < 5){
			$scope.eol = true;
		}
	}
	$scope.init();
});

app.controller("UpcomingListController", ["$scope", "$rootScope", function($scope, $rootScope) {
	$scope.init = function(){
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getUpcomingList'},
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});

		var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEPT','OCT','NOV','DEC'];		
		for (var i =0;i<responseData.length; i++){
			$from = new Date(responseData[i].fromDate);
			$fromDay = $from.getDate();
			$fromMonth = months[$from.getMonth()];
			
			$to = new Date(responseData[i].toDate);
			$toDay = $to.getDate();
			$toMonth = months[$to.getMonth()];

			if ($fromDay!=$toDay){
				responseData[i].dayStr = $fromDay + "-" + $toDay;
			}else{
				responseData[i].dayStr = $fromDay;
			}

			if ($fromMonth!=$toMonth){
				responseData[i].monthStr = $fromMonth + "/" + $toMonth;
			}else{
				responseData[i].monthStr = $fromMonth;
			}

		}
		$scope.upcomingEvents = responseData;
	}
	$scope.init();
}]);

app.controller("UpcomingEventDetailsController", ["$scope", "$rootScope", function($scope, $rootScope) {
	$rootScope.loading = true;
	$scope.id = 0;
	// $scope.eventDetail = null;
	var queryString = window.location.href.split('/');
	for (var i = queryString.length-1;i >=0 ; i--){
		if(queryString[i] != null && queryString[i].length>0){
			if(queryString[i] == "UpcomingEvent"){
				return;
			}else{
				$scope.id = queryString[i];
				break;
			}
		}
	}
	if ($scope.id > 0){
		$scope.init = function(){
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { action: 'getUpcomingDisplayDetail' ,  id: $scope.id },
				dataType: "json",
				async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					$rootScope.loading = false;
				}
			});
			$scope.eventDetail = responseData[0];
			$scope.eventDetail.fromDate = new Date($scope.eventDetail.From);
			$scope.eventDetail.toDate = new Date($scope.eventDetail.To);

			
			$fromDate = $scope.eventDetail.fromDate .toDateString();
			$fromHour = String($scope.eventDetail.fromDate.getHours()).padStart(2,0)
			$fromMin = String($scope.eventDetail.fromDate.getMinutes()).padStart(2,0) 

			$toDate = $scope.eventDetail.toDate .toDateString();
			$toHour = String($scope.eventDetail.toDate.getHours()).padStart(2,0)
			$toMin = String($scope.eventDetail.toDate.getMinutes()).padStart(2,0) 

			if ($fromDate!=$toDate){
				$scope.eventDetail.time = $fromDate +  " , " + $fromHour + ":" +  $fromMin + "  -  " + $toDate + " , " + $toHour + ":" +  $toMin ;
			}else{
				$scope.eventDetail.time = $fromDate +  " , " + $fromHour + ":" +  $fromMin + "  -  " + $toHour + ":" +  $toMin;
			}		
		}
		$scope.init();
	}
}]);

app.controller("homeController", ["$scope", "$rootScope", function($scope, $rootScope) {
	$rootScope.homeInit = function(){
		$.ajax({
			url: '../connectDB.php',
			type: 'POST',
			data : { action: 'getPortfolio' ,  email: $rootScope.lEmail },
			dataType: "json",
			async: false,
			success: function(response) {
				responseData = JSON.parse(response);
			}
		});
		for (var i = 0 ;i<responseData[0].upcoming.length;i++){
			if (responseData[0].upcoming[i].registered == "1"){
				responseData[0].upcoming[i].isRegistered = true;
			}else if(responseData[0].upcoming[i].registered == "0"){
				responseData[0].upcoming[i].isRegistered = false;
			}
		}
		$scope.portfolio = responseData[0];
		$rootScope.loading = false;
	};
	$scope.addVolunteerWork = function(){
		if ($scope.work==null || $scope.work.postOption==null || $scope.work.fromDate==null || $scope.work.toDate==null || ($scope.work.postOption=="Other" 
			&& ($scope.work.post == null || $scope.work.post.length == 0))){
			alert("Please fill in all the necessary items before submission.");
	}else{
		if (confirm("Are you sure?")){
			$post = $scope.work.postOption;
			if ($post!="Teacher" || $post!="General"){
				$post = $scope.work.post;
			}
			$.ajax({
				url: '../connectDB.php',
				type: 'POST',
				data : { 
					action: 'addVolunteerWork', 
					email: $rootScope.lEmail, 
					from: $scope.work.fromDate.toISOString().split('T')[0],
					to: $scope.work.toDate.toISOString().split('T')[0],
					post: $post,
					remarks: $scope.work.remarks?$scope.work.remarks:""
				},
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
					}
					location.reload();
				}
			});
		}
	}
}
}]);



// app.controller("UpcomingEventController", ["$scope", "$rootScope", function($scope, $rootScope) {
// 	$scope.upcomingEvents = [];
// 	$rootScope.upcomingInitChange = function(email){
// 		$.ajax({
// 			url: '../connectDB.php',
// 			type: 'POST',
// 			data : { action: 'getRegisterEventDetails' ,  email: email },
// 			dataType: "json",
// 			async: false,
// 			success: function(response) {
// 				responseData = JSON.parse(response);
// 				for (var i = 0 ;i<responseData.length;i++){
// 					if (responseData[i].registered == "1"){
// 						responseData[i].isRegistered = true;
// 					}else if(responseData[i].registered == "0"){
// 						responseData[i].isRegistered = false;
// 					}
// 				}
// 			}
// 		});

// 		$scope.upcomingEvents = responseData;
// 	}
// 	var email = sessionStorage.getItem("lEmail");
// 	if (email!= null && email != "undefined" && email.length > 0){
// 		$scope.init = function(){
// 			$.ajax({
// 				url: '../connectDB.php',
// 				type: 'POST',
// 				data : { action: 'getRegisterEventDetails' ,  email: email },
// 				dataType: "json",
// 				async: false,
// 				success: function(response) {
// 					responseData = JSON.parse(response);
// 					for (var i = 0 ;i<responseData.length;i++){
// 						if (responseData[i].registered == "1"){
// 							responseData[i].isRegistered = true;
// 						}else if(responseData[i].registered == "0"){
// 							responseData[i].isRegistered = false;
// 						}
// 					}
// 				}
// 			});

// 			$scope.upcomingEvents = responseData;
// 		}
// 	}else{
// 		$scope.init = function(){
// 			$.ajax({
// 				url: '../connectDB.php',
// 				type: 'POST',
// 				data : { action: 'getEvent' ,  orderBy: 'ASC' ,  active: '1' ,  upcoming: 1 },
// 				dataType: "json",
// 				async: false,
// 				success: function(response) {
// 					responseData = JSON.parse(response);
// 				}
// 			});
// 			$scope.upcomingEvents = responseData;
// 		}
// 	}
// 	$scope.init();

// // ----------------------------------vvvv init ^vvvv------------------

// 	$scope.confirmRegister = function(){
// 		if (confirm("Are you sure?")){
// 			var registerData = [];
// 			for(var i = 0 ; i < $scope.upcomingEvents.length ; i++){
// 				registerData.push({
// 					"eventId" : $scope.upcomingEvents[i].id,
// 					"isRegistered" : $scope.upcomingEvents[i].isRegistered?1:0
// 				});
// 			}
// 			$.ajax({
// 				url: '../connectDB.php',
// 				type: 'POST',
// 				data : { action: 'registerEvents' ,  email: $rootScope.lEmail , registerData: registerData },
// 				dataType: "json",
// 				async: false,
// 				success: function(response) {
// 					responseData = JSON.parse(response);
// 					if (responseData){
// 						alert("change applied");
// 					}else{
// 						alert("Login session has passed. Please login again");
// 						sessionStorage.setItem("lEmail", "");
// 						$rootScope.lEmail = "";
// 						extEmail = "";
// 						location.reload();
// 					}
// 				}
// 			});
// 		}

// 	}

// 	$scope.init = function(){
// 		$.ajax({
// 			url: '../connectDB.php',
// 			type: 'POST',
// 			data : { action: 'getEvent' ,  orderBy: 'ASC' ,  active: '1' ,  upcoming: 1 },
// 			dataType: "json",
// 			async: false,
// 			success: function(response) {
// 				responseData = JSON.parse(response);
// 			}
// 		});
// 	}

// }]);
















