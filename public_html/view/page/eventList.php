<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='List'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Past Events</title>
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

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20190117142750" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<link href="css/eventList.css?ts=1556705653" rel="stylesheet" type="text/css" />
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
	<main class="site-container">
		<commonheader></commonheader>
		<article class="sections">
			<div class="events-list">
				<div class="events-list_event">
					<a href="https://pokemongolive.com/dortmund/" class="ng-scope" style="">
						<div class="events-list__event__left">
							<div class="events-list__event__image">
								<img ng-src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg" src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg">
							</div>
						</div>
						<div class="events-list__event__content">
							<div class="events-list__event__title" style="">Event001</div>
							<div class="events-list__event__body" style="">Explore Pokémon Habitats at Westfalen Park, and conduct research with thousands of Trainers from around the world. Can't make it to Dortmund? Stay tuned for details on how to participate in Pokémon GO Fest from your home town.</div>
						</div>
					</a>
				</div>

				<div class="events-list_event">
					<a href="https://pokemongolive.com/dortmund/" class="ng-scope" style="">
						<div class="events-list__event__left">
							<div class="events-list__event__image">
								<img ng-src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg" src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg">
							</div>
						</div>
						<div class="events-list__event__content">
							<div class="events-list__event__title" style="">Event002</div>
							<div class="events-list__event__body" style="">Hello World</div>
						</div>
					</a>
				</div>
				<div class="events-list_event">
					<a href="https://pokemongolive.com/dortmund/" class="ng-scope" style="">
						<div class="events-list__event__left">
							<div class="events-list__event__image">
								<img ng-src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg" src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg">
							</div>
						</div>
						<div class="events-list__event__content">
							<div class="events-list__event__title" style="">Event002</div>
							<div class="events-list__event__body" style="">Hello World</div>
						</div>
					</a>
				</div>
				<div class="events-list_event">
					<a href="https://pokemongolive.com/dortmund/" class="ng-scope" style="">
						<div class="events-list__event__left">
							<div class="events-list__event__image">
								<img ng-src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg" src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg">
							</div>
						</div>
						<div class="events-list__event__content">
							<div class="events-list__event__title" style="">Event002</div>
							<div class="events-list__event__body" style="">Hello World</div>
						</div>
					</a>
				</div>
				<div class="events-list_event">
					<a href="https://pokemongolive.com/dortmund/" class="ng-scope" style="">
						<div class="events-list__event__left">
							<div class="events-list__event__image">
								<img ng-src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg" src="https://storage.googleapis.com/pokemongolive/events/058_170916_MAQ_084.jpg">
							</div>
						</div>
						<div class="events-list__event__content">
							<div class="events-list__event__title" style="">Event002</div>
							<div class="events-list__event__body" style="">Hello World</div>
						</div>
					</a>
				</div>
			</div>
		</article>
	</main>
	<commonfooter></commonfooter>
</body>

</html>








