<!DOCTYPE html>
<html lang="en" ng-app="digVol" ng-controller="CommonController" ng-init="pageTitle='Upcoming'">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - {{pageTitle}}</title>
	<base href="{{base_url}}" />
	<meta name="viewport" content="width=1200" />
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

	<script src="js/sha256.js" type="text/javascript"></script>


	<script src="../controller/commonController.js"></script>
	<script src="../controller/loginController.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

<body ng-style="mainStyle">
	<div ng-style="bodyStyle">
		
		<div class="vbox wb_container" id="wb_header">

			<div class="wb_cont_inner">
				<div id="wb_element_instance15" class="wb_element wb-menu">
					<ul class="hmenu">
						<li><a href="Home" target="_self">Home</a></li>
						<li><a href="Event/" target="_self">Event</a></li>
						<li class="active"><a href="Upcoming/" target="_self">Upcoming</a></li>
						<li><a href="Register/" target="_self">Register</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div id="wb_element_instance16" class="wb_element wb_element_picture" title="">
					<a href="http://dignityforchildren.org/" target="1"><img alt="gallery/dignity_logo" src="gallery_gen/37c944c27b869908c211dea96575621f_190x60.png"></a>
				</div>
				<div id="wrap" ng-controller="loginController">
					<div id="regbar">
						<div id="navthing">
							<div ng-style="{visibility: (islogged)?'hidden':'visible'}">
								<div class = "loginPanel">
									<button id="loginform">Login</button> | <button>Sign up</button>
								</div>
								<div class="login">
									<div class="arrow-up"></div>
									<div class="formholder">
										<div class="randompad">
											<fieldset>
												<label name="email">Email</label>
												<input id="loginEmail" type="email" placeholder="example@example.com" ng-model="email"/>
												<label name="password">Password</label>
												<input id="loginPw" placeholder = "Initial password = date of birth (YYYMMDD)" type="password" ng-model="password"/>
												<input type="submit" value="Login" ng-click="loginSubmit()"/>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
							<div ng-style="{visibility: (islogged)?'visible':'hidden'}">
								<div class="logged">
									<fieldset>
										<label name="emailLabel">Email:</label>
										<label name="loggedEmail">{{email}}</label>
									</fieldset>
								</div>
							</div>
						</div>
						
					</div>
				</div>

			</div>
			<div class="wb_cont_outer"></div>
			<div class="wb_cont_bg"></div>
		</div>
		<div id="upcomingEvent">
			<h1 ng-style="header1Style">Upcoming Event</h1>
			<div id="upcomingEventTable" ng-style="tableStyle">
				<script type="text/javascript">
					var results = <?php include 'connectDB.php';	echo  getEvent("DESC", 1 , 1);?>;
					table = '';
					for ( var i = 0; i < results.length; i++) {
						var obj = results[i];
								//header 
								if (i == 0){
									table = table + "<tr>";
									for ( var key in obj) {
										table = table + "<th>" + key + "</th>"; 
									}
									table = table + "</tr>";
								}
								//body 
								table = table + "<tr>";
								for ( var key in obj) {
									table = table + "<td>" + obj[key] + "</td>"; 
								}
								table = table + "</tr>";
							}
							document.write('<table>' + table + '</table>');
						</script>
					</div>

					
				</div>
				<footer></footer>
				<div ng-style="footerStyle" id="wb_footer">© 2019 Dignity for Children Foundation (506188W).  Designed by <a href="https://github.com/neiamenase">Sam Tang</a>, <a href="https://github.com/wingytsui8">Winnie Tsui</a>
				</div>
			</div>

			<script src="js/loginForm.js" type="text/javascript"></script>
		</body>
		</html>