<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='Upcoming'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Upcoming</title>
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
	<script src="../controller/ng-common.js"></script>
	<script src="../controller/loginController.js"></script>

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20190117142750" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<link href="css/upcoming.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/loginForm.css">
	<ga-code/>
	<script type="text/javascript">
		window.useTrailingSlashes = true;
	</script>
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="loader" ng-show="loading"> </div>
	<commonheader></commonheader>
	<div id="pastEventTable" ng-app="digVol" ng-controller="UpcomingEventDetailsController">
		<div id="container">
			<a href="{{eventDetail.Photo}}" target=1>
				<div class="slide-img"><img ng-src={{eventDetail.Photo}} src={{eventDetail.Photo}}></div>
				<h1 class="title"><span class="title-text">{{eventDetail.Description}}</span></h1>
			</a>
		</div>
		<div class="textbody below_slide">
			<h1> {{eventDetail.Name}}</h1>
			<img class="icon" ng-src="gallery/when.png" src="gallery/when.png">{{eventDetail.time}}<br>
			<img class="icon" ng-src="gallery/where.png" src="gallery/where.png">{{eventDetail.Place}}<br>
			<div><img class="icon" ng-src="gallery/info.png" src="gallery/info.png"><text>{{eventDetail.remarks}}</text></div>
		</div>
	</div>
	<commonfooter></commonfooter>
</body>
</html>