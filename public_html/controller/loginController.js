angular.module('digVol').controller('loginController', ['$scope', '$http', function($scope, $http){

	$scope.email = "";
	$scope.password = "";
	$scope.islogged = false;
	$scope.isValid = true;

	$scope.loginSubmit = function() {

		if ($scope.password.length > 0 && $scope.email.length > 0){

        	$scope.islogged = true;
        	var hash = sha256_digest($scope.password);
        	

		}else{
			$scope.isValid = false;
		}
    }






}]);