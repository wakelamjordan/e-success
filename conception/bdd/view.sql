-------------------------------------------------------------------
DESC V_people_all;

+--------------+---------------+------+-----+---------+-------+
| Field        | Type          | Null | Key | Default | Extra |
+--------------+---------------+------+-----+---------+-------+
| id           | int(12)       | NO   |     | 0       |       |
| photo        | varchar(255)  | NO   |     | NULL    |       |
| civility     | varchar(50)   | NO   |     | NULL    |       |
| name         | varchar(50)   | NO   |     | NULL    |       |
| surname      | varchar(50)   | NO   |     | NULL    |       |
| date_birth   | date          | NO   |     | NULL    |       |
| place_birth  | varchar(50)   | NO   |     | NULL    |       |
| nationality  | varchar(50)   | NO   |     | NULL    |       |
| no           | decimal(10,0) | NO   |     | NULL    |       |
| address_line | varchar(255)  | NO   |     | NULL    |       |
| street       | varchar(255)  | NO   |     | NULL    |       |
| city         | varchar(255)  | NO   |     | NULL    |       |
| postal_code  | int(11)       | NO   |     | NULL    |       |
| state        | varchar(255)  | NO   |     | NULL    |       |
| country      | varchar(255)  | NO   |     | NULL    |       |
| fixe         | varchar(20)   | YES  |     | NULL    |       |
| mobile       | varchar(20)   | YES  |     | NULL    |       |
+--------------+---------------+------+-----+---------+-------+-----------------------------------------------------------------------------
DESC V_fixe;
+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| id_people   | int(12)      | NO   |     | 0       |       |
| number      | varchar(20)  | NO   |     | NULL    |       |
| type_numero | varchar(255) | NO   |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+
-----------------------------------------------------------------------------
DESC V_mobile;
+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| id_people   | int(12)      | NO   |     | 0       |       |
| number      | varchar(20)  | NO   |     | NULL    |       |
| type_numero | varchar(255) | NO   |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+

----------------------------------------------------------------------
DESC V_user;

+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| id       | int(12)      | NO   |     | 0       |       |
| login    | varchar(255) | NO   |     | NULL    |       |
| mail     | varchar(255) | NO   |     | NULL    |       |
| password | varchar(255) | NO   |     | NULL    |       |
| role     | longtext     | NO   |     | NULL    |       |
+----------+--------------+------+-----+---------+-------+

------------------------------------------------------------------------
DESC V_user;
+-----------+--------------+------+-----+---------+-------+
| Field     | Type         | Null | Key | Default | Extra |
+-----------+--------------+------+-----+---------+-------+
| id        | int(12)      | NO   |     | 0       |       |
| login     | varchar(255) | NO   |     | NULL    |       |
| mail      | varchar(255) | NO   |     | NULL    |       |
| password  | varchar(255) | NO   |     | NULL    |       |
| id_people | int(11)      | NO   |     | NULL    |       |
| roles     | longtext     | NO   |     | NULL    |       |
| photo     | varchar(255) | NO   |     | NULL    |       |
+-----------+--------------+------+-----+---------+-------+