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

		case "login":
		$password = (string)$_POST['password'];
		$email = (string)$_POST['email'];

		header('Content-type: application/json');
		echo json_encode( login($email, $password) );
		exit;
	}
}


function login($email, $password){
	$pwHash = hash("sha256", $password);
	$sql= "SELECT 1
	From volunteer
	where email = '". $email . "' and password = '". $pwHash . "'";
	return validate($sql);
}

function getEvent($orderBy, $active , $upcoming){
	$sql= "SELECT name, fromDate, toDate, venue, location, contactName, contactEmail, applicationDeadline, quota
	From event
	where active = " . $active .
	" and fromDate " . ($upcoming? " >= " : " <= ") . " CURDATE() " .
	" order by fromDate " . $orderBy;
	return runQuery($sql);
}

    function getUpcomingEvent(){ // e.date >= CURDATE() and e.status <> 'Ended' implies e.status = 'Upcoming'
    $sql= "SELECT e.name as Name, Date, Venue, Location
    From event e 
    inner join `group` g on e.groupId = g.id and (g.name like 'WWS%' or g.name = 'Master')
    where  e.date >= CURDATE() and e.status <> 'Ended'
    order by date DESC";

    return runQuery($sql);
}

function getIsDrawingUpcomingEvent(){
	$sql= "SELECT e.id as Id, e.name as Name
	From event e 
	inner join `group` g on e.groupId = g.id and (g.name like 'WWS%' or g.name = 'Master')
	where  e.date >= CURDATE() and e.status <> 'Ended' and e.isDrawEvent = true
	order by date DESC";

	return runQuery($sql);
}

function getToDrawList($upcomingEId){
	$sql= "SELECT e.name as Name, Date, Venue, Location
	From event  e 
	inner join `participant` p on e.id = p.eventId and p.eventId = upcomingEId and p.notDrawing = 0;";

	return runQuery($sql);
}


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

function validate($sql){
	return connectDB($sql)?true:false;
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
?>