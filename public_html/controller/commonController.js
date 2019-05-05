// MUST insert first before other controllers
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"


var app = angular.module("digVol", []);
var responseData = [];

function getPastEvent() {
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
}

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
		"font-size": "25px"
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

app.controller("PastEventController", function($scope) {
	$scope.pastEvents = [];
	$scope.init = function(){
		getPastEvent();
		$scope.pastEvents = responseData;
	}
	$scope.init();
});

app.directive("commonfooter", function() {
    return {
    	restrict : 'E',
        template : "<div>© 2019 Dignity for Children Foundation (506188W).  Designed by <a href=\"https://github.com/neiamenase\">Sam Tang</a>, <a href=\"https://github.com/wingytsui8\">Winnie Tsui</a></div>"
    };
});
