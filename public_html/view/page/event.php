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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/angular-route.min.js" type="text/javascript"></script>
	<script src="js/ocLazyLoad.min.js" type="text/javascript"></script>
	<script src="../controller/ng-common.js" type="text/javascript"></script>
	<script src="../controller/loginController.js"></script>


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

<body id="eventPage" ng-app="digVol"  >
	<div class="loader" ng-show="loading"> </div>
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
						<th>Application Deadline</th>
						<th>Quota</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="row in pastEvents">
						<td>{{row.name}}</td>
						<td>{{row.fromDate}} - {{row.toDate}}</td>
						<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
						<td>{{row.applicationDeadline}}</td>
						<td>{{row.quota}}</td>
						<td><button ng-click="getEventDetail(row.id)">Details</button></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<h1>Create Event</h1>
			<label >Id</label> <br>
			{{eventDetail.id}} <br>
			<label >Name</label><br>
			<input id="name" type="text" ng-model="eventDetail.name"/><br>
			<label >From </label><br>
			<input id="formDate" type="date" ng-model="eventDetail.formDate"/>  
			<input id="formDate" type="time" ng-model="eventDetail.formTime"/><br>
			<label >To</label><br>
			<input id="toDate" type="date" ng-model="eventDetail.toDate | date:'dd/mm/YYYY'"/>
			<input id="toTime" type="time" ng-model="eventDetail.toTime"/><br>
			<label >Venue</label><br>
			<input id="venue" type="text" ng-model="eventDetail.venue"/><br>
			<label >Location</label><br>
			<input id="location" type="text" ng-model="eventDetail.location"/><br>
			<label >Contact Person Name</label><br>
			<input id="contactName" type="text" ng-model="eventDetail.contactName"/><br>
			<label >Contact Person Email</label><br>
			<input id="loginEmail" type="text" ng-model="eventDetail.contactEmail"/><br>
			<label >Application Deadline</label><br>
			<input id="applictionDeadline" type="date" ng-model="eventDetail.applicationDeadline"/><br>
			<label >Quota</label><br>
			<input id="quota" type="number" ng-model="eventDetail.quota"/><br>
			<label>Active</label><br>
			<select ng-model="eventDetail.active">
				<option value="1">Active
				<option value="0">Cancelled
			</select><br>
					<label >Registered Number: </label>{{eventDetail.registered}}
					<label >Remaing Quota: </label>{{eventDetail.quota - eventDetail.registered}}<br>
			<br><br><br>

				<button ng-click="postEvent()">Save</button>
				<!-- <button ng-click="getRegisteredList()">Get Registered List</button> -->
				</div>

					<div>
			<h1>Registered Volunteer</h1>
			<table st-table="registered" class="table table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Volunteer id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Registered Date</th>
						<th>Active</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="row in registeredList">
						<td>{{$index + 1}}</td>
						<td>{{row.volId}}</td>
						<td>{{row.name}}</td>
						<td>{{row.email}}</td>
						<td>{{row.createDate}}</td>
						<td>{{row.active == "0"? 'inactive':'active'}}</td>
						
					</tr>
				</tbody>
			</table>
			</div>
		</div>
		<commonfooter></commonfooter>

	</body>

	</html>