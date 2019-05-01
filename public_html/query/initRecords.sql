INSERT INTO `event` (`id`, `name`, `status`, `fromDate`, `toDate`, `contactName`, `contactEmail`, `venue`, `location`, `quota`, `applicationDeadline`, `active`) VALUES (NULL, 'North Point Alliance Church HK Visit', 'End', '2019-04-20', '2019-04-27', 'Rochelle', 'rochelle@dignityforchildren.org', 'EatXDignity', '25-G, Jalan 11/48a, Sentul Raya Boulevard, 51000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia', '14', '2019-03-27','1');

INSERT INTO `volunteer` (`name`, `dob`, `email`, `password`, `active`) VALUES ( 'admin', '2019-05-01', 'DignityforVolunteer@gmail.com' , '$2y$10$kgm5Bie5d0wHnTEBvYAiIOw84esDs6fneZ0cpDUiqxPtrS2W2bnVW', '1');

INSERT INTO `volunteer` (`id`, `name`, `dob`, `email`, `password`, `active`) VALUES (NULL, 'Sam Tang', '1992-09-02', 'neiamenase@gmail.com', '$2y$10$JBoI9RBl.AGJuYNa7wzvjeaeB/t80SLj0Skm/pJvrQYiRYmU9DiDW', '1');

INSERT INTO `register` (`id`, `eventId`, `volId`, `status`, `createDate`, `modifyDate`, `active`) VALUES (NULL, '1', '2', 'Confirmed', '2019-04-20', '2019-05-01', '1');