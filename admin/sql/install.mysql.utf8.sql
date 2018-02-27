DROP TABLE IF EXISTS `#__menurest`;


CREATE TABLE `#__menurest` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`categoryID` int(11) NOT NULL,
	`priceID` int(11) NOT NULL,
	`modalID` int(11) NOT NULL,
	`content` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `categoryID` (`categoryID`),
	KEY `priceID` (`priceID`),
	KEY `modalID` (`modalID`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_categories` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`catName` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_price` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`price` DECIMAL(6,2) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_modal` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`modalName` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;



