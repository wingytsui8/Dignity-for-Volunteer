<?php
include 'calendar.php';
 

//  	$fp = fopen('data.txt', 'a');//opens file in append mode  
// fwrite($fp, ' this is additional text ');  
// fwrite($fp, 'appending data');  
// fclose($fp);  
  
// echo "File appended successfully"; 
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

		case "getPortfolio":
		$email = (string)$_POST['email'];
		header('Content-type: application/json');
		echo json_encode( getPortfolio($email) );
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
		$fromDate = (string)$_POST['fromDate'];
		$toDate = (string)$_POST['toDate'];
		$venue = (string)$_POST['venue'];
		$location = (string)$_POST['location'];
		$contactName = (string)$_POST['contactName'];
		$contactEmail = (string)$_POST['contactEmail'];
		$applicationDeadline = (string)$_POST['applicationDeadline'];
		$quota = (int)$_POST['quota'];
		$active = (int)$_POST['active'];

		header('Content-type: application/json');
		echo json_encode( postEvent($id, $name,$fromDate, $toDate, $venue, $location, $contactName, $contactEmail, $applicationDeadline, $quota, $active) );
		exit;

		case "getEventManageDetail":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getEventManageDetail($id) );
		exit;

		case "getEventDisplayDetail":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getEventDisplayDetail($id) );
		exit;

		case "getRegisteredList":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getRegisteredList($id) );
		exit;

		case "getEventPhoto":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getEventPhoto($id) );
		exit;

		case "postPhoto":
		$id = (string)$_POST['id'];
		$name = (string)$_POST['name'];
		$quota = (int)$_POST['quota'];
		$active = (int)$_POST['active'];
		
		header('Content-type: application/json');
		echo json_encode( postPhoto($id) );

		case "daletePhoto":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( deletePhoto($id) );
		exit;


		case "getRecentEventsList":
		$start = (int)$_POST['start'];

		header('Content-type: application/json');
		echo json_encode( getRecentEventsList($start) );
		exit;

		case "getUpcomingList":

		header('Content-type: application/json');
		echo json_encode( getUpcomingList() );
		exit;

		case "getUpcomingDisplayDetail":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( getUpcomingDisplayDetail($id) );
		exit;

		case "registerEvents":
		$email = (string)$_POST['email'];
		$registerData = $_POST['registerData'];

		header('Content-type: application/json');
		echo json_encode( registerEvents($email, $registerData) );
		exit;

		case "updateRegistrationStatus":
		$id = (string)$_POST['id'];
		$status = $_POST['status'];

		header('Content-type: application/json');
		echo json_encode( updateRegistrationStatus($id, $status) );
		exit;

		case "addVolunteerWork":
		$email = (string)$_POST['email'];
		$from = (string)$_POST['from'];
		$to = (string)$_POST['to'];
		$post = (string)$_POST['post'];
		$remarks = (string)$_POST['remarks'];

		header('Content-type: application/json');
		echo json_encode( addVolunteerWork($email, $from, $to, $post, $remarks) );
		exit;

		case "cancelVolunteerWork":
		$id = (string)$_POST['id'];
		$email = (string)$_POST['email'];
		// $venue = (string)$_POST['venue'];
		// $loaction = (string)$_POST['location'];
		// $status = (string)$_POST['status'];
		// $active = (string)$_POST['active'];

		header('Content-type: application/json');
		echo json_encode( cancelVolunteerWork($id, $email) );
		exit;

		case "updateVolunteerWork":
		$id = (string)$_POST['id'];
		$venue = (string)$_POST['venue'];
		$location = (string)$_POST['location'];
		$status = (string)$_POST['status'];
		$remarks = (string)$_POST['remarks'];

		header('Content-type: application/json');
		echo json_encode( updateVolunteerWork($id, $venue, $location, $status, $remarks) );
		exit;

		case "getManagementOverview":
		header('Content-type: application/json');
		echo json_encode( getManagementOverview() );
		exit;

		case "getManagementVolunteer":
		header('Content-type: application/json');
		echo json_encode( getManagementVolunteer() );
		exit;

		case "getManagementSetting":
		header('Content-type: application/json');
		echo json_encode( getManagementSetting() );
		exit;

		case "postAnnouncement":
		$id = (string)$_POST['id'];
		$postDate = (string)$_POST['postDate'];
		$toDate = (string)$_POST['toDate'];
		$content = (string)$_POST['content'];

		header('Content-type: application/json');
		echo json_encode( postAnnouncement($id, $postDate, $toDate, $content) );
		exit;

		case "postSetting":
		$id = (string)$_POST['id'];
		$type = (string)$_POST['type'];
		$content = (string)$_POST['content'];

		header('Content-type: application/json');
		echo json_encode( postSetting($id, $type, $content) );
		exit;

		case "deleteAnnouncement":
		$id = (string)$_POST['id'];

		header('Content-type: application/json');
		echo json_encode( deleteAnnouncement($id) );
		exit;
	}
}


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Get functions ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


function getEvent($orderBy, $active , $upcoming){
	$sql= "SELECT id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, remarks
	From event
	where fromDate " . ($upcoming? " >= " : " <= ") . " CURDATE() " .
	($active? (" and active = " . $active ): "") .
	" order by fromDate " . $orderBy;
	return runQuery($sql);
}

function getRegisterEventDetails($email){
	$sql= "SELECT e.id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, 
	!(r.eventId is null) as registered
	From event as e
	left outer join  
	(
	Select r2.eventId
	from volunteer as vol
	inner join register as r2 on r2.active = 1 and r2.status <> \"Cancelled\" AND vol.id = r2.volId 
	where LOWER(vol.email) = '" . $email . "'
	) as r on e.id = r.eventId
	where active = 1 and fromDate >= CURDATE()
	order by fromDate;";
	return runQuery($sql);
}

function getRegisteredList($id){
	$sql= "SELECT volunteer.id as volId, volunteer.name as name, volunteer.email as email, register.createDate as createDate, register.active as active, register.status as status FROM `volunteer`, `register` WHERE register.eventId = " . $id . 
	" and register.active = 1 
	and register.volId = volunteer.id 
	order by register.createDate";

	return runQuery($sql);
}

function getVolunteerId($email){
	$sql= "SELECT id
	From volunteer
	where LOWER(email) = '". strtolower($email) . "';";
	$result = runQuickQuery($sql);
	return $result->fetch_assoc()["id"];
}

function getEventManageDetail($id){
	$sql= "SELECT event.id as id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, remarks, pastDisplay, upcomingDisplay, event.active, count(event.id) as registered
	From event
	left outer join register on event.id = register.eventId and register.active = 1
	where event.id = " . $id . " 
	group by event.id"
	;
		// return $sql;
	return runQuery($sql);
}

function getRecentEventsList($start){
	$sql= "SELECT event.id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') AS toDate, remarks, photo.path
	From event 
	left outer join photo on event.id = photo.eventId and photo.type = 'profile'
	where active = 1 and toDate < CURDATE() and pastDisplay = 1 
	order by fromDate DESC 
	Limit " . $start . " , 5";

	return runQuery($sql);
}


function getEventDisplayDetail($id){
	$sql= "SELECT name as Name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS `From`, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as `To`, venue as Place, remarks
	From event 
	where event.id = " . $id;
	$result = runQuickQuery($sql);

	$sql= "SELECT `path` as Photo, des as Description
	From photo  
	where eventId = " . $id . " and Type = 'content'";

	$photosRet = runQuickQuery($sql);
	
	$photos = [];

	if($photosRet->num_rows > 0){
		while($p = $photosRet->fetch_assoc()) {
			$photos[] = $p;
		}
	}
	if ($result->num_rows > 0) {
		$resArr[] = array_merge($result->fetch_assoc(), ["photos" => $photos]);
		return json_encode($resArr);
	}
}

function getUpcomingList(){
	$sql= "SELECT event.id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') AS toDate, remarks, photo.path
	From event 
	left outer join photo on event.id = photo.eventId and photo.type = 'profile'
	where active = 1 and fromDate > CURDATE() and upcomingDisplay = 1 
	order by fromDate DESC";
	return runQuery($sql);
}

function getUpcomingDisplayDetail($id){
	$sql= "SELECT name as Name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS `From`, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as `To`, venue as Place, location, contactName, contactEmail, applicationDeadline, quota, remarks, `path` as Photo
	From event 
	left outer join photo on photo.eventId = event.id and photo.type = 'poster'
	where event.id = " . $id;
	return runQuery($sql);
}

function getEventPhoto($id){
	$sql= "SELECT id, `path` as Photo, type, des as Description
	From photo 
	where eventId = " . $id;
	return runQuery($sql);
}

function getPortfolio($email){
	$volId = getVolunteerId($email);

	$sql= "SELECT e.id, name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, applicationDeadline, !(r.eventId is null) as registered, r.status as status
	From event as e
	left outer join  
	(
	Select r2.eventId, r2.status
	from volunteer as vol
	inner join register as r2 on r2.active = 1 and r2.status <> 'Cancelled' AND vol.id = r2.volId 
	where vol.id = " . $volId . "
	) as r on e.id = r.eventId
	where active = 1 and fromDate >= CURDATE()
	order by fromDate;";

	$results = runQuickQuery($sql);
	$upcomingEvents = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$upcomingEvents[] = $result;
		}
	}

	$sql= "SELECT event.id, event.name, DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, pastDisplay
	From event
	INNER join register on register.eventId = event.id and register.active = 1 and volId = ". $volId ."
	where fromDate  <  CURDATE()
	order by fromDate DESC" ;

	$results = runQuickQuery($sql);
	
	$pastEvents = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$pastEvents[] = $result;
		}
	}

	$sql= "SELECT DATE_FORMAT(fromDate, '%Y-%m-%dT%TZ') AS fromDate, DATE_FORMAT(toDate, '%Y-%m-%dT%TZ') as toDate, post, venue, status, remarks, id
	From volunteer_work
	where active = 1 and volId = ". $volId ."
	order by fromDate>CURDATE() DESC, `status`='Confirmed' DESC, fromDate" ;

	$results = runQuickQuery($sql);
	
	$volWork = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$volWork[] = $result;
		}
	}

	$sql= "SELECT postDate, toDate, content
	From announcement
	where (toDate >= CURDATE() or toDate is null) 
	and postDate <= CURDATE() 
	order by postDate" ;

	$results = runQuickQuery($sql);
	
	$announcement = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$announcement[] = $result;
		}
	}

	$sql= "SELECT name as Name, volunteer_work.fromDate as nextVolDate, volunteer_work.venue as nextVolplace, volunteer_work.location as nextVolHow, volunteer_work.post as nextVolPost
	From volunteer 
	left outer join volunteer_work on volunteer.id = volunteer_work.volId and volId = ". $volId ." and volunteer_work.active = 1 and volunteer_work.toDate >= CURDATE() and volunteer_work.status <> 'Cancelled'
	where volunteer.id = ". $volId ."
	order by volunteer_work.fromDate
	Limit 0 , 1";

	$results = runQuickQuery($sql);

	if ($results->num_rows > 0) {
		$resArr[] = array_merge($results->fetch_assoc(), [
			"upcoming" => $upcomingEvents,
			"past" => $pastEvents,
			"volWork" => $volWork,
			'announcement' => $announcement,
		]);
		return json_encode($resArr);
	}
}

function getManagementOverview(){

// get pending volunteer work record
	$sql= "SELECT `volunteer_work`.`id`, `volunteer`.`name`, `volunteer`.`email`, DATE_FORMAT(`fromDate`, '%Y-%m-%dT%TZ') AS `fromDate`, DATE_FORMAT(`toDate`, '%Y-%m-%dT%TZ') as `toDate`, `venue`, `location`, `post`, `status`, `remarks`, `volId` From `volunteer_work` 
		INNER join `volunteer` on `volunteer`.id = `volunteer_work`.`volId` and `volunteer_work`.`active` = 1 and `volunteer_work`.`status` = 'Pending' 
		where `volunteer_work`.`fromDate` > CURDATE() 
		order by `volunteer_work`.`fromDate` DESC" ;

	$results = runQuickQuery($sql);
	
	$pendingWork = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$pendingWork[] = $result;
		}
	}

// get pending event registration record
	$sql= "SELECT `register`.`id` as `id`, `event`.`name` as eventName, DATE_FORMAT(`fromDate`, '%Y-%m-%dT%TZ') AS `fromDate`, DATE_FORMAT(`toDate`, '%Y-%m-%dT%TZ') as `toDate`, `venue`, `volunteer`.`id`, `volunteer`.`name` as name,`volunteer`.`email` as email , `register`.`status` 
		From `event` 
		inner join `register` on `event`.`id` = `register`.`eventId` and `register`.`active` = 1 and `register`.`status` = 'Pending' 
		inner join `volunteer` on `volunteer`.`id` = `register`.`volId`
		order by fromDate, `event`.`id`, `register`.`createDate`";


	$results = runQuickQuery($sql);
	
	$pendingEvent = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$pendingEvent[] = $result;
		}
	}

	$sql= "SELECT `volunteer_work`.`id`, `volunteer`.`name`, `volunteer`.`email`, DATE_FORMAT(`fromDate`, '%Y-%m-%dT%TZ') AS `fromDate`, DATE_FORMAT(`toDate`, '%Y-%m-%dT%TZ') as `toDate`, `venue`, `location`, `post`, `status`, `remarks`, `volId` From `volunteer_work` 
		INNER join `volunteer` on `volunteer`.id = `volunteer_work`.`volId` and `volunteer_work`.`active` = 1 and `volunteer_work`.`status` = 'Cancelled' 
		where `volunteer_work`.`fromDate` > CURDATE() 
		order by `volunteer_work`.`fromDate` DESC" ;

	$results = runQuickQuery($sql);
	
	$cancelled = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$cancelled[] = $result;
		}
	}

	$sql= "SELECT `type`, `content`
	 From `setting` 
		where `type` = 'Venue' or `type` = 'Location' 
		order by `content`" ;

	$results = runQuickQuery($sql);
	
	$options = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$options[] = $result;
		}
	}

	return json_encode([
		"pendingWork" => $pendingWork,
		"pendingEvent" => $pendingEvent,
		"cancelled" => $cancelled,
		"options" => $options,
	]);
	
}

function getManagementVolunteer(){
	$sql= "SELECT id, content, postDate, toDate
	From announcement 
	order by postDate;";

	$results = runQuickQuery($sql);
	$announcement = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$announcement[] = $result;
		}
	}

	$sql= "SELECT `volunteer_work`.`id`, `volunteer`.`name`, `volunteer`.`email`, DATE_FORMAT(`fromDate`, '%Y-%m-%dT%TZ') AS `fromDate`, DATE_FORMAT(`toDate`, '%Y-%m-%dT%TZ') as `toDate`, `venue`, `location`, `post`, `status`, `remarks`, `volId` From `volunteer_work` 
		INNER join `volunteer` on `volunteer`.id = `volunteer_work`.`volId` and `volunteer_work`.`active` = 1 and `volunteer_work`.`status` = 'Confirmed' 
		where `volunteer_work`.`fromDate` >= CURDATE() 
		order by `volunteer_work`.`fromDate` DESC" ;

	$results = runQuickQuery($sql);
	
	$confirmed = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$confirmed[] = $result;
		}
	}
	return json_encode([
		"announcement" => $announcement,
		"confirmed" => $confirmed,

	]);
	
}

function getManagementSetting(){
	$sql= "SELECT id, type, content from setting 
	order by type;";

	$results = runQuickQuery($sql);
	$setting = [];
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			$setting[] = $result;
		}
	}

	return json_encode([
		"setting" => $setting,
	]);
	
}
// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv  Get functions   vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ other ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

function postEvent($id, $name, $fromDate, $toDate, $venue, $location, $contactName, $contactEmail, $applicationDeadline, $quota, $active){ 
	$sql= "INSERT INTO event (id, name, fromDate, toDate, venue, location, contactName, contactEmail, applicationDeadline, quota, active) VALUES ('". $id. "','" . $name."', '".$fromDate."', '".$toDate."', '" .$venue."', '" .$location. "' , '" . $contactName . "', '" . $contactEmail. "', '".$applicationDeadline."', '". $quota. "', '".$active."')
	ON DUPLICATE KEY UPDATE 
	name=VALUES(name), name=VALUES(name), fromDate=VALUES(fromDate), toDate=VALUES(toDate), venue=VALUES(venue), location=VALUES(location), contactName=VALUES(contactName), contactEmail=VALUES(contactEmail), applicationDeadline=VALUES(applicationDeadline), quota=VALUES(quota),active=VALUES(active) ";

	return runQuery($sql);
}

function postAnnouncement($id, $postDate, $toDate, $content){

	$sql= "INSERT INTO announcement (id, postDate, `toDate`, content) VALUES (" . 
	($id == ''? "null" : $id ) . 
	",'" . $postDate."', '".$toDate."', '".$content."')
	ON DUPLICATE KEY UPDATE 
	postDate=VALUES(postDate), toDate=VALUES(toDate), content=VALUES(content) ";
	return runQuery($sql);
}
function postSetting($id, $type, $content){

	$sql= "INSERT INTO setting (id, type, content) VALUES (" . 
	($id == ''? "null" : $id ) . 
	",'" . $type."', '".$content."')
	ON DUPLICATE KEY UPDATE 
	type=VALUES(type), content=VALUES(content) ";
	return runQuery($sql);
}

function updateVolunteerWork($id, $venue, $location, $status, $remarks){

	$sql = "UPDATE `volunteer_work` 
			SET venue= '".$venue."', location = '".$location. "' , status= '".$status."', remarks = '".$remarks. "'
			WHERE id = ". $id .";";
	runNonQuery($sql);
	return true;

}

function postPhoto($id, $type, $path, $des){ 
	$sql= "INSERT INTO event (id, type, `path`, des) VALUES ('". $id. "','" . $type."', '".$path."', '".$des."')
	ON DUPLICATE KEY UPDATE 
	type=VALUES(type), path=VALUES(path), des=VALUES(des) ";
	return runQuery($sql);
}


function registerEvents($email, $registerData){
	if (checkLoginSession($email)){
		$dbChange = "";
		$volId = getVolunteerId($email);
		foreach($registerData as $record){
			$sql = "select 1 from register where volId = ". $volId. " And eventId = ". $record['eventId'] . " And active = 1 ";
			$result = runQuickQuery($sql);
			if ($result->num_rows > 0){
				$dbChange = $dbChange . " UPDATE register Set modifyDate = Now(), status = ". ($record['isRegistered']==1? "'Pending'" : "'Cancelled'" )." where volId = ". $volId. " And eventId = ". $record['eventId'] . " And active = 1 ; ";
			}else{
				$dbChange = $dbChange  . " INSERT INTO register (eventId, volId, createDate, modifyDate, status, active)
				VALUES (".$record['eventId'].", ". $volId .",  Now(),  Now(), 'Pending', 1 ); ";
			}
		}
		runNonQuery($dbChange);
		return true;
	}else{
		return false;
	}
}

function updateRegistrationStatus($id, $status){
	$sql = "UPDATE `register` 
			SET  status= '".$status."'
			WHERE id = ". $id .";";
	return runQuery($sql);
}

function addVolunteerWork($email, $from, $to, $post, $remarks){
	if (checkLoginSession($email)){
		$volId = getVolunteerId($email);
		$sql = "Insert into `volunteer_work` (`volId`, `fromDate`, `toDate`, `post`, `status`, `active`, `remarks`, `createDate`, `modifyDate`)
				VALUES (". $volId .", '". $from ."', '". $to ."', '". $post ."', 'Pending', 1, '". $remarks ."', Now(), Now());";
		runNonQuery($sql);
		return updateGoogleCalendar('volunteer_work', null);
		return true;
	}else{
		return false;
	}
}

function cancelVolunteerWork($id, $email){
	if (checkLoginSession($email)){
		$sql = "UPDATE `volunteer_work` 
			SET status= 'Cancelled', modifyDate = Now()
			WHERE id = ". $id .";";
		runNonQuery($sql);
		return true;
	}else{
		return false;
	}
}

function login($email, $password){
	$pwHash = hash("sha256", $password);
	$sql= "SELECT 1
	From volunteer
	where LOWER(email) = '". strtolower($email) . "' and password = '". $pwHash . "'";
	$val =  validate($sql);
	if ($val){
		updateLoginTime($email);
	}
	return $val;
}

function updateLoginTime($email){
	$sql= "UPDATE `volunteer` set `loginTime` = Now() WHERE LOWER(email) = '". strtolower($email) ."';";
	runNonQuery($sql);
}

function checkLoginSession($email){
	//
	$sql= "SELECT 1
	From volunteer 
	where LOWER(`email`) ='" . strtolower($email) . 
	"' and `loginTime`is not null and ADDTIME(`loginTime`, '0 0:30:0') > NOW() ";	
	return validate($sql);
}

function deletePhoto($id){
	$sql= "DELETE FROM photo WHERE id = " . $id;
	return runQuery($sql);
}

function deleteAnnouncement($id){
	$sql= "DELETE FROM announcement WHERE id = " . $id;
	return runQuery($sql);
}


// vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv other vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv



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
function updateGoogleCalendar ($table, $id){

	switch ($table) {
		case 'event':
			$calendar = 'EVENT';
			break;
		case 'volunteer_work':
			$calendar = 'WORK';
			$sql= "SELECT `volunteer_work`.`id`, `volunteer`.`name`, `volunteer`.`email`, DATE_FORMAT(`fromDate`, '%Y-%m-%dT%TZ') AS `fromDate`, DATE_FORMAT(`toDate`, '%Y-%m-%dT%TZ') as `toDate`, `venue`, `location`, `post`, `status`, `remarks`, `volId` , `googleCalendarId` From `volunteer_work` 
		INNER join `volunteer` on `volunteer`.id = `volunteer_work`.`volId` "
		 ;
			break;
		default:
			$calendar = '';
			return;
			break;
	}
	if($id){
		$sql = $sql . " where `volunteer_work`.`id` = " . $id ;
	}else{
		//for create record case
		$sql = $sql . " order by `volunteer_work`.`id` desc limit 0 , 1" ;
	}

	$results = runQuickQuery($sql);
	
	if($results->num_rows > 0){
		while($result = $results->fetch_assoc()) {
			printf(json_encode($result));
			$test = $result->googleCalendarId;
			printf('   googleCalendarId: ' . $test);
		}
	}

	$googleCalendarId = callGoogleCalendar($calendar, null, "$eventName", "location", "description", "2019-09-10T00:00:00", "2019-10-10T09:09:09", ["$attendees"]);
	
	// $googleCalendarId = callGoogleCalendar($calendar, null, $eventName, $location, $description, $startTime, $endTime, $attendees);
	return true;

	// $sql= "UPDATE ". $table ." set `googleCalendarId` = " . $googleCalendarId . " WHERE id = '". $id ."';";
	// runNonQuery($sql);

	
}

?>