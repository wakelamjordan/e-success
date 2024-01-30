mysql - u root - p CREATE DATABASE `ecf_v4` DEFAULT CHARACTER
SET
    utf8 COLLATE utf8_unicode_ci;

USE ecf_v4;

DROP DATABASE `ecf_v4`;

CREATE DATABASE IF NOT EXISTS `ecf_v4` CHARACTER
SET
    `utf8` COLLATE `utf8_persian_ci`;

USE ecf_v4;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`civility_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`collaborateur_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`nationality_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`role_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`category_article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`stat_commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `ecf_v4`.`number_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`libelle`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `ecf_v4`.`news` (
  `id` INT(12) NULL AUTO_INCREMENT,
  `title_news` VARCHAR(255) NOT NULL,
  `text_news` VARCHAR(255) NOT NULL,
  `date_news` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `ecf_v4`.`article` (
  `id` INT(12) NULL AUTO_INCREMENT,
  `libelle` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255),
  `id_category_article` INT(12) NOT NULL,
  FOREIGN KEY (`id_category_article`) REFERENCES `ecf_v4`.`category_article`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (`id`),
  UNIQUE (`libelle`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `ecf_v4`.`price` (
  `id` INT(12) NULL AUTO_INCREMENT,
  `price` DECIMAL NOT NULL,
  `id_article` INT(12) NOT NULL,
  FOREIGN KEY (`id_article`) REFERENCES `ecf_v4`.`article`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (`id`),
  UNIQUE (`id_article`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `ecf_v4`.`photo` (
  `id` INT(12) NULL AUTO_INCREMENT,
  `path_photo` VARCHAR(255) NOT NULL,
  `id_news` INT(12) NOT NULL,
  `id_article` INT(12) NOT NULL,
  FOREIGN KEY (`id_news`) REFERENCES `ecf_v4`.`news`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_article`) REFERENCES `ecf_v4`.`article`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;