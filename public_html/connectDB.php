<?php

   
	if (isset($_POST['action'])) {
	    switch ($_POST['action']) {
	        case 'draw':
	        alert("action : " + $_POST['action']);
	        	if (isset($_POST['upcomingEId'])){
	        		alert("upcomingEId : " + $_POST['upcomingEId']);
	        		$list = getToDrawList($_POST['upcomingEId']);
					alert("action performed successfully");
	        	}
	            break;
	    }
	}

	function login($email, $password){
		$sql= "SELECT e.name as Name, Date, Venue, Location
				From event  e 
			    inner join `group` g on e.groupId = g.id and (g.name like 'WWS%' or g.name = 'Master')
			    order by date DESC";

	    return runQuery($sql);
	}

	function getEvent(){
		$sql= "SELECT name as Name, fromDate as `From` , toDate as `To`, Venue, Location, contactName as `Contact Person`, contactEmail as `Contact Email`, applicationDeadline as `Application Deadline`, quota as Quota
				From event  
			    order by fromDate DESC";
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