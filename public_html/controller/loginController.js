var extScope;
var extEmail;

angular.module('digVol').controller('loginController', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope){

	extScope = $scope;
	$scope.email = "";
	$scope.password = "";
	$scope.isValid = true;
	$rootScope.lEmail = "";


	$scope.loginSubmit = function() {

		if ($scope.password && $scope.email){

            $scope.email = $scope.email.toLowerCase();

        	var hash = sha256_digest($scope.password);
        	$.ajax({
        		url: '../connectDB.php',
        		type: 'POST',
        		data : { action: 'login' ,  password: hash ,  email: $scope.email.toLowerCase()},
        		dataType: "json",
        		async: false,
				success: function(response) {
					responseData = JSON.parse(response);
					if (responseData){
                        $scope.isValid = true;
						$rootScope.lEmail = $scope.email;
						extEmail = $rootScope.lEmail;
                        //$rootScope.upcomingInitChange(extEmail);
                        if ($rootScope.pageTitle == "Home"){
                            $rootScope.homeInit();
                        }
					}else{
                        $scope.isValid = false;
                        //$scope.$apply();
                    }
				}
			});
		}else{
			$scope.isValid = false;
            //$scope.$apply();
		}
    }
    $scope.setLEmail = function(email) {
        $rootScope.loading = true;
    	$rootScope.lEmail = email;
        if ($rootScope.pageTitle == "Home"){
            $rootScope.homeInit();
        }
        $rootScope.loading = false;
    	$scope.$apply();
    }

}]).run(['$window',function($window, Utilities) {

    $window.addEventListener('beforeunload', function(e) {
    	sessionStorage.setItem("lEmail", extEmail);
    });

    $window.addEventListener('load', function(e) {
    	var email = sessionStorage.getItem("lEmail");
    	if (email!= null && email != "undefined" && email.length > 0){
    		extEmail = email;
    		extScope.setLEmail(email);
    	}
    });
}]);


