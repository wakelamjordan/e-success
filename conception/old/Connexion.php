<?php
require_once("../Config/parametre.php");
class Connexion
{
    // private $_instance;

    private static $connexion;
    /**
     * Get the value of connexion
     */
    public static function getConnexion()
    {
        $host=HOST;
        $dbname=DBNAME;
        $user=USER;
        $password=PASSWORD;


        // exit;
        // $user=self::$user;
        // $password=self::$password;

        if (self::$connexion === null) {

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

            try {
                self::$connexion = new PDO($dsn,$user,$password);
                // return $pdo;
            } catch (PDOException $e) {
                echo "<h1>Erreur de connexion à la base de données: " . $e->getMessage() . "</h1>";
                die;
            }
        }
        return self::$connexion;
    }
}
