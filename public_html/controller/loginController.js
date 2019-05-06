angular.module('digVol').controller('loginController', ['$scope', '$http', function($scope, $http){

	$scope.email = "";
	$scope.password = "";
	$scope.islogged = false;
	$scope.isValid = true;

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
					$scope.islogged = responseData;
				}
			});
		}else{
			$scope.isValid = false;
		}
    }

}]);