INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`, `remarks`) 
VALUES 
(NULL, 'North Point Alliance Church HK Visit', '2019-04-20T10:00:00', '2019-04-27T11:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 
	'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', 
	'2019-03-27','1', 'Switch on the sky, and the stars glow for you
Go see the world \'cause it\'s all so brand new
Don\'t close your eyes
\'Cause your future\'s ready to shine
It\'s just a matter of time
Before we learn how to fly
Welcome to the rhythm of the night
There\'s something in the air you can\'t deny
It\'s been fun, but now I\'ve got to go
Life is way too short to take it slow
But before I go and hit the road
I gotta know, till then
When can we do this again?
Oh oh, oh, oh
When can I see you again?');

INSERT INTO `volunteer` (`name`, `dob`, `email`, `password`, `active`) VALUES ( 'admin', '2019-05-01', 'DignityforVolunteer@gmail.com' , '24ee4dc136bc9c413d6b530494ec1bfbc733769b1d3e340572b5fb9d198f864b', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (2, 'Sam Tang', '1992-09-02', 'neiamenase@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Testing 1', '1992-09-02', 'testing1@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Testing 2', '1992-09-02', 'testing2@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`name`,`dob`,`email`,`password`,`active`) VALUES('Tony','1998-09-26','tony95148684@gmail.com','140ee5f33ebdc0571cffb04404bba15c3ffcfbf3745f462b2e4acbb45a499f95','1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '2', 'Confirmed', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '3', 'Cancelled', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '4', 'Confirmed', '2019-03-20', '2019-05-01', '1');

INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`, `remarks`) VALUES (NULL, 'Upcoming Event', '2029-04-20T10:00:00', '2029-04-20T15:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2029-03-27','1', 'This is a whole new upcoming event!');

INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`) VALUES (NULL, 'Cancelled Event', '2039-04-20T10:00:00', '2039-04-20T23:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2019-03-27','0');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '2', 'Confirmed', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '3', 'Cancelled', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '4', 'Confirmed', '2019-03-20', '2019-05-01', '1');

INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`, `remarks`) VALUES (NULL, 'upcoming 2', '2020-05-01 00:00:00', '2021-01-28 00:00:00', 'Sam', 'neiamenase@gmail.com', 'somewhere in the Earth', 'whatever', '1', '2019-05-25', '1', 'There is another upcoming'), (NULL, 'upcoming 3', '2020-05-01 00:00:00', '2020-05-14 00:00:00', 'Sam', '123@123.123', 'whatever', 'Flat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLU', '2', '2019-05-31', '1', 'Flat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLUFlat 26 67, Fake Street East, Whatever Island, Somewhere on the Earth, Fake country, JLU');

INSERT INTO `register` (`id`, `eventId`, `volId`, `createDate`, `modifyDate`, `status`, `active`) VALUES (NULL, '4', '2', '2019-05-25 00:00:00', '2019-05-25 00:00:00', 'Confirmed', '1'), (NULL, '5', '2', '2019-05-25 00:00:00', '2019-05-25 00:00:00', 'Cancelled', '1');

INSERT INTO `volunteer_work` (`id`, `volId`, `fromDate`, `toDate`, `venue`, `location`, `post`, `status`, `active`, `remarks`) VALUES (NULL, '2', '2019-04-20', '2019-04-27', 'EAT X Dignity', NULL, 'Teacher', 'Confirmed', '1', 'By Sam Tang.');

INSERT INTO `volunteer_work` (`id`, `volId`, `fromDate`, `toDate`, `venue`, `location`, `post`, `status`, `active`, `remarks`) VALUES (NULL, '2', '2020-06-01 00:00:00', '2020-07-01 00:00:00', NULL, NULL, 'IT Support', 'Pending', '1', 'test, by Sam');