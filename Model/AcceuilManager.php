<?php

class AcceuilManager
{
    function insertPeopleUser()
    {
        $data = $_POST;
        $this->insertInto();
    }
    // manager

    function insertInto()
    {
        $this->connexion();
    }
    function connexion()
    {
        //constantes de connection
        require_once '../Config/parametre.php';
        $host=HOST;
        $dbname=DBNAME;
        // formation dsn 
        $dsn="mysql:host=$host;dbname=$dbname;charset=utf8";

        //création de l'objet pour la connexion

        $pdo=new PDO($dsn, $user, $)

    }
}
