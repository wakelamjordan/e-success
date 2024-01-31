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

CREATE TABLE IF NOT EXISTS `dbName`.`news` (
  `id` INT(12) NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL UNIQUE,
  `text` VARCHAR(255),
  `date` DATETIME DEFAULT NOW()
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

