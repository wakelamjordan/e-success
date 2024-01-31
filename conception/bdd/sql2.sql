DROP DATABASE IF EXISTS `dbName`;

CREATE DATABASE IF NOT EXISTS `dbName` CHARACTER
SET
    `utf8` COLLATE `utf8_persian_ci`;

CREATE TABLE
    IF NOT EXISTS `dbName`.`civility` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`collaborateur` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`nationality` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`role` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` JSON NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`category_article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`stat_commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`number_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`news` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `title` VARCHAR(255) NOT NULL UNIQUE,
        `text` VARCHAR(255),
        `date` DATETIME DEFAULT NOW (),
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

----tables avec foreign KEY
CREATE TABLE
    IF NOT EXISTS `dbName`.`article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        `description` VARCHAR(255),
        `id_category_article` INT (12) NOT NULL,
        FOREIGN KEY (`id_category_article`) REFERENCES `dbName`.`category_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`price` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `price` DECIMAL(10.2) NOT NULL,
        `id_article` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_article`) REFERENCES `dbName`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`photo` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `path` VARCHAR(255) NOT NULL UNIQUE,
        `id_news` INT (12),
        `id_article` INT (12),
        FOREIGN KEY (`id_news`) REFERENCES `dbName`.`news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_article`) REFERENCES `dbName`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `dbName`.`people` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `surname` VARCHAR(255) NOT NULL,
        `date_birth` DATE NOT NULL,
        `place_birth` VARCHAR(255) NOT NULL,
        `id_nationality` INT (12) NOT NULL,
        `id_photo` INT (12) NOT NULL DEFAULT 1,
        `id_collaborateur` INT (12) NOT NULL,
        `id_civility` INT (12) NOT NULL,
        FOREIGN KEY (`id_nationality`) REFERENCES `dbName`.`nationality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_photo`) REFERENCES `dbName`.`photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_collaborateur`) REFERENCES `dbName`.`collaborateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_civility`) REFERENCES `dbName`.`civility` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

