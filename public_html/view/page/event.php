<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Event</title>
	<base href="{{base_url}}" />
	<meta name="viewport" content="width=1200" />
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
	<script src="../controller/ng-common.js" type="text/javascript"></script>
	<script src="../controller/pages.js" type="text/javascript"></script>

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20190117142750" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<!-- <link href="css/event.css?ts=1556705653" rel="stylesheet" type="text/css" /> -->
	<ga-code/>
	<script type="text/javascript">
		window.useTrailingSlashes = true;
	</script>
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="eventPage" ng-app="digVol" >
	<commonheader></commonheader>
	<div id="event" ng-app="digVol" ng-controller="CommonController" ng-style="bodyStyle"  ng-init="pageTitle='Event'">
		<div id="pastEventTable" ng-app="digVol" ng-controller="PastEventController">
			<h1>Past Event</h1>
			<table st-table="pastEvents" class="table table-striped">
				<thead>
					<tr>
						<th>Event Name</th>
						<th>Period</th>
						<th>Venue</th>
						<th>Contact Person</th>
						<th>Application Deadline</th>
						<th>Quota</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="row in pastEvents">
						<td>{{row.name}}</td>
						<td>{{row.fromDate}} - {{row.toDate}}</td>
						<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
						<td><strong>{{row.contactName}}</strong>:<br> {{row.contactEmail}}</td>
						<td>{{row.applicationDeadline}}</td>
						<td>{{row.quota}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<commonfooter></commonfooter>
</body>
</html>