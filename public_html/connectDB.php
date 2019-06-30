<?php

if(isset($_POST['action'])){
	$action = (string)$_POST['action']; 
	switch ($action){

		case "getEvent":
		$orderBy = (string)$_POST['orderBy'];
		$active = (string)$_POST['active'];
		$upcoming = (string)$_POST['upcoming'];

		header('Content-type: application/json');
		echo json_encode( getEvent($orderBy, $active, $upcoming) );
		exit;

		case "getRegisterEventDetails":
		$email = (string)$_POST['email'];
		header('Content-type: application/json');
		echo json_encode( getRegisterEventDetails($email) );
		exit;

		case "login":
		$password = (string)$_POST['password'];
		$email = (string)$_POST['email'];

		header('Content-type: application/json');
		echo json_encode( login($email, $password) );
		exit;

		case "postEvent":
		$id = (string)$_POST['id'];
		$name = (string)$_POST['name'];
		// //$fromDate = (string)$_POST['fromDate'];
		// //$toDate = (string)$_POST['toDate'];
		// $venue = (string)$_POST['venue'];
		// $location = (string)$_POST['location'];
		// $contactName = (string)$_POST['contactName'];
		// $contactEmail = (string)$_POST['contactEmail'];
		// //$applicationDeadline = (string)$_POST['applicationDeadline'];
		// $quota = (string)$_POST['quota'];

		header('Content-type: application/json');
		echo json_encode( postEvent($id, $name) );
		exit;

		case "getEventDetail":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getEventDetail($id) );
		exit;

		case "getRegisteredList":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getRegisteredList($id) );
		exit;

		case "registerEvents":
		$email = (string)$_POST['email'];
		$registerData = $_POST['registerData'];

		header('Content-type: application/json');
		echo json_encode( registerEvents($email, $registerData) );
		exit;
	}
}


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Get functions ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


function getEvent($orderBy, $active , $upcoming){
	$sql= "SELECT id, name, fromDate, toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, remarks
	From event
	where active = " . $active .
	" and fromDate " . ($upcoming? " >= " : " <= ") . " CURDATE() " .
	" order by fromDate " . $orderBy;
	return runQuery($sql);
}

function getRegisterEventDetails($email){
	$sql= "SELECT e.id, name, fromDate, toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, 
	!(r.eventId is null) as registered
	From event as e
	left outer join  
	(
	Select r2.eventId
	from volunteer as vol
	inner join register as r2 on r2.active = 1 and r2.status <> \"Cancelled\" AND vol.id = r2.volId 
	where vol.email = '" . $email . "'
	) as r on e.id = r.eventId
	where active = 1 and fromDate >= CURDATE()
	order by fromDate;";
	return runQuery($sql);
}


function getEventDetail($id){
	$sql= "SELECT event.id as id, name, fromDate, Date(toDate) as toDate, TIME_FORMAT(toDate, '%H:%i') as toTime, venue, location, contactName, contactEmail, applicationDeadline, quota, event.active, count(event.id) as registered
	From event, register
	where event.id = " . $id . 
	" and event.id = register.eventId 
	and register.active = 1
	group by event.id"
	;
	return runQuery($sql);
}


function getRegisteredList($id){
	$sql= "SELECT volunteer.id as volId, volunteer.name as name, volunteer.email as email, register.createDate as createDate, register.active as active FROM `volunteer`, `register` WHERE register.eventId = " . $id . 
	" and register.active = 1 
	and register.volId = volunteer.id 
	order by register.createDate";

	return runQuery($sql);
}

function getToDrawList($upcomingEId){
	$sql= "SELECT e.name as Name, Date, Venue, Location
	From event  e 
	inner join `participant` p on e.id = p.eventId and p.eventId = upcomingEId and p.notDrawing = 0;";

	return runQuery($sql);
}


function getVolunteerId($email){
	$sql= "SELECT id
		From volunteer
		where email = '". $email . "';";
	$result = runQuickQuery($sql);
	return $result->fetch_assoc()["id"];
}


// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv  Get functions   vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ others ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

function postEvent($id, $name){ 
	$sql= "INSERT INTO event (id, name, fromDate, toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, active) VALUES ('". $id. "','" . $name."', '2020-10-10T01:00:00', '2020-11-11T01:01:01', 'test venue', 'test location' , 'contactName', 'contactEmail', '2019-01-01', '100', '1')

	ON DUPLICATE KEY UPDATE 
	name=VALUES(name), name=VALUES(name), fromDate=VALUES(fromDate), toDate=VALUES(toDate), venue=VALUES(venue), location=VALUES(location), contactName=VALUES(contactName), contactEmail=VALUES(contactEmail), applicationDeadline=VALUES(applicationDeadline), quota=VALUES(quota),active=VALUES(active) ";

	return runQuery($sql);
}


function registerEvents($email, $registerData){
	if (checkLoginSession($email)){
		$dbChange = "";
		$volId = getVolunteerId($email);
		foreach($registerData as $record){
			$sql = "select 1 from register where volId = ". $volId. " And eventId = ". $record.eventId . " And active = 1";
			$result = runQuickQuery($sql);
			if ($result->num_rows > 0){
				$dbChange += "UPDATE register Set modifyDate = Now(), status = ". $record.isRegistered? "Confirmed" : "Cancelled" .";";
			}else{
				$dbChange += "INSERT INTO register (eventId, volId, createDate, modifyDate, status, active)
				VALUES (".$record.eventId.", ". $volId .",  Now(),  Now(), 'Confirmed', 1 );";
			}
		}
		runNonQuery($dbChange);
		return true;
	}else{
		return false;
	}
}


function login($email, $password){
	$pwHash = hash("sha256", $password);
	$sql= "SELECT 1
		From volunteer
		where email = '". $email . "' and password = '". $pwHash . "'";
	$val =  validate($sql);
	if ($val){
		updateLoginTime($email);
	}
	return $val;
}

function updateLoginTime($email){
	$sql= "UPDATE `volunteer` set `loginTime` = Now() WHERE email = '". $email ."';";
	runNonQuery($sql);
}

function checkLoginSession($email){
	$sql= "SELECT 1
		From volunteer 
		where `email` ='" . $email . 
	"' and `loginTime`is not null and ADDTIME(`loginTime`, '0 0:30:0') > NOW() ";	
	return validate($sql);
}

// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv others vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv



//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Common Connecter Functions ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

function runQuery($sql){
	$result = connectDB($sql);

	$resArr = [];
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$resArr[] = $row;
		}
		return json_encode($resArr);
	}
}

function runQuickQuery($sql){
	return connectDB($sql);
}

function runNonQuery($sql){
	connectDB($sql);
}

function validate($sql){
	return mysqli_num_rows(connectDB($sql)) > 0?true:false;
}


function connectDB($sql){
	$servername = "localhost";
	$username = "id9482928_dignityforvolunteer";
	$password = "password@000";
	$database = "id9482928_dignityforvolunteer";

	try {
		$conn = new mysqli($servername, $username, $password, $database);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		if (!$conn->set_charset("utf8")) {
			printf("Error loading character set utf8: %s\n", $conn->error);
			exit();
		} 
		    //echo "Connected successfully <br>"; 
		return $conn->query($sql);

	} catch(PDOException $e) {    
		echo "Connection failed: " . $e->getMessage();
	}
}
//vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv Common Connecter Functions vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
?>