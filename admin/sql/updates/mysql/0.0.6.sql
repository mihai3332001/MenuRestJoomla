DROP TABLE IF EXISTS `#__menurest`;

CREATE TABLE `#__menurest` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`categoryID` int(11) NOT NULL,
	`priceID` int(11) NOT NULL,
	`modalID` int(11) NOT NULL,
	`content` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_categories` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_price` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`price` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__menurest_modal` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;



