DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE `volunteer` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dob` date Not Null,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `volunteer`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `contactName` varchar(50) Not NULL,
  `contactEmail` varchar(255) Not NULL, 
  `venue` varchar(255) NOT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `quota` mediumint(9) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `event`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` mediumint(9) NOT NULL,
  `eventId` mediumint(9) NOT NULL,
  `volId` mediumint(9) NOT NULL,
  `createDate` date NOT NULL,
  `modifyDate` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `register`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  
