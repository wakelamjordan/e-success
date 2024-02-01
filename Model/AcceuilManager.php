<?php

class AcceuilManager
{
    function insertPeopleUser()
    {
        $data = $_POST;
        $this->insertInto($data);
    }
    function selectNationality()
    {
        return $this->selectAll('nationality');
    }
    function selectCivility()
    {
        return $this->selectAll('civility');
    }
    // manager
    function selectAll($table)
    {
        $sql = "Select * from $table";

        $connexion = $this->connexion();

        $request = $connexion->prepare($sql);
        $request->execute();

        $result=$request->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function insertInto($data)
    {
        // print_r($data);

        $this->connexion();

        $sql="INSERT INTO";
    }
    function connexion()
    {
        //constantes de connection
        require_once '../Config/parametre.php';
        $host = HOST;
        $dbname = DBNAME;

        $user = USER;
        $password = PASSWORD;
        // formation dsn 
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        // try pour test de la connexion

        try {
            //création de l'objet pour la connexion
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;
        } catch (PDOException $e) {
            echo 'pas bon ' . $e->getMessage();
            die;
        }
    }
}
