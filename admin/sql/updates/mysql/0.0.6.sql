DROP TABLE IF EXISTS `#__menurest`;


CREATE TABLE `#__menurest` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`categoryID` int(11) NOT NULL,
	`priceID` int(11) NOT NULL,
	`modalID` int(11) NOT NULL,
	`content` VARCHAR(255) NOT NULL,
	`celery` tinyint(1) NOT NULL,
	`cereals` tinyint(1) NOT NULL,
	`crustaceans` tinyint(1) NOT NULL,
	`eggs` tinyint(1) NOT NULL,
	`fish` tinyint(1) NOT NULL,
	`lupin` tinyint(1) NOT NULL,
	`milk` tinyint(1) NOT NULL,
	`molluscs` tinyint(1) NOT NULL,
	`nuts` tinyint(1) NOT NULL,
	`peanuts` tinyint(1) NOT NULL,
	`mustard` tinyint(1) NOT NULL,
	`soybeans` tinyint(1) NOT NULL,
	`sesame` tinyint(1) NOT NULL,
	`sulphites` tinyint(1) NOT NULL,
	`vegetarian` tinyint(1) NOT NULL,
	`vegan` tinyint(1) NOT NULL,
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

