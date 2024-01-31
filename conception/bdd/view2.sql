
----------------------------------------------------------------------------
MariaDB [e_success]> desc V_fixe;
+--------------+--------------+------+-----+---------+-------+
| Field        | Type         | Null | Key | Default | Extra |
+--------------+--------------+------+-----+---------+-------+
| id_people    | int(12)      | NO   |     | 0       |       |
| phone_number | varchar(255) | NO   |     | NULL    |       |
| type_numero  | varchar(255) | NO   |     | NULL    |       |
+--------------+--------------+------+-----+---------+-------+
----------------------------------------------------------------------------
MariaDB [e_success]> desc V_mobile; 
+--------------+--------------+------+-----+---------+-------+
| Field        | Type         | Null | Key | Default | Extra |
+--------------+--------------+------+-----+---------+-------+
| id_people    | int(12)      | NO   |     | 0       |       |
| phone_number | varchar(255) | NO   |     | NULL    |       |
| type_numero  | varchar(255) | NO   |     | NULL    |       |
+--------------+--------------+------+-----+---------+-------+
----------------------------------------------------------------------------
MariaDB [e_success]> desc V_just_people;
+----------------+--------------+------+-----+---------------------+-------+
| Field          | Type         | Null | Key | Default             | Extra |
+----------------+--------------+------+-----+---------------------+-------+
| id             | int(12)      | NO   |     | 0                   |       |
| name           | varchar(255) | NO   |     | NULL                |       |
| surname        | varchar(255) | NO   |     | NULL                |       |
| date_birth     | date         | NO   |     | NULL                |       |
| place_birth    | varchar(255) | NO   |     | NULL                |       |
| nationality    | varchar(255) | NO   |     | NULL                |       |
| photo          | varchar(255) | NO   |     | NULL                |       |
| collaborateur  | varchar(255) | NO   |     | NULL                |       |
| login          | varchar(255) | NO   |     | NULL                |       |
| mail           | varchar(255) | NO   |     | NULL                |       |
| password       | varchar(255) | NO   |     | NULL                |       |
| roles          | longtext     | NO   |     | NULL                |       |
| last_connexion | datetime     | YES  |     | current_timestamp() |       |
| date_create    | datetime     | NO   |     | NULL                |       |
+----------------+--------------+------+-----+---------------------+-------+
----------------------------------------------------------------------------
----------------------------------------------------------------------------
----------------------------------------------------------------------------
----------------------------------------------------------------------------
desc V_people_all;
+----------------+--------------+------+-----+---------------------+-------+
| Field          | Type         | Null | Key | Default             | Extra |
+----------------+--------------+------+-----+---------------------+-------+
| id             | int(12)      | NO   |     | 0                   |       |
| name           | varchar(255) | NO   |     | NULL                |       |
| surname        | varchar(255) | NO   |     | NULL                |       |
| date_birth     | date         | NO   |     | NULL                |       |
| place_birth    | varchar(255) | NO   |     | NULL                |       |
| nationality    | varchar(255) | NO   |     | NULL                |       |
| photo          | varchar(255) | NO   |     | NULL                |       |
| collaborateur  | varchar(255) | NO   |     | NULL                |       |
| login          | varchar(255) | NO   |     | NULL                |       |
| mail           | varchar(255) | NO   |     | NULL                |       |
| password       | varchar(255) | NO   |     | NULL                |       |
| roles          | longtext     | NO   |     | NULL                |       |
| last_connexion | datetime     | YES  |     | current_timestamp() |       |
| date_create    | datetime     | NO   |     | NULL                |       |
| fixe           | varchar(255) | YES  |     | NULL                |       |
| mobile         | varchar(255) | YES  |     | NULL                |       |
+----------------+--------------+------+-----+---------------------+-------+