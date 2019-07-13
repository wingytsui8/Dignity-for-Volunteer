<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='Event'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Event</title>
	<base href="{{base_url}}" />
	<!-- <meta name="viewport" content="width=1200" /> -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Facebook Open Graph -->
	<meta property="og:title" content="Login" />
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
	<div id="container">
		<ul id="slides">
			<li class="slide active">
				<div class="slide-img"><img src="https://wallpapercave.com/wp/wp2438853.jpg"/></div>
				<h1 class="title"><span class="title-text">11111</span></h1>
			</li>
			<li class="slide">
				<div class="slide-img"><img src="https://wallpapercave.com/wp/wp3285738.jpg"/></div>
				<h1 class="title"><span class="title-text">22222</span></h1>
			</li>
			<li class="slide">
				<div class="slide-img"><img src="https://wallpapercave.com/wp/wp3285747.jpg"/></div>
				<h1 class="title"><span class="title-text">33333</span></h1>
			</li>
			<li class="slide">
				<div class="slide-img"><img src="https://wallpapercave.com/wp/wp2686919.jpg"/></div>
				<h1 class="title"><span class="title-text">44444</span></h1>
			</li>
			<li class="slide">
				<div class="slide-img"><img src="https://en.bcdn.biz/Images/2016/10/28/e68fb895-9ba1-4400-badf-d6741c1bb197.jpg"/></div>
				<h1 class="title"><span class="title-text">55555</span></h1>
			</li>
		</ul>
		<ul id="slide-select">
			<li class="btn prev"><</li>
			<li class="selector"></li>
			<li class="selector"></li>
			<li class="selector"></li>
			<li class="selector"></li>
			<li class="selector"></li>
			<li class="btn next">></li>
		</ul>
	</div>

	<div class="textbody below_slide">


		<div id="pastEventTable" ng-app="digVol" ng-controller="PastEventDetailsController">
		</div>
		<commonfooter></commonfooter></body>
	</div>
</body>
</html>