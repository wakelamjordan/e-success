DROP DATABASE IF EXISTS `e_success`;

CREATE DATABASE IF NOT EXISTS `e_success` CHARACTER
SET
    `utf8` COLLATE `utf8_persian_ci`;

CREATE TABLE
    IF NOT EXISTS `e_success`.`civility` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`collaborateur` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`nationality` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`role` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `rang` INT(12) NOT NULL,
        `libelle` VARCHAR(50) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`category_article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`state_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

/* CREATE TABLE
    IF NOT EXISTS `e_success`.`phone_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci; */

CREATE TABLE
    IF NOT EXISTS `e_success`.`news` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `title` VARCHAR(255) NOT NULL UNIQUE,
        `text` VARCHAR(255),
        `date` DATETIME DEFAULT NOW(),
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

----tables avec foreign KEY
CREATE TABLE
    IF NOT EXISTS `e_success`.`article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(255) NOT NULL UNIQUE,
        `description` VARCHAR(255),
        `id_category_article` INT (12) NOT NULL,
        FOREIGN KEY (`id_category_article`) REFERENCES `e_success`.`category_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`price` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `price` DECIMAL(10.2) NOT NULL,
        `id_article` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`photo` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `path` VARCHAR(255) NOT NULL UNIQUE,
        `id_news` INT (12),
        `id_article` INT (12),
        FOREIGN KEY (`id_news`) REFERENCES `e_success`.`news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`people` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `surname` VARCHAR(255) NOT NULL,
        `date_birth` DATE NOT NULL,
        `place_birth` VARCHAR(255),
        `id_nationality` INT (12)NOT NULL DEFAULT 1,
        `id_photo` INT (12) NOT NULL DEFAULT 1,
        `id_collaborateur` INT (12),
        `id_civility` INT (12),
        FOREIGN KEY (`id_nationality`) REFERENCES `e_success`.`nationality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_photo`) REFERENCES `e_success`.`photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_collaborateur`) REFERENCES `e_success`.`collaborateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_civility`) REFERENCES `e_success`.`civility` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`user` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `phone` VARCHAR(255) UNIQUE,
        `mail` VARCHAR(255) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `roles` JSON DEFAULT '["ROLE_USER"]',
        `new_mail` VARCHAR(255),
        `last_connexion` DATETIME DEFAULT NOW(),
        `code_new_mail` INT (12),
        `date_create` DATETIME NOT NULL,
        `id_people` INT (12) NOT NULL UNIQUE,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`address` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `no` DECIMAL(10.2) NOT NULL,
        `address_line` VARCHAR(255) NOT NULL,
        `street` VARCHAR(255) NOT NULL,
        `city` VARCHAR(255) NOT NULL,
        `postal_code` INT (12) NOT NULL,
        `state` VARCHAR(255) NOT NULL,
        `country` VARCHAR(255) NOT NULL,
        `id_people` INT (12) NOT NULL,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `id_people` INT (12) NOT NULL,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`article_commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `price` DECIMAL(10.2) NOT NULL,
        `id_article` INT (12) NOT NULL,
        `id_commande` INT (12) NOT NULL,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`state_commande` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `id_commande` INT (12) NOT NULL,
        `id_state_type` INT (12) NOT NULL,
        `date_state` DATETIME DEFAULT NOW(),
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_state_type`) REFERENCES `e_success`.`state_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

/* CREATE TABLE
    IF NOT EXISTS `e_success`.`phone` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `phone_number` VARCHAR(255) NOT NULL UNIQUE,
        `id_people` INT (12) NOT NULL,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci; */

/* CREATE TABLE
    IF NOT EXISTS `e_success`.`phone_type_phone` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `id_phone` INT (12) NOT NULL,
        `id_phone_type` INT (12) NOT NULL,
        FOREIGN KEY (`id_phone`) REFERENCES `e_success`.`phone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_phone_type`) REFERENCES `e_success`.`phone_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci; */

------------------------------------------------------------------------------------------------------------
/* civility */
INSERT INTO
    `e_success`.`civility` (`libelle`)
VALUES
    ('Monsieur'),
    ('Madame'),
    ('Non genrée');

/* collaborateur */
INSERT INTO `e_success`.`collaborateur` (`libelle`) VALUES
    ('CDI'),
    ('CDD'),
    ('Freelance'),
    ('Interim'),
    ('Stagiaire');

/* nationality */
INSERT INTO `e_success`.`nationality` (`libelle`) VALUES
    ('NC'),
    ('Spanish'),
    ('Afghan'),
    ('Albanian'),
    ('Algerian'),
    ('American Samoa'),
    ('Andorran'),
    ('Angolan'),
    ('Anguillan'),
    ('Antarctic'),
    ('Antiguan and Barbudan'),
    ('Argentine'),
    ('Armenian'),
    ('Aruban'),
    ('Australian'),
    ('Austrian'),
    ('Azerbaijani'),
    ('Bahamian'),
    ('Bahraini'),
    ('Bangladeshi'),
    ('Barbadian'),
    ('Belarusian'),
    ('Belgian'),
    ('Belizean'),
    ('Beninese'),
    ('Bermudian'),
    ('Bhutanese'),
    ('Bolivian'),
    ('Bonaire, Sint Eustatius, and Saba'),
    ('Bosnian and Herzegovinian'),
    ('Motswana'),
    ('Bouvet Island'),
    ('Brazilian'),
    ('British'),
    ('Brunei'),
    ('Bulgarian'),
    ('Burkina Faso'),
    ('Burundian'),
    ('Cabo Verde'),
    ('Cambodian'),
    ('Cameroonian'),
    ('Canadian'),
    ('Cayman Islands'),
    ('Central African'),
    ('Chadian'),
    ('Chilean'),
    ('Chinese'),
    ('Christmas Island'),
    ('Cocos (Keeling) Islands'),
    ('Colombian'),
    ('Comoran'),
    ('Congo (Congo-Kinshasa)'),
    ('Cook Islands'),
    ('Costa Rican'),
    ('Croatian'),
    ('Cuban'),
    ('Curaçao'),
    ('Cypriot'),
    ('Czech'),
    ('Ivorian'),
    ('Danish'),
    ('Djiboutian'),
    ('Dominican'),
    ('Ecuadorian'),
    ('Egyptian'),
    ('Salvadoran'),
    ('Equatorial Guinean'),
    ('Eritrean'),
    ('Estonian'),
    ('Ethiopian'),
    ('Falkland Islands'),
    ('Faroe Islands'),
    ('Fijian'),
    ('Finnish'),
    ('French'),
    ('French Guiana'),
    ('French Polynesia'),
    ('French Southern Territories'),
    ('Gabonese'),
    ('Gambian'),
    ('Georgian'),
    ('German'),
    ('Ghanaian'),
    ('Gibraltar'),
    ('Greek'),
    ('Greenlandic'),
    ('Grenadian'),
    ('Guadeloupe'),
    ('Guam'),
    ('Guatemalan'),
    ('Guernsey'),
    ('Guinean'),
    ('Guinea-Bissauan'),
    ('Guyanese'),
    ('Haitian'),
    ('Heard Island and McDonald Islands'),
    ('Vatican City'),
    ('Honduran'),
    ('Hong Kong'),
    ('Hungarian'),
    ('Icelandic'),
    ('Indian'),
    ('Indonesian'),
    ('Iranian'),
    ('Iraqi'),
    ('Irish'),
    ('Isle of Man'),
    ('Israeli'),
    ('Italian'),
    ('Jamaican'),
    ('Japanese'),
    ('Jersey'),
    ('Jordanian'),
    ('Kazakhstani'),
    ('Kenyan'),
    ('I-Kiribati'),
    ('South Korean'),
    ('Kuwaiti'),
    ('Kyrgyz'),
    ('Laotian'),
    ('Latvian'),
    ('Lebanese'),
    ('Basotho'),
    ('Liberian'),
    ('Libyan'),
    ('Liechtenstein'),
    ('Lithuanian'),
    ('Luxembourgish'),
    ('Macanese'),
    ('Malagasy'),
    ('Malawian'),
    ('Malaysian'),
    ('Maldivian'),
    ('Malian'),
    ('Maltese'),
    ('Portuguese'),
    ('Marshall Islands'),
    ('Martiniquais'),
    ('Mauritanian'),
    ('Mauritian'),
    ('Mahoran'),
    ('Mexican'),
    ('Micronesian'),
    ('Moldovan'),
    ('Monegasque'),
    ('Mongolian'),
    ('Montenegrin'),
    ('Montserratian'),
    ('Moroccan'),
    ('Mozambican'),
    ('Burmese'),
    ('Namibian'),
    ('Nauruan'),
    ('Nepali'),
    ('Dutch'),
    ('New Caledonia'),
    ('New Zealand'),
    ('Nicaraguan'),
    ('Nigerien'),
    ('Nigerian'),
    ('Niuean'),
    ('Norfolk Island'),
    ('North Macedonian');

/* role */
INSERT INTO `e_success`.`role` (`rang`,`libelle`) VALUES
(1,"ROLE_USER"),
(2,"ROLE_ADMIN"),
(3,"ROLE_CAISSE"),
(4,"ROLE_SAV");

/* category_article */
INSERT INTO `e_success`.`category_article` (`libelle`) VALUES
    ('Outdoor'),
    ('Hight-tech'),
    ('Sport-wear'),
    ('Street-wear');

/* state_commande */
INSERT INTO `e_success`.`state_type` (`libelle`) VALUES
    ('Commandé'),
    ('En préparation'),
    ('Remise au transporteur'),
    ('Livré'),
    ('Confirmation client');

/* number_type */
/* INSERT INTO `e_success`.`phone_type` (`libelle`) VALUES
    ('Fixe'),
    ('Mobile'); */

/* news */

/* Insérer des articles fictifs */
INSERT INTO `e_success`.`article` (`libelle`, `description`, `id_category_article`) VALUES
    ('Veste de randonnée', 'Parfaite pour les aventures en plein air', 1),
    ('Casque Bluetooth', 'Qualité audio exceptionnelle', 2),
    ('Chaussures de course', 'Confortables et légères', 3),
    ('Sweat à capuche', 'Style urbain décontracté', 4),
    ('Montre connectée', 'Fonctionnalités avancées', 2),
    ('Sac à dos imperméable', 'Idéal pour les excursions', 1),
    ('Écouteurs sans fil', 'Liberté de mouvement totale', 2),
    ('Chaussures de basketball', 'Performance optimale sur le terrain', 3),
    ('Veste en cuir', 'Look classique et intemporel', 4),
    ('Smartphone haute performance', 'Écran vibrant et caméra avancée', 2),
    ('T-shirt de sport', 'Respirant et séchage rapide', 3),
    ('Appareil photo numérique', 'Capturez des moments inoubliables', 2),
    ('Baskets décontractées', 'Confortables pour une utilisation quotidienne', 4),
    ('Tablette tactile', 'Écran tactile haute résolution', 2),
    ('Lunettes de soleil tendance', 'Protection UV et style moderne', 4),
    ('Enceinte portable', 'Son de qualité où que vous alliez', 2),
    ('Pantalon de jogging', 'Parfait pour le sport et les loisirs', 3),
    ('Ordinateur portable léger', 'Performance et mobilité', 2),
    ('Collier élégant', 'Accessoire parfait pour toutes les occasions', 4),
    ('Tapis de yoga antidérapant', 'Confortable pour vos séances de yoga', 3);

/* price */
INSERT INTO `e_success`.`price` (`price`, `id_article`)
VALUES
    (49.99, 1),   -- Prix pour 'Veste de randonnée'
    (89.99, 2),   -- Prix pour 'Casque Bluetooth'
    (59.99, 3),   -- Prix pour 'Chaussures de course'
    (39.99, 4),   -- Prix pour 'Sweat à capuche'
    (149.99, 5),  -- Prix pour 'Montre connectée'
    (79.99, 6),   -- Prix pour 'Sac à dos imperméable'
    (99.99, 7),   -- Prix pour 'Écouteurs sans fil'
    (69.99, 8),   -- Prix pour 'Chaussures de basketball'
    (129.99, 9),  -- Prix pour 'Veste en cuir'
    (599.99, 10), -- Prix pour 'Smartphone haute performance'
    (29.99, 11),  -- Prix pour 'T-shirt de sport'
    (199.99, 12), -- Prix pour 'Appareil photo numérique'
    (49.99, 13),  -- Prix pour 'Baskets décontractées'
    (349.99, 14), -- Prix pour 'Tablette tactile'
    (59.99, 15),  -- Prix pour 'Lunettes de soleil tendance'
    (79.99, 16),  -- Prix pour 'Enceinte portable'
    (34.99, 17),  -- Prix pour 'Pantalon de jogging'
    (899.99, 18), -- Prix pour 'Ordinateur portable léger'
    (99.99, 19),  -- Prix pour 'Collier élégant'
    (24.99, 20);  -- Prix pour 'Tapis de yoga antidérapant'

/* photo */

INSERT INTO `e_success`.`photo` (`path`) VALUES
    ('user_default.svg'),
    ('photo1.jpg'),
    ('photo2.jpg'),
    ('photo3.jpg'),
    ('photo4.jpg'),
    ('photo5.jpg'),
    ('photo6.jpg'),
    ('photo7.jpg'),
    ('photo8.jpg'),
    ('photo9.jpg'),
    ('photo10.jpg');

/* people */

-- Insérer 10 personnes avec des données cohérentes
INSERT INTO `e_success`.`people` (`name`, `surname`, `date_birth`, `place_birth`, `id_nationality`, `id_photo`, `id_collaborateur`, `id_civility`)
VALUES
    ('John', 'Doe', '1990-05-15', 'Paris', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'French'), 2, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = 'CDI'), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Monsieur')),

    ('Alice', 'Smith', '1988-09-22', 'New York', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'American Samoa'), 3, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = 'CDD'), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Madame')),

    ('Bob', 'Johnson', '1995-03-10', 'London', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'British'), 4, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = 'Freelance'), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Monsieur')),

    ('Eva', 'Martinez', '1985-07-03', 'Madrid', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'Spanish'), 5, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Madame')),

    ('Ahmed', 'Ali', '1992-12-18', 'Cairo', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'Egyptian'), 6, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Monsieur')),

    ('Sophie', 'Dubois', '1987-04-25', 'Paris', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'French'), 7, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Madame')),

    ('Michael', 'Kim', '1993-08-11', 'Seoul', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'South Korean'), 8, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Monsieur')),

    ('Mia', 'Chen', '1986-01-07', 'Shanghai', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'Chinese'), 9, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Madame')),

    ('Antonio', 'Ricci', '1996-06-14', 'Rome', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'Italian'), 10, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Monsieur')),

    ('Maria', 'Silva', '1984-02-28', 'Lisbon', (SELECT `id` FROM `e_success`.`nationality` WHERE `libelle` = 'Portuguese'), 11, (SELECT `id` FROM `e_success`.`collaborateur` WHERE `libelle` = ''), (SELECT `id` FROM `e_success`.`civility` WHERE `libelle` = 'Madame'));

/* user */
INSERT INTO `e_success`.`user` (`phone`, `mail`, `password`, `roles`, `date_create`, `id_people`)
VALUES
    ('00admin', 'john.doe@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER","ROLE_ADMIN"]', NOW(), 1),
    ('00caisse', 'alice.smith@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER","ROLE_CAISSE"]', NOW(), 2),
    ('00sav', 'bob.johnson@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER","ROLE_SAV"]', NOW(), 3),
    ('01', 'eva.martinez@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 4),
    ('02', 'ahmed.ali@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 5),
    ('03', 'sophie.dubois@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 6),
    ('04', 'michael.kim@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 7),
    ('05', 'mia.chen@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 8),
    ('06', 'antonio.ricci@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 9),
    ('07', 'maria.silva@example.com', '6e1b1f20acc26e074ef1f250f0b3f1ba27c1c29d', '["ROLE_USER"]', NOW(), 10);

SELECT name, roles FROM people p, user u WHERE u.id_people = p.id AND u.mail = ? AND u.password = ?;
SELECT name, roles FROM people p, user u WHERE u.id_people = p.id;

/* address */
INSERT INTO `e_success`.`address` (`no`, `address_line`, `street`, `city`, `postal_code`, `state`, `country`, `id_people`)
VALUES
    (123, 'Avenue des Champs-Élysées', 'Apt 456', 'Paris', 75008, 'Île-de-France', 'France', 1),
    (456, 'Broadway Street', 'Apt 789', 'New York', 10001, 'New York', 'United States', 2),
    (789, 'Baker Street', 'Flat 101', 'London', 'W1U 6TY', 'England', 'United Kingdom', 3),
    (101, 'Gran Vía', 'Piso 202', 'Madrid', 28013, 'Community of Madrid', 'Spain', 4),
    (202, 'Nile Street', 'Floor 303', 'Cairo', 11511, 'Cairo Governorate', 'Egypt', 5),
    (303, 'Rue de la République', 'Appartement 404', 'Paris', 75001, 'Île-de-France', 'France', 6),
    (404, 'Gangnam-daero', 'Unit 505', 'Seoul', '06095', 'Seoul', 'South Korea', 7),
    (505, 'Nanjing Road', 'Room 606', 'Shanghai', 200001, 'Shanghai', 'China', 8),
    (606, 'Via del Corso', 'Appartamento 707', 'Rome', '00186', 'Lazio', 'Italy', 9),
    (707, 'Avenida da Liberdade', 'Andar 808', 'Lisbon', 1250-096, 'Lisbon', 'Portugal', 10);

/* number */

/* INSERT INTO `e_success`.`phone` (`phone_number`, `id_people`)
VALUES
    ('100123456789', 1),   -- Numéro Fixe pour John Doe
    ('100987654321', 1),   -- Numéro Mobile pour John Doe
    ('200111222333', 2),   -- Numéro Fixe pour Alice Smith
    ('200999888777', 2),   -- Numéro Mobile pour Alice Smith
    ('300222333444', 3),   -- Numéro Fixe pour Bob Johnson
    ('300777888999', 3),   -- Numéro Mobile pour Bob Johnson
    ('400333444555', 4),   -- Numéro Fixe pour Eva Martinez
    ('400555666777', 4),   -- Numéro Mobile pour Eva Martinez
    ('500444555666', 5),   -- Numéro Fixe pour Ahmed Ali
    ('500666777888', 5),   -- Numéro Mobile pour Ahmed Ali
    ('600555666777', 6),   -- Numéro Fixe pour Sophie Dubois
    ('600888999000', 6),   -- Numéro Mobile pour Sophie Dubois
    ('700666777888', 7),   -- Numéro Fixe pour Michael Kim
    ('700111222333', 7),   -- Numéro Mobile pour Michael Kim
    ('800777888999', 8),   -- Numéro Fixe pour Mia Chen
    ('800222333444', 8),   -- Numéro Mobile pour Mia Chen
    ('900888999000', 9),   -- Numéro Fixe pour Antonio Ricci
    ('900333444555', 9),   -- Numéro Mobile pour Antonio Ricci
    ('1000999888777', 10),  -- Numéro Fixe pour Maria Silva
    ('1000444555666', 10);  -- Numéro Mobile pour Maria Silva */

/* type_phone */

/* INSERT INTO `e_success`.`phone_type_phone` (`id_phone`, `id_phone_type`)
VALUES
    (1, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 1
    (2, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 2
    (3, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 3
    (4, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 4
    (5, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 5
    (6, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 6
    (7, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 7
    (8, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 8
    (9, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 9
    (10, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')),-- Type Mobile pour le numéro 10
    (11, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 1
    (12, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 2
    (13, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 3
    (14, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 4
    (15, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 5
    (16, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 6
    (17, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 7
    (18, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile')), -- Type Mobile pour le numéro 8
    (19, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Fixe')),   -- Type Fixe pour le numéro 9
    (20, (SELECT `id` FROM `e_success`.`phone_type` WHERE `libelle` = 'Mobile'));-- Type Mobile pour le numéro 10 */

/* view */
/* use e_success;
CREATE VIEW
    V_fixe AS
SELECT
    p.id id_people,
    pn.phone_number,
    pt.libelle type_numero
FROM
    people p
    JOIN phone pn ON p.id = pn.id_people
    JOIN phone_type_phone ptp ON pn.id = ptp.id_phone
    JOIN phone_type pt ON ptp.id_phone_type = pt.id
WHERE
    ptp.id_phone_type = 1;
CREATE VIEW
    V_mobile AS
SELECT
    p.id id_people,
    pn.phone_number,
    pt.libelle type_numero
FROM
    people p
    JOIN phone pn ON p.id = pn.id_people
    JOIN phone_type_phone ptp ON pn.id = ptp.id_phone
    JOIN phone_type pt ON ptp.id_phone_type = pt.id
WHERE
    ptp.id_phone_type = 2;


CREATE VIEW
    V_just_people AS
SELECT
    p.id,
    name,
    surname,
    date_birth,
    place_birth,
    n.libelle nationality,
    ph.path photo,
    c.libelle collaborateur,
    login,
    mail,
    password,
    roles,
    last_connexion,
    date_create
FROM
    people p,
    nationality n,
    photo ph,
    collaborateur c,
    user u
WHERE
    p.id_nationality = n.id
    AND
    p.id_photo = ph.id
    AND
    p.id_collaborateur=c.id
    AND
    p.id=u.id_people;

CREATE VIEW
    V_people_all AS
SELECT
    p.*,
    f.phone_number fixe,
    m.phone_number mobile
FROM
    V_just_people p
    LEFT JOIN V_fixe f ON p.id = f.id_people
    LEFT JOIN V_mobile m ON p.id = m.id_people; */


/* SET @id_photo:=( select id_photo from people where id=2);
update photo set path='coco.jpg' where id=@id_photo;
update user set login='test',mail='test',roles='["test"]' where id_people=2;

select mail from user where id_people=2;
select login, mail, password from user; */

/* show TABLE status like 'photo';
select Auto_increment from (show TABLE status like 'photo'); */

/* SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'e_success' AND TABLE_NAME = 'photo'; */
/* 
SELECT * FROM user WHERE mail= 'admin' AND password = '1234' OR phone = '0' AND password = '4321';

            INSERT INTO people(name,surname,date_birth) VALUES(?,?,?);INSERT INTO user (mail,password,id_people) VALUES (?,?,LAST_INSERT_ID); */

use e_success;

--         INSERT INTO 
--             people(
--                 name,
--                 surname,
--                 date_birth
--                 ) 
--             VALUES(
--                 'eieieieie',
--                 'ieieieieie',
--                 '2024-02-24'
--             );
-- SELECT LAST_INSERT_ID();