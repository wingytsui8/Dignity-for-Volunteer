INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`) VALUES (NULL, 'North Point Alliance Church HK Visit', '2019-04-20T10:00:00', '2019-04-27T11:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2019-03-27','1');

INSERT INTO `volunteer` (`name`, `dob`, `email`, `password`, `active`) VALUES ( 'admin', '2019-05-01', 'DignityforVolunteer@gmail.com' , '24ee4dc136bc9c413d6b530494ec1bfbc733769b1d3e340572b5fb9d198f864b', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Sam Tang', '1992-09-02', 'neiamenase@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Testing 1', '1992-09-02', 'testing1@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Testing 2', '1992-09-02', 'testing2@gmail.com', '9c547119a74092b81f6c07be2029dc64833b5eea176bfe740c75261c5b51e8a8', '1');

INSERT INTO `volunteer` (`name`,`dob`,`email`,`password`,`active`) VALUES('Tony','1998-09-26','tony95148684@gmail.com','140ee5f33ebdc0571cffb04404bba15c3ffcfbf3745f462b2e4acbb45a499f95','1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '2', 'Confirmed', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '3', 'Cancelled', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '4', 'Confirmed', '2019-03-20', '2019-05-01', '1');

INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`) VALUES (NULL, 'Upcoming Event', '2029-04-20T10:00:00', '2029-04-20T15:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2029-03-27','1');

INSERT INTO `event` (`id`, `name`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`) VALUES (NULL, 'Cancelled Event', '2039-04-20T10:00:00', '2039-04-20T23:00:00', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2019-03-27','0');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '2', 'Confirmed', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '3', 'Cancelled', '2019-04-20', '2019-05-01', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '2', '4', 'Confirmed', '2019-03-20', '2019-05-01', '1');
