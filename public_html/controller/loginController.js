var extScope;
var extEmail;

angular.module('digVol').run(['$window',function($window, Utilities) {

    $window.addEventListener('load', function(e) {
    	var email = sessionStorage.getItem("lEmail");
    	if (email!= null && email != "undefined" && email.length > 0){
    		extEmail = email;
    		extScope.setLEmail(email);
    	}
    });

  }]).controller('loginController', ['$scope', '$http', function($scope, $http){

	extScope = $scope;
	$scope.email = "";
	$scope.password = "";
	$scope.isValid = true;
	$scope.lEmail = "";

	$scope.loginSubmit = function() {

		if ($scope.password.length > 0 && $scope.email.length > 0){

        	var hash = sha256_digest($scope.password);
        	$.ajax({
        		url: '../connectDB.php',
        		type: 'POST',
        		data : { action: 'login' ,  password: hash ,  email: $scope.email},
        		dataType: "json",
        		async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					if (responseData){
						$scope.lEmail = $scope.email;
						extEmail = $scope.lEmail;
					}
				}
			});
		}else{
			$scope.isValid = false;
		}
    }
    $scope.setLEmail = function(email) {
    	$scope.lEmail = email;
    	$scope.$apply();
    }

}]).run(['$window',function($window, Utilities) {

    $window.addEventListener('beforeunload', function(e) {
    	sessionStorage.setItem("lEmail", extEmail);
    });

  }]);


