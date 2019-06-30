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
	<meta property="og:title" content="About" />
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
	<commonheader></commonheader>
	<div class="loader" ng-show="loading"> 
	</div>
	<div class="textbody">
	<div ng-app="digVol" ng-style="bodyStyle" ng-controller="UpcomingEventController">
		<!-- <div id="upcomingEvent"> -->
			<h1>Upcoming Event</h1>
			<div id="upcomingEventTable">
				<table st-table="upcommingEvents" class="table table-striped">
					<thead>
						<tr>
							<th style="min-width: 70vw;">Event</th>
							<th style="min-width: 10vw;"><text ng-style="{visibility: (lEmail!=null && lEmail.length > 0)?'visible':'hidden'}">Registration</text></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in upcomingEvents">
							<td>
								<strong>{{row.name}}</strong><br>
								{{row.fromDate}} - {{row.toDate}}<br>
								{{row.venue}}<br>
								{{row.location}}<br><br>
								Contact Person: <br>
								<strong>{{row.contactName}}</strong><br> 
								{{row.contactEmail}}<br>
								<br>
								Deadline: {{row.applicationDeadline}} <br>
								Quota : {{row.quota}}
								<br><br>
								{{row.remarks}}
							</td>

							<td><text ng-style="{visibility: (lEmail!=null && lEmail.length > 0)?'visible':'hidden'}"> 
								<input type="checkbox" ng-model="row.isRegistered">
							</text></td>
						</tr>
					</tbody>
				</table>
				<button type="button" ng-click="confirmRegister()">Save</button> 
			</div>
		</div>
	</div>
	<commonfooter></commonfooter>
</body>
</html>









