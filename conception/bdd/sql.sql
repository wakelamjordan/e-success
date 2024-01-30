mysql - u root - p CREATE DATABASE `e_success` DEFAULT CHARACTER
SET
    utf8 COLLATE utf8_unicode_ci;

USE e_success;

DROP DATABASE `e_success`;

CREATE DATABASE IF NOT EXISTS `e_success` CHARACTER
SET
    `utf8` COLLATE `utf8_persian_ci`;

USE e_success;

CREATE TABLE
    IF NOT EXISTS `e_success`.`civility_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`collaborateur_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`nationality_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`role_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`category_article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`stat_commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`number_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`news` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `title_news` VARCHAR(255) NOT NULL,
        `text_news` VARCHAR(255) NOT NULL,
        `date_news` DATE NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`article` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `libelle` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255),
        `id_category_article` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_category_article`) REFERENCES `e_success`.`category_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`price` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `price` DECIMAL NOT NULL,
        `id_article` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`photo` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `path_photo` VARCHAR(255) NOT NULL,
        `id_news` INT (12) NOT NULL UNIQUE,
        `id_article` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_news`) REFERENCES `e_success`.`news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`people` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(50) NOT NULL,
        `surname` VARCHAR(50) NOT NULL,
        `date_birth` DATE NOT NULL,
        `place_birth` VARCHAR(50) NOT NULL,
        `id_photo` INT (12) NOT NULL UNIQUE,
        `id_collaborateur_type` INT (12) NOT NULL UNIQUE,
        `id_civility_type` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_photo`) REFERENCES `e_success`.`photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_collaborateur_type`) REFERENCES `e_success`.`collaborateur_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_civility_type`) REFERENCES `e_success`.`civility_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`account` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `login` VARCHAR(255) NOT NULL,
        `mail` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `id_people` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`address` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `number` DECIMAL NOT NULL,
        `address_line` VARCHAR(255) NOT NULL,
        `street` VARCHAR(255) NOT NULL,
        `city` VARCHAR(255) NOT NULL,
        `postal_code` INT NOT NULL,
        `state` VARCHAR(255) NOT NULL,
        `country` VARCHAR(255) NOT NULL,
        `id_people` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`commande` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `date` DATE NOT NULL,
        `id_people` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`article_commande` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `price` DECIMAL NOT NULL,
        `id_article` INT NOT NULL UNIQUE,
        `id_commande` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`date_state_commande` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `date_state` DATE NOT NULL,
        `id_stat_commande` INT NOT NULL UNIQUE,
        `id_commande` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_stat_commande`) REFERENCES `e_success`.`stat_commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`number` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `number` INT NOT NULL UNIQUE,
        `id_people` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`roles` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `id_account` INT NOT NULL UNIQUE,
        `id_role_type` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_account`) REFERENCES `e_success`.`account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_role_type`) REFERENCES `e_success`.`role_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`account_data` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `new_mail` VARCHAR(255) NOT NULL UNIQUE,
        `last_connexion` DATE NOT NULl,
        `controle_new_mail` INT NOT NULl,
        `id_account` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_account`) REFERENCES `e_success`.`account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`people_nationality_type` (
        `id_people` INT (12) NULL PRIMARY KEY,
        `id_nationality_type` INT NOT NULL,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`number_type_number` (
        `id_number` INT (12) NULL PRIMARY KEY,
        `id_number_type` INT,
        FOREIGN KEY (`id_number`) REFERENCES `e_success`.`number` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_number_type`) REFERENCES `e_success`.`number_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

show tables;

INSERT INTO `e_success`.`nationality_type` (`libelle`) VALUES
('Afghan'),
('Albanian'),
('Algerian'),
('American'),
('Andorran'),
('Angolan'),
('Antiguans'),
('Argentinean'),
('Armenian'),
('Australian'),
('Austrian'),
('Azerbaijani'),
('Bahamian'),
('Bahraini'),
('Bangladeshi'),
('Barbadian'),
('Barbudans'),
('Batswana'),
('Belarusian'),
('Belgian'),
('Belizean'),
('Beninese'),
('Bhutanese'),
('Bolivian'),
('Bosnian'),
('Brazilian'),
('British'),
('Bruneian'),
('Bulgarian'),
('Burkinabe'),
('Burmese'),
('Burundian'),
('Cambodian'),
('Cameroonian'),
('Canadian'),
('Cape Verdean'),
('Central African'),
('Chadian'),
('Chilean'),
('Chinese'),
('Colombian'),
('Comoran'),
('Congolese'),
('Costa Rican'),
('Croatian'),
('Cuban'),
('Cypriot'),
('Czech'),
('Danish'),
('Djibouti'),
('Dominican'),
('Dutch'),
('East Timorese'),
('Ecuadorean'),
('Egyptian'),
('Emirian'),
('Equatorial Guinean'),
('Eritrean'),
('Estonian'),
('Ethiopian'),
('Fijian'),
('Filipino'),
('Finnish'),
('French'),
('Gabonese'),
('Gambian'),
('Georgian'),
('German'),
('Ghanaian'),
('Greek'),
('Grenadian'),
('Guatemalan'),
('Guinea-Bissauan'),
('Guinean'),
('Guyanese'),
('Haitian'),
('Herzegovinian'),
('Honduran'),
('Hungarian'),
('I-Kiribati'),
('Icelander'),
('Indian'),
('Indonesian'),
('Iranian'),
('Iraqi'),
('Irish'),
('Israeli'),
('Italian'),
('Ivorian'),
('Jamaican'),
('Japanese'),
('Jordanian'),
('Kazakhstani'),
('Kenyan'),
('Kittian and Nevisian'),
('Kuwaiti'),
('Kyrgyz'),
('Laotian'),
('Latvian'),
('Lebanese'),
('Liberian'),
('Libyan'),
('Liechtensteiner'),
('Lithuanian'),
('Luxembourger'),
('Macedonian'),
('Malagasy'),
('Malawian'),
('Malaysian'),
('Maldivan'),
('Malian'),
('Maltese'),
('Marshallese'),
('Mauritanian'),
('Mauritian'),
('Mexican'),
('Micronesian'),
('Moldovan'),
('Monacan'),
('Mongolian'),
('Moroccan'),
('Mosotho'),
('Motswana'),
('Mozambican'),
('Namibian'),
('Nauruan'),
('Nepalese'),
('New Zealander'),
('Nicaraguan'),
('Nigerian'),
('Nigerien'),
('North Korean'),
('Northern Irish'),
('Norwegian'),
('Omani'),
('Pakistani'),
('Palauan'),
('Panamanian'),
('Papua New Guinean'),
('Paraguayan'),
('Peruvian'),
('Polish'),
('Portuguese'),
('Qatari'),
('Romanian'),
('Russian'),
('Rwandan'),
('Saint Lucian'),
('Salvadoran'),
('Samoan'),
('San Marinese'),
('Sao Tomean'),
('Saudi'),
('Scottish'),
('Senegalese'),
('Serbian'),
('Seychellois'),
('Sierra Leonean'),
('Singaporean'),
('Slovakian'),
('Slovenian'),
('Solomon Islander'),
('Somali'),
('South African'),
('South Korean'),
('Spanish'),
('Sri Lankan'),
('Sudanese'),
('Surinamer'),
('Swazi'),
('Swedish'),
('Swiss'),
('Syrian'),
('Taiwanese'),
('Tajik'),
('Tanzanian'),
('Thai'),
('Togolese'),
('Tongan'),
('Trinidadian or Tobagonian'),
('Tunisian'),
('Turkish'),
('Tuvaluan'),
('Ugandan'),
('Ukrainian'),
('Uruguayan'),
('Uzbekistani'),
('Venezuelan'),
('Vietnamese'),
('Welsh'),
('Yemenite'),
('Zambian'),
('Zimbabwean');
