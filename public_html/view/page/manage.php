<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='Management'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Management</title>
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
	<link href="css/manage.css?ts=1556705653" rel="stylesheet" type="text/css" />
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
	<div class='tab'>
		<a href="#events">Event List</a>
		<a href="#details">Details</a>
		<a href="#photo">Photo</a>
		<a href="#registeredList">Registered List</a>
	</div>
	<div class="textbody">

		<h1 id="events">Events</h1>
		<button ng-click="getEvents(0)">Past</button>
		<button ng-click="getEvents(1)">Upcoming</button>
		<button ng-click="openCity(event, 'Tokyo')">Activity</button>

		<table st-table="events" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 25%">Name</th>
					<th style="width: 15%">Period</th>
					<th style="width: 35%">Venue</th>
					<th style="width: 10%">Application Deadline</th>
					<th style="width: 5%">Quota</th>
					<th style="width: 10%"></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in events">
					<td>{{row.name}}</td>
					<td>{{row.fromDate}} - <br>{{row.toDate}}</td>
					<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
					<td>{{row.applicationDeadline}}</td>
					<td>{{row.quota}}</td>
					<td><button ng-click="getEventDetail(row.id)">Details</button></td>
				</tr>
			</tbody>
		</table>
		<div>
			<h1 id="details">{{action}}</h1>
			<button ng-click="createEmptyEvent()">New</button>
			<button ng-click="getEventDetail(eventDetail.id)">Reset</button>
			<button ng-click="postEvent()">Save</button>
			<table>
				<tr>
					<td class="tdheader">
						<label>Id</label> 
					</td>
					<td class="tdcontent">
						{{eventDetail.id}}
					</td>
					<td class="tdheader">
						<label >Name</label>
					</td>
					<td class="tdcontent">
						<input id="name" type="text" ng-model="eventDetail.name"/>		
					</td>
				</tr>
				<tr>
					<td class="tdheader">
						<label >From </label>
					</td>
					<td class="tdcontent">
						<input id="fromDate" type="date" ng-model="eventDetail.fromDate"/>  
						<input id="fromTime" type="time" ng-model="eventDetail.fromDate"/><br>
						<input id="fromDate1" type="text" ng-model="eventDetail.fromDate"/><br>
					</td>
					<td class="tdheader">
						<label >To</label>
					</td>
					<td class="tdcontent">
						<input id="toDate" type="date" ng-model="eventDetail.toDate"/>
						<input id="toTime" type="time" ng-model="eventDetail.toDate"/><br>
						<input id="toDate1" type="text" ng-model="eventDetail.toDate"/><br>
					</td>
				</tr>
				<tr>
					<td class="tdheader">
						<label >Venue</label>
					</td>
					<td class="tdcontent">
						<input id="venue" type="text" ng-model="eventDetail.venue"/>
					</td>
					<td class="tdheader">
						<label >Location</label>
					</td>
					<td class="tdcontent">
						<input id="location" type="text" ng-model="eventDetail.location"/>
					</td>
				</tr>
				<tr>
					<td class="tdheader">
						<label >Contact Person Name</label>
					</td>
					<td class="tdcontent">
						<input id="contactName" type="text" ng-model="eventDetail.contactName"/>
					</td>
					<td class="tdheader">
						<label >Contact Person Email</label>
					</td>
					<td class="tdcontent">
						<input id="loginEmail" type="text" ng-model="eventDetail.contactEmail"/>
					</td>
				</tr>
			</td>
			<tr>
				<td class="tdheader">
					<label >Application Deadline</label>
				</td>
				<td class="tdcontent">
					<input id="applictionDeadline" type="date" ng-model="eventDetail.applicationDeadline"/><br>
					<input id="applictionDeadline1" type="text" ng-model="eventDetail.applicationDeadline"/>
				</td>
				<td class="tdheader">
					<label >Quota</label>
				</td>
				<td class="tdcontent">
					<input id="quota" type="number" ng-model="eventDetail.quota"/>
				</td>
			</tr>
			<tr>
				<td class="tdheader">
					<label >Registered Number: </label> 
				</td>
				<td class="tdcontent">
					{{eventDetail.registered}}
				</td>
				<td class="tdheader">
					<label >Remaing Quota: </label>
				</td>
				<td class="tdcontent"> 
					{{eventDetail.quota - eventDetail.registered}}
				</td>
			</tr>
			<tr>
				<td class="tdheader">						
					<label>Upcoming Display</label>
				</td>
				<td class="tdcontent">
					<select ng-model="eventDetail.upcomingDisplay">
						<option value="1">Display</option>
						<option value="0">Hidden</option>
					</select>
				</td>
				<td class="tdheader">
					<label >Past Display</label> 
				</td>
				<td class="tdcontent">
					<select ng-model="eventDetail.pastDisplay">
						<option value="1">Display</option>
						<option value="0">Hidden</option>
					</select>
				</td>

			</tr>
			<tr>
				<td class="tdheader">						
					<label>Active</label>
				</td>
				<td class="tdcontent">
					<select ng-model="eventDetail.active">
						<option value="1">Active</option>
						<option value="0">Cancelled</option>
					</select>
				</td>
				<td></td>
				<td></td>
			</tr>
		</table>		
		
	</div>
	<div>
		<h1 id="registeredList">Registered Volunteer</h1> <button ng-click="downloadRegisteredList()">Download CSV</button> 
		<table st-table="registered" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 5%;">No.</th>
					<th style="width: 10%;">Volunteer id</th>
					<th style="width: 30%;">Name</th>
					<th style="width: 30%;">Email</th>
					<th style="width: 15%;">Registered Date</th>
					<th style="width: 10%;">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in registeredList">
					<td>{{$index + 1}}</td>
					<td>{{row.volId}}</td>
					<td>{{row.name}}</td>
					<td>{{row.email}}</td>
					<td>{{row.createDate}}</td>
					<td>{{row.status}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div>
		<h1 id="photo">Photos</h1> 
		<button ng-click="createEmptyPhoto()">New</button>
		<button ng-click="createEmptyPhoto()">Save</button>
		<table st-table="photo" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 5%;">Id</th>
					<th style="width: 10%;">Type</th>
					<th style="width: 35%;">Description</th>
					<th style="width: 35%;">Photo Path</th>
					<th style="width: 15%;">Active</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in eventPhoto">
					<td>{{$index + 1}}</td>
					<td>
						<select ng-model="row.type">
							<option value="poster">Poster</option>
							<option value="profile">Profile</option>
							<option value="content">Content</option>
						</select>
					</td>
					<td>
						<textarea id="path" ng-model="row.Description"/></textarea> 
					</td>
					<td>
						<textarea id="description" ng-model="row.Photo"/></textarea> 
					</td>
					<td>
						<button ng-click="deletePhoto(row.id)">Remove</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	

	<div id="slidesPreview">
		<ul id="slides" >
			<li class="slide" ng-repeat="row in eventPhoto">
				<a href="{{row.Photo}}" target=1>
				<div class="slide-img"><img ng-src={{row.Photo}} src={{row.Photo}}><</div>
				<h1 class="title"><span class="title-text">{{row.Description}}</span></h1>
			</a>
			</li>
		</ul>
		<ul id="slide-select">
			<li class="btn prev"><</li>
			<li class="selector" ng-repeat="row in eventPhoto"></li>
			<li class="btn next">></li>
		</ul>
	</div>
</div>
<commonfooter></commonfooter></body>

</html>