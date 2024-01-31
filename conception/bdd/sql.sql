DROP DATABASE `e_success`;

CREATE DATABASE IF NOT EXISTS `e_success` CHARACTER
SET
    `utf8` COLLATE `utf8_persian_ci`;

USE e_success;

CREATE TABLE
    IF NOT EXISTS `e_success`.`civility_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(50) NOT NULL UNIQUE,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`collaborateur_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`nationality_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`role_type` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `rang` INT (100) NOT NULL,
        `role` JSON NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`category_article` (
        `id` INT (12) NULL AUTO_INCREMENT,
        `libelle` VARCHAR(50) NOT NULL UNIQUE,
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
        `id_category_article` INT (12) NOT NULL,
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
        `id_news` INT (12) UNIQUE,
        `id_article` INT (12) UNIQUE,
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
        `id_photo` INT (12) UNIQUE,
        `id_collaborateur_type` INT (12),
        `id_civility_type` INT (12) NOT NULL,
        FOREIGN KEY (`id_photo`) REFERENCES `e_success`.`photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_collaborateur_type`) REFERENCES `e_success`.`collaborateur_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_civility_type`) REFERENCES `e_success`.`civility_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`user` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `login` VARCHAR(255) NOT NULL,
        `mail` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `id_people` INT NOT NULL UNIQUE,
        `roles` JSON NOT NULL,
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
        `id_article` INT NOT NULL,
        `id_commande` INT NOT NULL,
        FOREIGN KEY (`id_article`) REFERENCES `e_success`.`article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`date_state_commande` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `date_state` DATE NOT NULL,
        `id_stat_commande` INT NOT NULL,
        `id_commande` INT NOT NULL,
        FOREIGN KEY (`id_stat_commande`) REFERENCES `e_success`.`stat_commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`id_commande`) REFERENCES `e_success`.`commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

CREATE TABLE
    IF NOT EXISTS `e_success`.`number` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `number` VARCHAR(20) NOT NULL UNIQUE,
        `id_people` INT NOT NULL,
        FOREIGN KEY (`id_people`) REFERENCES `e_success`.`people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci;

/* CREATE TABLE
    IF NOT EXISTS `e_success`.`roles` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `id_user` INT NOT NULL UNIQUE,
        `roles` JSON NOT NULL,
        FOREIGN KEY (`id_user`) REFERENCES `e_success`.`user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_persian_ci; */

CREATE TABLE
    IF NOT EXISTS `e_success`.`user_data` (
        `id` INT (12) NULL AUTO_INCREMENT PRIMARY KEY,
        `new_mail` VARCHAR(255) NOT NULL UNIQUE,
        `last_connexion` DATE NOT NULl,
        `controle_new_mail` INT NOT NULl,
        `id_user` INT NOT NULL UNIQUE,
        FOREIGN KEY (`id_user`) REFERENCES `e_success`.`user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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

INSERT INTO
    `e_success`.`civility_type` (`libelle`)
VALUES
    ('Homme'),
    ('Femme'),
    ('Non genrée');

INSERT INTO
    `e_success`.`collaborateur_type` (`libelle`)
VALUES
    ('CDI'),
    ('CDD'),
    ('Intérim'),
    ('Freelance'),
    ('Stagiaire');

INSERT INTO
    `e_success`.`nationality_type` (`libelle`)
VALUES
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

/* ----------role */
INSERT INTO
    role_type (rang, role)
VALUES
    (0, '{
        "user":"USER_ROLE"
    }'),
    (1, '{
        "admin":"ADMIN_ROLE"
    }'),
    (2, '{
        "caisse":"CAISSE_ROLE"
    }
    '),
    (3, '{
        "sav":"SAV_ROLE"
    }');

/* ----------role */
INSERT INTO
    `e_success`.`category_article` (`libelle`)
VALUES
    ('outdoor'),
    ('hight-tech'),
    ('street-wear');

INSERT INTO
    `e_success`.`stat_commande` (`libelle`)
VALUES
    ('commandé'),
    ('en préparation'),
    ('remise au livreur'),
    ('livré'),
    ('confirmation réception');

INSERT INTO
    `e_success`.`number_type` (`libelle`)
VALUES
    ('portable'),
    ('fixe');

-----------------------------------------------------------
INSERT INTO
    `e_success`.`photo` (`path_photo`)
VALUES
    ('path_to_photo_1.jpg'),
    ('path_to_photo_2.jpg'),
    ('path_to_photo_3.jpg'),
    ('path_to_photo_4.jpg'),
    ('path_to_photo_5.jpg'),
    ('path_to_photo_6.jpg'),
    ('path_to_photo_7.jpg'),
    ('path_to_photo_8.jpg'),
    ('path_to_photo_9.jpg'),
    ('path_to_photo_10.jpg');

-- Créer 10 personnes
INSERT INTO
    `e_success`.`people` (
        `name`,
        `surname`,
        `date_birth`,
        `place_birth`,
        `id_photo`,
        `id_collaborateur_type`,
        `id_civility_type`
    )
VALUES
    ('John', 'Doe', '1990-01-15', 'New York', 1, 1, 1),
    (
        'Jane',
        'Doe',
        '1992-05-20',
        'Los Angeles',
        2,
        NULL,
        2
    ),
    ('Bob', 'Smith', '1985-08-10', 'Chicago', 3, 3, 1),
    (
        'Alice',
        'Johnson',
        '1988-03-25',
        'Houston',
        4,
        NULL,
        2
    ),
    ('David', 'Brown', '1993-12-01', 'Miami', 5, 2, 1),
    (
        'Emily',
        'White',
        '1980-06-18',
        'San Francisco',
        6,
        NULL,
        2
    ),
    (
        'Michael',
        'Jones',
        '1995-09-30',
        'Boston',
        7,
        1,
        1
    ),
    (
        'Emma',
        'Miller',
        '1987-04-12',
        'Seattle',
        8,
        NULL,
        2
    ),
    (
        'Christopher',
        'Taylor',
        '1982-11-08',
        'Denver',
        9,
        3,
        1
    ),
    (
        'Olivia',
        'Wilson',
        '1991-07-05',
        'Austin',
        10,
        NULL,
        2
    );

-- Ajouter des nationalités aux personnes
INSERT INTO
    `e_success`.`people_nationality_type` (`id_people`, `id_nationality_type`)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- Créer des comptes utilisateur avec le mot de passe "1234"
INSERT INTO
    `e_success`.`user` (`login`, `mail`, `password`, `id_people`,`roles`)
VALUES
        
    ('john_doe', 'john@example.com', '1234', 1,'{"user":"USER_ROLE", "caisse":"CAISSE_ROLE"}'),
    ('jane_doe', 'jane@example.com', '1234', 2,'{"user":"USER_ROLE", "sav":"SAV_ROLE"}'),
    ('bob_smith', 'bob@example.com', '1234', 3,'{"user":"USER_ROLE"}'),
    ('alice_johnson', 'alice@example.com', '1234', 4,'{"user":"USER_ROLE"}'),
    ('david_brown', 'david@example.com', '1234', 5,'{"user":"USER_ROLE"}'),
    ('emily_white', 'emily@example.com', '1234', 6,'{"user":"USER_ROLE"}'),
    ('michael_jones', 'michael@example.com', '1234', 7,'{"user":"USER_ROLE"}'),
    ('emma_miller', 'emma@example.com', '1234', 8,'{"user":"USER_ROLE"}'),
    ('christopher_taylor','christopher@example.com','1234',9,'{"user":"USER_ROLE"}'),
    ('olivia_wilson', 'olivia@example.com', '1234', 10,'{"user":"USER_ROLE"}');

-- Créer des adresses pour chaque personne
INSERT INTO
    `e_success`.`address` (
        `number`,
        `address_line`,
        `street`,
        `city`,
        `postal_code`,
        `state`,
        `country`,
        `id_people`
    )
VALUES
    (
        123,
        'Main Street',
        'Apt 4',
        'New York',
        10001,
        'NY',
        'USA',
        1
    ),
    (
        456,
        'Oak Avenue',
        'Unit 7',
        'Los Angeles',
        90001,
        'CA',
        'USA',
        2
    ),
    (
        789,
        'Maple Lane',
        'Suite 12',
        'Chicago',
        60601,
        'IL',
        'USA',
        3
    ),
    (
        101,
        'Pine Street',
        'Apt 2B',
        'Houston',
        77001,
        'TX',
        'USA',
        4
    ),
    (
        202,
        'Cedar Road',
        'Unit 5',
        'Miami',
        33101,
        'FL',
        'USA',
        5
    ),
    (
        303,
        'Elm Boulevard',
        'Apt 8',
        'San Francisco',
        94101,
        'CA',
        'USA',
        6
    ),
    (
        404,
        'Willow Lane',
        'Suite 15',
        'Boston',
        02101,
        'MA',
        'USA',
        7
    ),
    (
        505,
        'Birch Street',
        'Apt 3',
        'Seattle',
        98101,
        'WA',
        'USA',
        8
    ),
    (
        606,
        'Sycamore Avenue',
        'Unit 10',
        'Denver',
        80201,
        'CO',
        'USA',
        9
    ),
    (
        707,
        'Chestnut Drive',
        'Suite 20',
        'Austin',
        73301,
        'TX',
        'USA',
        10
    );

-- Créer des numéros de téléphone pour chaque personne
INSERT INTO
    `e_success`.`number` (`number`, `id_people`)
VALUES
    ('1234567890', 1),
    ('9876543210', 2),
    ('5551234567', 3),
    ('4449876543', 4),
    ('7771112233', 5),
    ('8884445555', 6),
    ('9993334444', 7),
    ('1112223333', 8),
    ('2223334444', 9),
    ('3334445555', 10);

-- Associer chaque numéro de téléphone à un type
INSERT INTO
    `e_success`.`number_type_number` (`id_number`, `id_number_type`)
VALUES
    (1, 1),
    (2, 2),
    (3, 1),
    (4, 2),
    (5, 1),
    (6, 2),
    (7, 1),
    (8, 2),
    (9, 1),
    (10, 2);

-------------------------
INSERT INTO
    `e_success`.`article` (`libelle`, `description`, `id_category_article`)
VALUES
    (
        'Veste de randonnée',
        'Parfaite pour vos aventures en plein air',
        1
    ),
    (
        'Smartphone haut de gamme',
        'Dernière technologie avec des fonctionnalités avancées',
        2
    ),
    (
        'Tente légère 2 personnes',
        'Idéale pour les campeurs minimalistes',
        1
    ),
    (
        'Appareil photo professionnel',
        'Capturez des moments inoubliables avec une qualité exceptionnelle',
        3
    ),
    (
        'Casque audio sans fil',
        'Une expérience sonore sans compromis',
        2
    ),
    (
        'Sac à dos de voyage',
        'Spacieux et confortable pour vos déplacements',
        3
    ),
    (
        'Chaussures de randonnée imperméables',
        'Conçues pour une protection maximale',
        1
    ),
    (
        'Tablette tactile polyvalente',
        'Alliant performance et élégance',
        2
    ),
    (
        'Sac de couchage compact',
        'Parfait pour les nuits sous les étoiles',
        3
    ),
    (
        'Lampe frontale LED',
        'Éclairez votre chemin dans l\'obscurité',
        1
    );

INSERT INTO
    `e_success`.`price` (`price`, `id_article`)
VALUES
    (89.99, 1),
    (799.99, 2),
    (129.99, 3),
    (1499.99, 4),
    (199.99, 5),
    (79.99, 6),
    (129.99, 7),
    (499.99, 8),
    (59.99, 9),
    (29.99, 10);

-----------------------
-- Créer des commandes pour quelques personnes
INSERT INTO
    `e_success`.`commande` (`date`, `id_people`)
VALUES
    ('2024-02-15', 1),
    ('2024-03-22', 2),
    ('2024-04-10', 3),
    ('2024-05-18', 4),
    ('2024-06-05', 5);

-- Associer des articles à chaque commande
INSERT INTO
    `e_success`.`article_commande` (`price`, `id_article`, `id_commande`)
VALUES
    (89.99, 1, 1),
    (799.99, 2, 1),
    (129.99, 3, 1),
    (1499.99, 4, 2),
    (199.99, 5, 2),
    (79.99, 6, 2),
    (129.99, 7, 3),
    (499.99, 8, 3),
    (59.99, 9, 3),
    (29.99, 10, 4),
    (89.99, 1, 4),
    (799.99, 2, 5);

-- Ajouter des statuts pour les commandes
INSERT INTO
    `e_success`.`date_state_commande` (`date_state`, `id_stat_commande`, `id_commande`)
VALUES
    ('2024-02-16', 1, 1),
    ('2024-03-23', 2, 1),
    ('2024-04-11', 3, 1),
    ('2024-05-19', 4, 2),
    ('2024-06-06', 5, 2),
    ('2024-07-01', 1, 2),
    ('2024-08-10', 2, 3),
    ('2024-09-05', 3, 3),
    ('2024-10-02', 4, 3),
    ('2024-11-15', 5, 4),
    ('2024-12-20', 1, 4),
    ('2025-01-08', 2, 5);

-- Attribution des rôles à quatre comptes dans la table roles
/* INSERT INTO
    roles (id_user, roles)
VALUES
    (1, '{"user":"USER_ROLE"}'),
    (2, '{
        "user":"USER_ROLE",
    }'),
    (3, '{
        "user":"USER_ROLE",
    }'),
    (4, '{
        "user":"USER_ROLE",
    }'),
    (5, '{
        "user":"USER_ROLE",
    }'),
    (6, '{
        "user":"USER_ROLE",
    }'),
    (7, '{
        "user":"USER_ROLE",
    }'),
    (8, '{
        "user":"USER_ROLE",
    }'),
    (9, '{
        "user":"USER_ROLE",
    }'),
    (10, '{
        "user":"USER_ROLE",
    }'); */

-- Associez l'utilisateur 4 au rôle SAV_ROLE
/* select all people */
/* select pour les phone */
CREATE VIEW
    V_mobile AS
SELECT
    p.id id_people,
    n.number,
    nt.libelle type_numero
FROM
    people p
    JOIN number n ON p.id = n.id_people
    JOIN number_type_number ntn ON n.id = ntn.id_number
    JOIN number_type nt ON ntn.id_number_type = nt.id
WHERE
    ntn.id_number_type = 1;

CREATE VIEW
    V_fixe AS
SELECT
    p.id id_people,
    n.number,
    nt.libelle type_numero
FROM
    people p
    JOIN number n ON p.id = n.id_people
    JOIN number_type_number ntn ON n.id = ntn.id_number
    JOIN number_type nt ON ntn.id_number_type = nt.id
WHERE
    ntn.id_number_type = 2;

CREATE VIEW
    V_just_people AS
SELECT
    p.id,
    c_t.libelle civility,
    name,
    surname,
    date_birth,
    place_birth,
    n_t.libelle nationality,
    a.number no,
    a.address_line,
    a.street,
    a.city,
    a.postal_code,
    a.state,
    a.country,
    ph.path_photo photo
FROM
    people p,
    people_nationality_type p_n_t,
    nationality_type n_t,
    address a,
    civility_type c_t,
    photo ph
WHERE
    p.id = p_n_t.id_people
    AND p_n_t.id_nationality_type = n_t.id
    AND a.id_people = p.id
    AND c_t.id = p.id_civility_type
    AND p.id_photo = ph.id;

CREATE VIEW
    V_people_all AS
SELECT
    p.id,
    p.photo,
    p.civility,
    p.name,
    p.surname,
    p.date_birth,
    p.place_birth,
    p.nationality,
    p.no,
    p.address_line,
    p.street,
    p.city,
    p.postal_code,
    p.state,
    p.country,
    f.number fixe,
    m.number mobile
FROM
    V_just_people p
    LEFT JOIN V_fixe f ON p.id = f.id_people
    LEFT JOIN V_mobile m ON p.id = m.id_people;

/* CREATE VIEW
    V_user AS
select
    u.id id,
    u.login login,
    u.mail mail,
    u.password password,
    r.roles roles
from
    user u
WHERE
    u.id = r.id_user
    AND id_user = rt.id; */

CREATE VIEW V_user AS
SELECT
    /* v.photo photo, */
    u.*,
    v.photo
FROM 
    V_people_all v,
    user u
WHERE
    v.id=u.id_people;

