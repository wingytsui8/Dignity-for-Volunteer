<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='Home'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Home</title>
	<base href="{{base_url}}" />
	<!-- <meta name="viewport" content="width=1200" /> -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Facebook Open Graph -->
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{curr_url}}" />
	<!-- Facebook Open Graph end -->

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js?v=20190117142751" type="text/javascript"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/angular-route.min.js" type="text/javascript"></script>
	<script src="js/ocLazyLoad.min.js" type="text/javascript"></script>
	<script src="../controller/ng-common.js" type="text/javascript"></script>
	<script src="../controller/loginController.js"></script>
	<script src="../controller/slideController.js" type="text/javascript"></script>

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20190117142750" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/loginForm.css">
	<link rel="stylesheet" href="css/home.css">
	<!-- <link href="css/event.css?ts=1556705653" rel="stylesheet" type="text/css" /> -->
	<ga-code/>
	<script type="text/javascript">
		window.useTrailingSlashes = true;
	</script>
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="loader" ng-show="loading"> </div>
	<commonheader></commonheader>
	<main>
		<div class="home_main" ng-show="lEmail==null || lEmail.length == 0" ng-controller="loginController">
			<div class="home_login">
				<div class="home_formholder">
					<div class="home_randompad">
						<fieldset>
							<label name="email">Email</label>
							<input id="loginEmail" type="email" placeholder="example@example.com" ng-model="email"/>
							<label name="password">Password</label>
							<input id="loginPw" placeholder = "Date of birth (YYYMMDD)" type="password" ng-model="password"/>
							<input type="submit" value="Login" ng-click="loginSubmit()"/>
						</fieldset>
					</div>
				</div>
			</div>
		</div>

		<div ng-show="(lEmail!=null && lEmail.length > 0)" ng-controller="homeController">

			<h1>Welcome! {{name}}</h1>
			<label>News</News>
			<label>Thank you for support! See you on {{nextEventDate}}, at {{nextEventplace}}</label>
		</div>

	</main>

	<commonfooter></commonfooter>
</body>

</body>
</html>