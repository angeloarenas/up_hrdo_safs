DROP DATABASE IF EXISTS hrdodb;

CREATE DATABASE IF NOT EXISTS hrdodb;

CREATE USER IF NOT EXISTS 'hrdoadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON hrdodb.* TO 'hrdoadmin'@'localhost';

CREATE USER IF NOT EXISTS 'hrdo_safs_report'@'localhost' IDENTIFIED BY 'melonlemon';
GRANT SELECT ON *.* TO 'hrdo_safs_report'@'localhost' IDENTIFIED BY 'melonlemon';

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
