DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE `volunteer` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dob` date Not Null,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `loginTime` datetime Null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `volunteer`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `contactName` varchar(50) Not NULL,
  `contactEmail` varchar(255) Not NULL, 
  `venue` varchar(255) NOT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `quota` mediumint(9) NOT NULL,
  `applicationDeadline` date NOT NULL,
  `display` tinyint(1) DEFAULT 0,
  `active` tinyint(1) NOT NULL,
  `remarks` text NULL
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
  `createDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `register`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `photo`;
Create Table `photo` (
`id` mediumint(9) NOT NULL AUTO_INCREMENT,
`eventId` int(11) NOT NULL,
`type` varchar(50) NULL,
`path` varchar(1024) NOT NULL,
`des` varchar(1024) NULL,
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

