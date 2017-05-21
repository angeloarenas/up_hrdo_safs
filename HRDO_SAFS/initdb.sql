DROP DATABASE IF EXISTS hrdodb;

CREATE DATABASE IF NOT EXISTS hrdodb;
CREATE USER IF NOT EXISTS 'hrdoadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON hrdodb.* TO 'hrdoadmin'@'localhost';

USE hrdodb;

CREATE TABLE `hrdodb`.`admin_login` ( `id` SERIAL NOT NULL ,
`adminnumber` VARCHAR(32) NOT NULL ,
`password` VARCHAR(255) NOT NULL ,
`firstname` VARCHAR(64) NOT NULL ,
`middleinitial` VARCHAR(8) NOT NULL ,
`lastname` VARCHAR(64) NOT NULL ,
PRIMARY KEY (`adminnumber`)) ENGINE = InnoDB;

CREATE TABLE `hrdodb`.`employees` ( `id` SERIAL NOT NULL ,
`employeenumber` VARCHAR(32) NOT NULL ,
`firstname` VARCHAR(64) NOT NULL ,
`middlename` VARCHAR(64) NOT NULL ,
`lastname` VARCHAR(64) NOT NULL ,
`suffix` VARCHAR(16) NOT NULL ,
`birthdate` DATE NOT NULL ,
`gender` VARCHAR(8) NOT NULL ,
`primaryemail` VARCHAR(128) NOT NULL ,
`secondaryemail` VARCHAR(128) NOT NULL ,
`primarycontact` VARCHAR(32) NOT NULL ,
`secondarycontact` VARCHAR(32) NOT NULL ,
`permanentaddress` VARCHAR(255) NOT NULL ,
`unit` VARCHAR(32) NOT NULL ,
`department` VARCHAR(32) NOT NULL ,
`employeetype` VARCHAR(32) NOT NULL ,
`employmentstatus` VARCHAR(32) NOT NULL ,
`rank` VARCHAR(128) NOT NULL ,
`originalassignment` DATE NOT NULL ,
PRIMARY KEY (`employeenumber`)) ENGINE = InnoDB;

CREATE TABLE `hrdodb`.`transactions` ( `id` SERIAL NOT NULL ,
`transactionnumber` VARCHAR(32) NOT NULL ,
`employeenumber` VARCHAR(32) NOT NULL ,
`applicationdate` DATE NOT NULL ,
`leavetype` VARCHAR(32) NOT NULL ,
`leavedetails` VARCHAR(32) NOT NULL ,
`leavestatus` VARCHAR(32) NOT NULL ,
`developmenttype` VARCHAR(128) NOT NULL ,
`degreepursued` VARCHAR(128) NOT NULL ,
`institution` VARCHAR(128) NOT NULL ,
`location` VARCHAR(128) NOT NULL ,
`country` VARCHAR(128) NOT NULL ,
`sponsordonor` VARCHAR(128) NOT NULL ,
`localabroad` VARCHAR(16) NOT NULL ,
`startdate` DATE NOT NULL ,
`enddate` DATE NOT NULL ,
`duration` VARCHAR(64) NOT NULL ,
`reportforduty` DATE NOT NULL ,
`rso` VARCHAR(64) NOT NULL ,
`rsostatus` VARCHAR(32) NOT NULL ,
PRIMARY KEY (`transactionnumber`),
FOREIGN KEY (`employeenumber`) REFERENCES `employees`(`employeenumber`)) ENGINE = InnoDB;

CREATE TABLE `hrdodb`.`contact_sureties` ( `id` SERIAL NOT NULL ,
`name` VARCHAR(128) NOT NULL ,
`address` VARCHAR(255) NOT NULL ,
`contactno` VARCHAR(32) NOT NULL ,
`email` VARCHAR(64) NOT NULL ,
`employeenumber` VARCHAR(32) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;


INSERT INTO `admin_login` (`id`, `adminnumber`, `password`, `firstname`, `middleinitial`, `lastname`)
VALUES
(NULL, '2000-00001', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Paola', 'T', 'Simon'),
(NULL, '2000-00002', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Faith', 'L', 'Toledo');

INSERT INTO `employees` (`id`, `employeenumber`, `firstname`, `middlename`,
  `lastname`, `suffix`, `birthdate`, `gender`, `primaryemail`,
  `secondaryemail`, `primarycontact`, `secondarycontact`, `permanentaddress`,
  `unit`, `department`, `employeetype`, `employmentstatus`, `rank`,
  `originalassignment`)
VALUES
(NULL, '123456789', 'Clarence', 'Inciong', 'Co', 'Jr',
  '1996-10-01', 'Male', 'clarence@email.com',
  'clarence@ymail.com', '0999 999 9999', '0999 999 9999',
  'Quezon City', 'ACCTG', 'AIT', 'FAC', 'Permanent',
  'Professor VI', '2014-05-22'),
(NULL, '234567890', 'David', 'Co', 'Inciong', 'III',
  '1996-10-05', 'Male', 'david@email.com',
  'david@ymail.com', '0999 999 9999', '0999 999 9999',
  'Makati City', 'ACCTG', 'AIT', 'FAC', 'Permanent',
  'Professor VI', '2016-03-22'),
(NULL, '345678901', 'Rence', 'Renz', 'Renzen', '',
  '1999-08-12', 'Male', 'rence@email.com',
  'rence@ymail.com', '0999 999 9999', '0999 999 9999',
  'Taguig City', 'ACCTG', 'AIT', 'FAC', 'Permanent',
  'Professor VI', '2017-09-03');

INSERT INTO `transactions` (`id`, `transactionnumber`, `employeenumber`, `applicationdate`, `leavetype`, `leavedetails`,
  `leavestatus`, `developmenttype`, `degreepursued`, `institution`, `location`,
  `country`, `sponsordonor`, `localabroad`, `startdate`, `enddate`, `duration`,
  `reportforduty`, `rso`, `rsostatus`)
VALUES
(NULL, '0000001', '123456789', '2013-10-26', 'Study Leave with Pay', 'Full-Time', 'Original', 'Master of Science',
  'Computer Science', 'Harvard University', 'South Carolina', 'Albania',
  'Willie Revillame', 'Abroad', '2014-08-02', '2018-06-02', '4y 2m 0d',
  '2018-06-03', '8y 4m 0d', 'Unserved'),
(NULL, '0000002', '234567890', '2015-04-15', 'Study Leave with Pay', 'Full-Time', 'Original', 'Master of Science',
  'Industrial Engineering', 'Cambridge University', 'Cambridge', 'Albania',
  'Chiz Ezcudero', 'Abroad', '2016-08-02', '2010-06-02', '4y 2m 0d',
  '2018-06-03', '8y 4m 0d', 'Unserved'),
(NULL, '0000003', '345678901', '2017-09-22', 'Study Leave with Pay', 'Full-Time', 'Original', 'Master of Science',
  'Mechanical Engineering', 'Cambridge University', 'Cambridge', 'Albania',
  'Ping Lacson', 'Abroad', '2018-08-02', '2022-06-02', '4y 2m 0d',
  '2018-06-03', '8y 4m 0d', 'Unserved');

INSERT INTO `contact_sureties` (`id`, `name`, `address`, `contactno`, `email`, `employeenumber`)
VALUES
(NULL, 'Jaye S. Hernandez', 'Bulacan', '099 999 9999', 'jaye@email.com', '123456789'),
(NULL, 'Marlice H. Santos', 'Bulacan', '099 999 9999', 'marlice@email.com', '123456789'),
(NULL, 'Juan G. Mapua', 'Quezon City', '099 999 9999', 'juan@email.com', '123456789'),

(NULL, 'Antonio M. Gornal', 'Quezon City', '099 999 9999', 'antonio@email.com', '234567890'),
(NULL, 'Francis R. Galang', 'Baguio City', '099 999 9999', 'francis@email.com', '234567890'),
(NULL, 'Adrian G. Ramon', 'Taguig City', '099 999 9999', 'adrian@email.com', '234567890'),

(NULL, 'Michael P. Ancheta', 'Manila City', '099 999 9999', 'michael@email.com', '345678901'),
(NULL, 'Richard A. Paderna', 'Makati City', '099 999 9999', 'richard@email.com', '345678901'),
(NULL, 'Davin V. Ferrer', 'Batangas City', '099 999 9999', 'davin@email.com', '345678901');
