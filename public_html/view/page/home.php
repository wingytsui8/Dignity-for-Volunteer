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
	<script type="text/javascript">
		function checkvalue(val){
		 var element=document.getElementById('post');
		 if(val=='Others')
		   element.style.display='block';
		 else {
		 	element.style.display='none';
		 	element.value = val;
		 }
		   
		}
	</script> 
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
		<section>
			<h1>Welcome! {{portfolio.Name}}</h1>
			<div>Thank you for your support!</div>
			<div class="fif" ng-show="portfolio.nextVolDate!=null && portfolio.nextVolDate.length>0" class="fif">See you on {{portfolio.nextVolDate}}</div><div class="fif" ng-show="portfolio.nextVolplace!=null && portfolio.nextVolplace.length>0"> at {{portfolio.nextVolplace}}</div><div class="fif" ng-show="portfolio.nextVolPost!=null && portfolio.nextVolPost.length>0"> as a {{portfolio.nextVolPost}}</div><div ng-show="(portfolio.nextVolDate!=null && portfolio.nextVolDate.length>0) || (portfolio.nextVolplace!=null && portfolio.nextVolplace.length>0) || (portfolio.nextVolPost!=null && portfolio.nextVolPost.length>0)" class="fif">.</div>

			<div ng-show="portfolio.nextVolHow!=null && portfolio.nextVolHow.length>0">How to get there? {{portfolio.nextVolHow}}</div>
		</section>
		<section>
			<h1>Volunteer work records</h1>
			<table st-table="volWork" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 30%">Period</th>
					<th style="width: 10%">Status</th>
					<th style="width: 10%">Post</th>
					<th style="width: 10%">Venue</th>
					<th style="width: 30%">Remarks</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in portfolio.upcoming">
					<td>{{row.fromDate}} - <br>{{row.toDate}}</td>
					<td>{{row.status}}</td>
					<td>{{row.post}}</td>
					<td>{{row.venue}}</td>
					<td>{{row.remarks}}</td>
				</tr>
			</tbody>
		</table>
		</section>
		<section>
			
				<h1>Want to help again?</h1>
				<div >
				<div id="left">
			Let us know your availability.</div>
			<div id="right">

			<table>
				<tbody class="formTable">
				<tr>
					<td style="width: 20%;">
						<label>From </label> 
					</td>
					<td style="width: 80%;">
						<input id="fromDate" type="date" ng-model="work.fromDate"/>  
						<!-- <input id="fromTime" type="time" ng-model="work.fromDate"/><br> -->
						<input id="fromDate1" type="text" ng-model="work.fromDate"/><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>To </label> 
					</td>
					<td>
						<input id="toDate" type="date" ng-model="work.toDate"/> 
						<!-- <input id="toTime" type="time" ng-model="work.toDate"/><br> -->
						<input id="toDate1" type="text" ng-model="work.toDate"/><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>Post</label> 
					</td>
					<td>
						<select onchange='checkvalue(this.value)'> 
					    <option value="General">General</option>
					    <option value="Teacher">Teacher</option>
					    <option value="Others">Others</option>
					</select> 
					<input type="text" id="post" ng-model="work.post" style='display:none'/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Remarks</label> 
					</td>
					<td>
						<textarea id="remarks" ng-model="work.remarks"/></textarea> 
					</td>
				</tr>

				</tbody>
			</table>
			<td><button ng-click="addVolunteerWork()">Add</button></td>
		</div>
		</div>
		</section>
		<section>
			<h1>We also need volunteers for upcoming events...</h1>
			<table st-table="upcoming" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 30%">Name</th>
					<th style="width: 30%">Period</th>
					<th style="width: 30%">Location</th>
					<th style="width: 10%">Register</th>
					<th style="width: 10%"></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in upcomingEvents">
					<td>{{row.name}}</td>
					<td>{{row.fromDate}} - <br>{{row.toDate}}</td>
					<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
					<td>
						<input id="isRegistered" type="checkbox" ng-model="row.isRegistered"/>  
					</td>
					<td><a href="https://dignityforvolunteer.000webhostapp.com/UpcomingEvent/{{row.id}}" class="button">Details</a>
					<!-- <button ng-click="window.location.href = 'https://dignityforvolunteer.000webhostapp.com/UpcomingEvent/{{row.id}}';">Details</button> -->

					</td>
					
				</tr>
			</tbody>
		</table>
		<td><button ng-click="getEventDetail(row.id)">Register Events</button></td>
		</section>
	
		<section>
		<h1>History</h1>
			<table st-table="past" class="table table-striped">
			<thead>
				<tr>
					<th style="width: 25%">Name</th>
					<th style="width: 15%">Period</th>
					<th style="width: 15%">Location</th>
					<th style="width: 5%">Post</th>
					<th style="width: 5%">status</th>
					<th style="width: 25%">Remarks</th>
					<th style="width: 10%"></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in portfolio.past">
					<td>{{row.name}}</td>
					<td>{{row.fromDate}} - <br>{{row.toDate}}</td>
					<td><strong>{{row.venue}}</strong><br>{{row.location}}</td>
					<td>{{row.post}}</td>
					<td>{{row.status}}</td>
					<td>{{row.remarks}}</td>
					<td>
						<a href="https://dignityforvolunteer.000webhostapp.com/Event/{{row.id}}" class="button">Details</a>
					<!-- <button ng-click="window.location.href = 'https://dignityforvolunteer.000webhostapp.com/Event/{{row.id}}';">Details</button> -->
					</td>
				</tr>
			</tbody>
		</table>
		</section>
		</div>

	</main>

	<commonfooter></commonfooter>
</body>

</body>
</html>