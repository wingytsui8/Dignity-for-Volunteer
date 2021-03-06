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

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
<!-- 	<div class='tab'>
		<a href="#events">Event List</a>
		<a href="#details">Details</a>
		<a href="#photo">Photo</a>
		<a href="#registeredList">Registered List</a>
	</div> -->
	<div class="textbody" ng-controller="manageController">
		<div class="tab">
			<button class="tablinks" onclick="displaySection(event, 'Overview')" ng-click="getManagementOverview()" id="defaultOpen">Overview</button>
			<button class="tablinks" onclick="displaySection(event, 'Announcement')" ng-click="getManagementAnnouncement()">Announcement</button>
			<button class="tablinks" onclick="displaySection(event, 'Volunteer')" ng-click="getManagementVolunteer()">Volunteer</button>
			<button class="tablinks" onclick="displaySection(event, 'Event')" ng-click="getEvents(0)">Upcoming Event</button>
			<button class="tablinks" onclick="displaySection(event, 'Event')" ng-click="getPastEvent()">Past Event</button>
			<button class="tablinks" onclick="displaySection(event, 'Setting')" ng-click="getManagementSetting()">Setting</button>
		</div>
		<div id="Event" class="tabcontent">
			<h1 id="events">Events details</h1>
			<table st-table="events" class="table table-striped">
				<thead>
					<tr>
						<th style="width: 25%">Name</th>
						<th style="width: 15%">Period</th>
						<th style="width: 35%">Venue</th>
						<th style="width: 10%">Application Deadline</th>
						<!-- <th style="width: 5%">Quota</th> -->
						<th style="width: 10%"></th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="row in events">
						<td>{{row.name}}</td>
						<td>{{row.period}}</td>
						<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
						<td>{{row.applicationDeadline}}</td>
						<!-- <td>{{row.quota}}</td> -->
						<td><button ng-click="getEventDetail(row.id)">Edit</button></td>
					</tr>
				</tbody>
			<button ng-show="!eol && past" ng-click="getMorePastEvent()">More</button>
			</table>
			<button class="collapsible">{{action}}</button>
			<div class="content">
				<h1 id="details">{{action}}</h1>
				<button ng-show="!past" ng-click="createEmptyEvent()">New</button>
				<button ng-click="getEventDetail(eventDetail.id)">Reset</button>
				<button ng-click="deleteEvent(eventDetail.id)">Delete</button>
				<button ng-click="postEvent()">Save</button>
				<table>
					<tbody class="nameCard">
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
							<input id="name" type="text" ng-model="eventDetail.name" ng-disabled="past"/>		
						</td>
					</tr>
					<tr>
						<td class="tdheader">
							<label >From </label>
						</td>
						<td class="tdcontent">
							<input id="fromDate" type="date" ng-model="eventDetail.fromDate" ng-disabled="past"/>  
							<input id="fromTime" type="time" ng-model="eventDetail.fromDate" ng-disabled="past"/><br>
							<!-- <input id="fromDate1" type="text" ng-model="eventDetail.fromDate" ng-disabled="past"/><br> -->
						</td>
						<td class="tdheader">
							<label >To</label>
						</td>
						<td class="tdcontent">
							<input id="toDate" type="date" ng-model="eventDetail.toDate" ng-disabled="past"/>
							<input id="toTime" type="time" ng-model="eventDetail.toDate" ng-disabled="past"/><br>
							<!-- <input id="toDate1" type="text" ng-model="eventDetail.toDate" ng-disabled="past"/><br> -->
						</td>
					</tr>
					<tr>
						<td class="tdheader">
							<label >Venue</label>
						</td>
						<td>
							<select ng-model="eventDetail.venue" ng-options="option.content for option in venueOptions" ng-disabled="past"></select>
						</td>
						<td class="tdheader">
							<label >Location</label>
						</td>
						<td>
							<select ng-model="eventDetail.location" ng-options="option.content for option in locationOptions" class="pending-vol-value1" ng-disabled="past"></select>
						</td>
					</tr>
					<tr>
						<td class="tdheader">
							<label >Contact Person Name</label>
						</td>
						<td class="tdcontent">
							<input id="contactName" type="text" ng-model="eventDetail.contactName" ng-disabled="past"/>
						</td>
						<td class="tdheader">
							<label >Contact Person Email</label>
						</td>
						<td class="tdcontent">
							<input id="loginEmail" type="text" ng-model="eventDetail.contactEmail" ng-disabled="past"/>
						</td>
					</tr>
					<tr>
						<td class="tdheader">
							<label >Application Deadline</label>
						</td>
						<td class="tdcontent">
							<input id="applictionDeadline" type="date" ng-model="eventDetail.applicationDeadline" ng-disabled="past"/><br>
							<!-- <input id="applictionDeadline1" type="text" ng-model="eventDetail.applicationDeadline" ng-disabled="past"/> -->
						</td>
						<td class="tdheader">
							<label >Quota</label>
						</td>
						<td class="tdcontent">
							<input id="quota" type="number" ng-model="eventDetail.quota" ng-disabled="past"/>
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
				</tbody>
				</table>		
			</div>
			<button class="collapsible">Registered Volunteer</button>
			<div class="content">
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
			<button class="collapsible">Photos</button>
			<div class="content">
				<h1 id="photo">Photos</h1> 
				<button ng-click="createEmptyPhoto()">New</button>
				<a href="https://www.youtube.com/watch?v=HSiZgaM2H_4" target=1 class="button">How to upload an image from Google Photo</a>
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
								<textarea id="path" ng-model="row.Description"></textarea>
							</td>
							<td>
								<textarea id="description" ng-model="row.Photo"></textarea> 
							</td>
							<td>
								<button ng-click="savePhoto(row)">Save</button><br>
								<button ng-click="deletePhoto(row.id)">Remove</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- <button class="collapsible">Slide</button>
			<div class="content">
				<div id="slidesPreview">
					<ul id="slides" >
						<li class="slide" ng-repeat="row in eventPhoto">
							<a href="{{row.Photo}}" target=1>
								<div class="slide-img"><img ng-src={{row.Photo}} src={{row.Photo}}></div>
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
			</div> -->
		</div>
		<div id="Overview" class="tabcontent">
			<div>
				<h1>Notification</h1>
				today/tmr voluteer work record?
				how many updated record?
			</div>
			<hr>
			<div>
				<h1>Calendar</h1>
				<div>
					<span class="dot" style="background-color: #3C995B"></span>Christian Holidays   
					<span class="dot" style="background-color: #E6804D"></span>Holidays in Malaysia  
					<span class="dot" style="background-color: #CF9911"></span>Event  
					<span class="dot" style="background-color: #668CD9"></span>Volunteer Work</div>
				<iframe src="https://calendar.google.com/calendar/embed?height=800&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKuala_Lumpur&amp;src=dm5mMDduaHN0ZnN1c211ZDV1N200cXBlcXNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=b2s4NHVqZmJrOTVnbm1zbm9xbWVtOWM4NTBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4tZ2IuY2hyaXN0aWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZW4tZ2IubWFsYXlzaWEjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23F6BF26&amp;color=%234285F4&amp;color=%230B8043&amp;color=%23F4511E&amp;showTitle=0&amp;showNav=1&amp;showDate=1&amp;showCalendars=1" style="border-width:0" width="1200" height="800" frameborder="0" scrolling="no"></iframe>
			</div>
			<hr>
			<div>
				<h1>Pending Volunteer Work Application</h1>
				<div ng-repeat="row in pendingWork">
					<table st-table="pendingWork" class="table table-striped">
						<thead class="nameCard">
							<tr>
								<th>Vol ID:</th>
								<th>{{row.volId}}</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody class="nameCard">
							<tr>
								<td>
									<div class="pending-vol-header">Name:</div>
								</td>
								<td>
									<div class="pending-vol-value1">{{row.name}}</div>
								</td>
								<td>
									<div class="pending-vol-header">Email:</div>
								</td>
								<td>
									<div class="pending-vol-value2"><a href="mailto:{{row.email}}?subject=Regarding your volunteer application on {{row.fromDate}}&body=Hi {{row.name}},">{{row.email}}</a></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="pending-vol-header">Post:</div>
								</td>
								<td>
									<div class="pending-vol-value1">{{row.post}}</div>
								</td>
								<td>
									<div class="pending-vol-header">Period:</div>
								</td>
								<td>
									<div class="pending-vol-value2">{{row.period}}</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="pending-vol-header">Venue:</div>
								</td>
								<td>
									<select ng-model="row.venue" ng-options="option.content for option in venueOptions" class="pending-vol-value1"></select>
								</td>
								<td>
									<div class="pending-vol-header">Location:</div>
								</td>
								<td>
									<select ng-model="row.location" ng-options="option.content for option in locationOptions" class="pending-vol-value2"></select>
								</td>
							</tr>
							<tr>
								<td> 
									<div class="pending-vol-header">Remarks:</div>
								</td>
								<td> 
									<textarea class="pending-vol-value1" id="remarks" ng-model="row.remarks"></textarea> 
								</td>
								<td>
									<div class="pending-vol-header">Status:</div>
								</td>
								<td>
									<select ng-model="row.status" class="pending-vol-value2">
										<option value="Pending">Pending</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<!-- Or use <tfoot> -->
								<td> <button class="pending-vol-button" ng-click="updateVolunteerWork(row)">Save</button> </td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<div>
				<h1>Pending Event Helper Application</h1>
				<div ng-repeat="row in pendingEvent">
					<table st-table="pendingEvent" class="table table-striped">
						<thead class="nameCard">
							<tr>
								<th>Vol ID</th>
								<th>{{row.volId}}</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody class="nameCard">
							<tr>
								<td class="pending-vol-header">Name:</td>
								<td class="pending-vol-value1">{{row.name}}	</td>
								<td class="pending-vol-header">Email:</td>
								<td class="pending-vol-value2"><a href="mailto:{{row.email}}?subject=Regarding your volunteer application of {{row.eventName}} on {{row.fromDate}}&body=Hi {{row.name}},">{{row.email}}</a></td>
							</tr>
							<tr>
								<td class="pending-vol-header">Event:</td>
								<td class="pending-vol-value1">{{row.eventName}}</td>
								<td class="pending-vol-header">Period:</td>
								<td class="pending-vol-value2">{{row.period}}</td>
							</tr>
							<tr>
								<td class="pending-vol-header">Venue:</td>
								<td class="pending-vol-value1">{{row.venue}}</td>
								<td class="pending-vol-header">Status:</td>
								<td >
									<select ng-model="row.status" class="pending-vol-value2">
										<option value="Pending">Pending</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<!-- Or use <tfoot> -->
								<td> <button class="pending-vol-button" ng-click="updateRegistrationStatus(row)">Save</button> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<div>
				<h1>Unread Cancelled Record</h1>
				<button ng-click="inactiveCancelledWork()">Clear All</button>
				<table st-table="Cancelled" class="table table-striped">
					<thead>
						<tr>
							<th style="width: 20%;">Info</th>
							<th style="width: 30%;">Venue</th>
							<th style="width: 30%;">Remarks</th>
							<th style="width: 20%;"></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in cancelled">
							<td><label>Vol id: </label>{{row.volId}}<br>
								<label>Name: </label>{{row.name}}<br>
								<label>Period: </label>{{row.period}}<br>
								<label>Post: </label>{{row.post}}
							</td>
							<td><label>Venue</label>
								<input id="venue" type="text" ng-model="row.venue"/>
								<label>Location</label> 
								<textarea id="location" ng-model="row.location"></textarea> 
							</td>
							<td>
								<label>Status</label>
								<select ng-model="row.status">
									<option value="Pending">Pending</option>
									<option value="Confirmed">Confirmed</option>
									<option value="Cancelled">Cancelled</option>
								</select>
								<label>Remarks</label>
								<textarea id="content" ng-model="row.remarks"></textarea> 
							</td>
							<td>
								<button ng-click="saveWork(row.id)">Save</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div id="Announcement" class="tabcontent">
			<!-- <button class="collapsible">Announcement</button> -->
			<!-- <div class="content"> -->
				<h1>Announcement</h1>
				<button ng-click="createEmptyAnnouncement()">New</button>
				<table st-table="announcement" class="table table-striped">
					<thead>
						<tr>
							<th style="width: 10%;">Post Date</th>
							<th style="width: 10%;">Valid until</th>
							<th style="width: 40%;">Content</th>
							<th style="width: 40%;"></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in announcement">
							<td>
								<input id="postDate" type="date" ng-model="row.postDate" style="width: 100%" />  
							</td>
							<td>
								<input id="toDate" type="date" ng-model="row.toDate" style="width: 100%"/>  
							</td>
							<td>
								<textarea id="content" ng-model="row.content"></textarea> 
							</td>
							<td>
								<button ng-click="postAnnouncement(row)">Save</button>
								<button ng-click="deleteAnnouncement(row.id)">Remove</button>
							</td>
						</tr>
					</tbody>
				</table>
			<!-- </div> -->
		</div>
		<div id="Volunteer" class="tabcontent">
			<!-- <button class="collapsible">Announcement</button> -->
			<!-- <div class="content">
				<h1>Announcement</h1>
				<button ng-click="createEmptyAnnouncement()">New</button>
				<table st-table="announcement" class="table table-striped">
					<thead>
						<tr>
							<th style="width: 20%;">Post Date</th>
							<th style="width: 20%;">Valid until</th>
							<th style="width: 40%;">Content</th>
							<th style="width: 20%;"></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in announcement">
							<td>
								<input id="postDate" type="date" ng-model="row.postDate" style="width: 100%" />  
							</td>
							<td>
								<input id="toDate" type="date" ng-model="row.toDate" style="width: 100%"/>  
							</td>
							<td>
								<textarea id="content" ng-model="row.content"></textarea> 
							</td>
							<td>
								<button ng-click="postAnnouncement(row)">Save</button>
								<button ng-click="deleteAnnouncement(row.id)">Remove</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div> -->
			<button class="collapsible">Volunteer Overview</button>
			<div class="content">
				<h1>Confirmed Upcoming Volunteer Overview</h1>
				<table st-table="confirmed" class="table table-striped">
					<thead>
						<tr>
							<th style="width: 30%;">Date</th>
							<th style="width: 20%;">Volunteer</th>
							<th style="width: 10%;">Venue</th>
							<th style="width: 10%;">Post</th>
							<th style="width: 30%;">Email</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in upcomingVolList">
							<td>{{row.date}}</td>
							<td>{{row.name}}</td>
							<td>{{row.venue}}</td>
							<td>{{row.post}}</td>
							<td>{{row.email}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<button class="collapsible">Upcoming Volunteer Work List</button>
			<div class="content">
				<div ng-repeat="row in confirmed">
					<table st-table="confirmed" class="table table-striped">
						<thead class="nameCard">
							<tr>
								<th>Vol ID</th>
								<th>{{row.volId}}</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody class="nameCard">
							<tr>
								<td class="pending-vol-header">Name:</td>
								<td class="pending-vol-value1">{{row.name}}	</td>
								<td class="pending-vol-header">Email:</td>
								<td class="pending-vol-value2"><a href="mailto:{{row.email}}?subject=Regarding your volunteer application on {{row.fromDate}}&body=Hi {{row.name}},">{{row.email}}</a></td>
							</tr>
							<tr>
								<td class="pending-vol-header">Post:</td>
								<td class="pending-vol-value1">{{row.post}}	</td>
								<td class="pending-vol-header">Period:</td>
								<td class="pending-vol-value2">{{row.period}}	</td>
							</tr>
							<tr>
								<td class="pending-vol-header">Venue:</td>
								<td>
									<select ng-model="row.venue" ng-options="option.content for option in venueOptions" class="pending-vol-value1"></select>
								</td>
								<td>
									<div class="pending-vol-header">Location:</div>
								</td>
								<td>
									<select ng-model="row.location" ng-options="option.content for option in locationOptions" class="pending-vol-value2"></select>
								</td>
							</tr>
							<tr>
								<td class="pending-vol-header">Remarks:</td>
								<td><textarea id="remarks" ng-model="row.remarks" class="pending-vol-value1"></textarea></td>
								<td class="pending-vol-header">Status:</td>
								<td>
									<select ng-model="row.status" class="pending-vol-value2">
										<option value="Pending">Pending</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<!-- Or use <tfoot> -->
								<td> <button class="pending-vol-button" ng-click="updateVolunteerWork(row)">Save</button> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="Setting" class="tabcontent">
			<button class="collapsible">Edit Options</button>
			<div class="content">
				<button ng-click="createEmptySetting()">New Option</button>
				<table st-table="setting" class="table table-striped">
					<thead> 
						<tr>
							<th style="width: 30%;">Type</th>
							<th style="width: 30%;">Content</th>
							<th style="width: 30%;"></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in setting">
							<td>
								<select ng-disabled="row.disabled" ng-model="row.type">
									<option value="Admin's Email">Admin's Email</option>
									<option value="Admin's Temp Last Login Time">Admin's Temp Last Login Time
									</option>
									<option value="Post">Post</option>
									<option value="Venue">Venue</option>
									<option value="Location">Location</option>
								</select>
							</td>
							<td>
								<input ng-disabled="row.disabled" id="content" type="text" ng-model="row.content">  
							</td>
							<td>
								<button ng-hide="row.disabled" ng-click="postSetting(row)">Save</button>
								<button ng-hide="row.disabled" ng-click="deleteSetting(row.id)">Remove</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<button class="collapsible">Upload</button>
			<div class="content">
				<select onchange='checkvalue(this.value)' ng-model="uploadOption" style="width:50%;"> 
					<option disabled selected value> -- select an option -- </option>
					<option value="Volunteer">Upload Volunteers</option>
					<option value="VolunteerWork">Upload Volunteer Works</option>
				</select>
				<div ng-show="uploadOption=='Volunteer'">
					*For volunteer id, please sync with local database. Therefore, a whole new volunteer should not be created here<br>
					*For dob, the format is yyyy-mm-dd<br>
					*This function is for upadte or insert only. Contact IT support to delete a volunteer or set it to inactive<br>
					<a href="template/vol_template.csv" download="vol_template.csv">Download Template</a>
					<br>
					<input type="file" file-reader="fileContent" />
					<table st-table="upload_volunteer" class="table table-striped">
						<thead>
							<tr>
								<th style="width: 20%;">VolunteerID</th>
								<th style="width: 20%;">Name</th>
								<th style="width: 40%;">Email</th>
								<th style="width: 20%;">Dob</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="row in tryUpload.volunteer">
								<td>{{row.VolunteerID}}</td>
								<td>{{row.Name}}</td>
								<td>{{row.Email}}</td>
								<td>{{row.Dob}}</td>
							</tr>
						</tbody>
					</table>
					<button ng-click="upload()" ng-show="tryUploadedVol">Upload</button>
					<button ng-click="cancelUpload()" ng-show="tryUploadedVol">Cancel</button>
				</div>
				<div ng-show="uploadOption=='VolunteerWork'">
					*All volunteer ID should already exist in our database before the upload process. If it is not, please upload volunteer first.
					*For From and To, the format is yyyy-mm-dd<br>
					<a href="template/volWork_template.csv" download="volWork_template.csv">Download Template</a>
					<br>
					<input type="file" file-reader="fileContent" />
					<table st-table="upload_volunteer" class="table table-striped">
						<thead>
							<tr>
								<th style="width: 20%;">VolunteerID</th>
								<th style="width: 30%;">From</th>
								<th style="width: 30%;">To</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="row in tryUpload.volunteerWork">
								<td>{{row.VolunteerID}}</td>
								<td>{{row.From}}</td>
								<td>{{row.To}}</td>
							</tr>
						</tbody>
					</table>
					<button ng-click="Upload()" ng-show="tryUploadedVolWork">Upload</button>
					<button ng-click="cancelUpload()" ng-show="tryUploadedVolWork">Cancel</button>
				</div>
			</div>
			<button class="collapsible">Housekeeping</button>
			<div class="content">
				<h1>Housekeeping</h1>
				clean up all unused past record
			</div>
		</div>
	</div>
	<commonfooter></commonfooter>
	<script>
		function displaySection(evt, sectionName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(sectionName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();

		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.maxHeight){
					content.style.maxHeight = null;
				} else {
	      // content.style.maxHeight = content.scrollHeight + "px";
	      content.style.maxHeight = "max-content";
	  } 
	});
		}

	</script>
</body>

</html>