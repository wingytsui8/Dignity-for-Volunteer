<?php
require __DIR__ . '/vendor/autoload.php';

define("CALENDAR_ID_EVENT", "vnf07nhstfsusmud5u7m4qpeqs@group.calendar.google.com");
define("CALENDAR_ID_VOLUNTEER_WORK", "ok84ujfbk95gnmsnoqmem9c850@group.calendar.google.com");
define("CALENDAR_ID_DIGNITY", "dignityforvolunteer@gmail.com");
define("TIMEZONE_KL", "Asia/Kuala_Lumpur");


// if (php_sapi_name() != 'cli') {
// 	throw new Exception('This application must be run on the command line.');
// }

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
	$client = new Google_Client();
	$client->setApplicationName('Google Calendar API PHP Quickstart');
	$client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
	$client->setAuthConfig('credentials.json');
	$client->setAccessType('offline');
	$client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
	$tokenPath = 'token.json';
	if (file_exists($tokenPath)) {
		$accessToken = json_decode(file_get_contents($tokenPath), true);
		$client->setAccessToken($accessToken);
	}

    // If there is no previous token or it's expired.
	if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
		if ($client->getRefreshToken()) {
			$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
		} else {
            // Request authorization from the user.
			$authUrl = $client->createAuthUrl();
			printf("Open the following link in your browser:\n%s\n", $authUrl);
			print 'Enter verification code: ';
			$authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
			$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
			$client->setAccessToken($accessToken);

            // Check to see if there was an error.
			if (array_key_exists('error', $accessToken)) {
				throw new Exception(join(', ', $accessToken));
			}
		}
        // Save the token to a file.
		if (!file_exists(dirname($tokenPath))) {
			mkdir(dirname($tokenPath), 0700, true);
		}
		file_put_contents($tokenPath, json_encode($client->getAccessToken()));
	}
	return $client;
}

function callGoogleCalendar($calendar, $eventId, $eventName, $location, $description, $startTime, $endTime, $attendees){
	switch ($calendar) {
		case 'EVENT':
			$calendarId = CALENDAR_ID_EVENT;
			break;
		case 'WORK':
			$calendarId = CALENDAR_ID_VOLUNTEER_WORK;
			break;
		default:
			$calendarId = CALENDAR_ID_DIGNITY;
			break;
	} 

	//create event object
	//create attendees array
	$emailArray = [];
	foreach ($attendees as $attendee) {
	 	$email = array( 'email' => $attendee);
	 	$emailArray[] = $email;
	}

	$event = new Google_Service_Calendar_Event(array(
		'summary' => $eventName,
		'location' => $location,
		'description' => $description,
		'start' => array(
			'dateTime' => $startTime,
			'timeZone' => TIMEZONE_KL,
		),
		'end' => array(
			'dateTime' => $endTime,
			'timeZone' => TIMEZONE_KL,
		),
  		'attendees' => $emailArray,
	));

 	// call google API to create client service
	$client = getClient();
	$service = new Google_Service_Calendar($client);
	// cal; google API to create / update event
	if ($eventId){
		$event = $service->events->update($calendarId, $eventId, $event);
	}else{
		$event = $service->events->insert($calendarId, $event);
	}
	return json_encode($event->getId());
}

?>