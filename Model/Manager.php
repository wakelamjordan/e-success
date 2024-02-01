<?php

require_once("../Config/parametre.php");
class Manager
{

    public function connexion($host = HOST, $dbname = DBNAME, $user = USER, $password = PASSWORD)
    {

        $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {
            $pdo = new PDO($dns, $user, $password);
            return $pdo;
        } catch (PDOException $e) {
            echo "<h1>Erreur de connexion à la base de données: " . $e->getMessage() . "</h1>";
            die;
        }
    }


    /*public function connexion($host=HOST,$dbname=DBNAME,$user=USER,$password=PASSWORD){

        $dns="mysql:host=$host;dbname=$dbname;charset=ut8";

        try{

                $pdo=new PDO($dns,$user,$password);

                return $pdo;
        }
        catch(Exception $e){
            echo "<h1>Vous avez un probleme de connexion!! veuillez verifier vos parametres de connexion!! </h1>";
            die;
        }
    }*/

    function findAllByConditionTable($table, $dataCondition = [], $order = '', $type = 'obj')
    { // order assure le clasement du resultats

        $connexion = $this->connexion(); //recuperation de la connexion à la bdd
        $condition = ''; //on initialise la variable $condition à vide
        $values = []; //la variable $value va etre injectée dans la methode execute
        foreach ($dataCondition as $key => $value) { // a chaque élément du tableau $dataCondition on le recupere dans la variable $value et $key correspond à l'indice de l'élément

            if (!$condition) { // Le '!' dit que  $condition est vide. on aurait pu ecrire aussi if($condition=='')

                $condition .= " $key=? ";
            } else {

                $condition .= " and $key=? ";
            }

            //$condition.=(!$condition)?" $key=? " : " and $key= ? "; 
            // syntaxe et ternaire = (condition à verifier)? "expression correspondante à la condition vrai" : "expression correspondante a la condition si fausse"

            $values[] = $value; //Push dans la variable tableau $values le contenu de la variable $value
        }

        $condition = (!$condition) ? "true" : $condition;
        $sql = "select * from $table where $condition $order";
        $requete = $connexion->prepare($sql);
        $requete->execute($values);
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);


        if ($type == 'obj') {

            $class = ucfirst($table); // transformer la premiere lettre du nom de la table en majuscul à la variable $table 
            $objets = []; //une variable qui va recevoir toute les lignes de la variable $resultats

            foreach ($resultats as $value) {

                $objet = new $class($value); // instanciation de la class $class sur le tableau $value
                $objets[] = $objet; // push $objet dans $objet
            }
            return $objets;
        } else {

            return $resultats;
        }
    }

    function findOneByConditionTable($table, $dataCondition = [], $type = 'obj')
    {

        $connexion = $this->connexion(); //recuperation de la connexion à la bdd
        $condition = ''; //on initialise la variable $condition à vide
        $values = []; //la variable $value va etre injectée dans la methode execute
        foreach ($dataCondition as $key => $value) { // a chaque élément du tableau $dataCondition on le recupere dans la variable $value et $key correspond à l'indice de l'élément

            if (!$condition) { // Le '!' dit que  $condition est vide. on aurait pu ecrire aussi if($condition=='')

                $condition .= " $key=? ";
            } else {

                $condition .= " and $key=? ";
            }

            //$condition.=(!$condition)?" $key=? " : " and $key= ? "; 
            // syntaxe et ternaire = (condition à verifier)? "expression correspondante à la condition vrai" : "expression correspondante a la condition si fausse"

            $values[] = $value; //Push dans la variable tableau $values le contenu de la variable $value
        }

        $condition = (!$condition) ? "true" : $condition;
        $sql = "select * from $table where $condition";
        $requete = $connexion->prepare($sql);
        $requete->execute($values);
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($type == 'obj') {

            $class = ucfirst($table);
            $objet = new $class($resultat);
            return $objet;
        } else {

            return $resultat;
        }
    }


    function searchTable($table, $columnLikes, $mot)
    {
        $connexion = $this->connexion();
        $condition = "";
        $values = [];
        foreach ($columnLikes as $value) {
            $condition .= ($condition == "") ?   "$value like ? "  :  " or $value like ? ";
            $values[] = "%$mot%";
        }
        $sql = "select * from $table where $condition";
        //---------test------------
        // echo $sql;
        // MyFct::sprintr($values);die;
        //--------------
        $requete = $connexion->prepare($sql);
        $requete->execute($values);
        $resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
        return $resultat;
    }

    function updateTable($table, $data, $id)
    {
        $connexion = $this->connexion();
        $setColumn = "";
        $values=[];
        
        if (key_exists('path',$data)) {
            $values[] = $id;
            $values[] = $data['path'];
        };

        foreach ($data as $key => $value) {
            if ($key != 'id') {
                $setColumn .= ($setColumn == "") ?  "$key=?"  :  ",$key=?";  // if ternaire 
                /*--
                    if($setColumn==""){
                        $setColumn.="$key=?";
                    }else{
                        $setColumn.=",$key=?";
                    }
                */
                $values[] = $value;
            }
        }

        if (key_exists('path',$data)) {
            extract($data);
            $sql = "
            SET @id_photo:=(
                select id_photo from people where id=?);
                update photo set path=? where id=@id_photo;
                update people set $setColumn where id_people=?;";
            // $values[] = $id;
            // echo $sql;
            $values[] = $id;
        } else {
            $sql = "update $table set $setColumn where id=?;";
            // $values[]=$id;
            $values[] = $id;
        }
        //----test----
        // echo "<h1>$sql </h1>";
        // MyFct::sprintr($values);
        // die;
        //------
        $requete = $connexion->prepare($sql);
        $requete->execute($values);
    }

    function insertTable($table, $data)
    {
        //---initialisation des variables
        $connexion = $this->connexion();
        $column = "";
        $pi = ""; //   les points d'interrogation
        $values = [];  // tableau pour la method execute
        //-----generation de la requete sql
        foreach ($data as $key => $value) {
            if ($key != 'id') {
                if ($column == "") {
                    $column .= $key;
                    $pi .= "?";
                } else {
                    $column .= ",$key";
                    $pi .= ",?";
                }
                $values[] = $value;
            }
        }
        $sql = "insert into $table ($column) values ($pi) ";
        //---test----
        // echo $sql;
        // MyFct::sprintr($values);die;
        //----
        $requete = $connexion->prepare($sql);
        $requete->execute($values);
    }


    function findByIdTable($nomTable, $id)
    {
        $connexion = $this->connexion();
        // valeur retouner par la fontion $this->connexion() du fichier myFct.
        $sql = "select * from $nomTable where id=?";
        // Ecrire la requete sql correspondante
        $requete = $connexion->prepare($sql);
        //  Dire à php de oreparer la requete sql
        $requete->execute([$id]);
        // Executer la requete avec id = $id
        // Mettre dans $article l'article trouvé
        $resultat = $requete->fetch();
        return $resultat;
    }

    function deleteByIdTable($nomTable, $id)
    {
        $connexion = $this->connexion();
        $sql = "delete from $nomTable where id=?";
        $requete = $connexion->prepare($sql);
        $requete->execute([$id]);
        return true;
    }

    function listTable($nomTable)
    {
        $sql = "select * from $nomTable";
        $connexion = $this->connexion();
        $requete = $connexion->prepare($sql);
        $requete->execute();
        $tables = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $tables;
    }
}


// require_once("../Config/parametre.php");
// class Manager
// {

//     public function connexion($host = HOST, $dbname = DBNAME, $user = USER, $password = PASSWORD)
//     {

//         $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";

//         try {
//             $pdo = new PDO($dns, $user, $password);
//             return $pdo;
//         } catch (PDOException $e) {
//             echo "<h1>Erreur de connexion à la base de données: " . $e->getMessage() . "</h1>";
//             die;
//         }
//     }


//     /*public function connexion($host=HOST,$dbname=DBNAME,$user=USER,$password=PASSWORD){

//         $dns="mysql:host=$host;dbname=$dbname;charset=ut8";

//         try{

//                 $pdo=new PDO($dns,$user,$password);

//                 return $pdo;
//         }
//         catch(Exception $e){
//             echo "<h1>Vous avez un probleme de connexion!! veuillez verifier vos parametres de connexion!! </h1>";
//             die;
//         }
//     }*/

//     function findAllByConditionTable($table, $dataCondition = [], $order = '', $type = 'obj')
//     { // order assure le clasement du resultats

//         $connexion = $this->connexion(); //recuperation de la connexion à la bdd
//         $condition = ''; //on initialise la variable $condition à vide
//         $values = []; //la variable $value va etre injectée dans la methode execute
//         foreach ($dataCondition as $key => $value) { // a chaque élément du tableau $dataCondition on le recupere dans la variable $value et $key correspond à l'indice de l'élément

//             if (!$condition) { // Le '!' dit que  $condition est vide. on aurait pu ecrire aussi if($condition=='')

//                 $condition .= " $key=? ";
//             } else {

//                 $condition .= " and $key=? ";
//             }

//             //$condition.=(!$condition)?" $key=? " : " and $key= ? "; 
//             // syntaxe et ternaire = (condition à verifier)? "expression correspondante à la condition vrai" : "expression correspondante a la condition si fausse"

//             $values[] = $value; //Push dans la variable tableau $values le contenu de la variable $value
//         }

//         $condition = (!$condition) ? "true" : $condition;
//         $sql = "select * from $table where $condition $order";
//         $requete = $connexion->prepare($sql);
//         $requete->execute($values);
//         $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);


//         if ($type == 'obj') {

//             $class = ucfirst($table); // transformer la premiere lettre du nom de la table en majuscul à la variable $table 
//             $objets = []; //une variable qui va recevoir toute les lignes de la variable $resultats

//             foreach ($resultats as $value) {

//                 $objet = new $class($value); // instanciation de la class $class sur le tableau $value
//                 $objets[] = $objet; // push $objet dans $objet
//             }
//             return $objets;
//         } else {

//             return $resultats;
//         }
//     }

//     function findOneByConditionTable($table, $dataCondition = [], $type = 'obj')
//     {

//         $connexion = $this->connexion(); //recuperation de la connexion à la bdd
//         $condition = ''; //on initialise la variable $condition à vide
//         $values = []; //la variable $value va etre injectée dans la methode execute
//         foreach ($dataCondition as $key => $value) { // a chaque élément du tableau $dataCondition on le recupere dans la variable $value et $key correspond à l'indice de l'élément

//             if (!$condition) { // Le '!' dit que  $condition est vide. on aurait pu ecrire aussi if($condition=='')

//                 $condition .= " $key=? ";
//             } else {

//                 $condition .= " and $key=? ";
//             }

//             //$condition.=(!$condition)?" $key=? " : " and $key= ? "; 
//             // syntaxe et ternaire = (condition à verifier)? "expression correspondante à la condition vrai" : "expression correspondante a la condition si fausse"

//             $values[] = $value; //Push dans la variable tableau $values le contenu de la variable $value
//         }

//         $condition = (!$condition) ? "true" : $condition;
//         $sql = "select * from $table where $condition";
//         $requete = $connexion->prepare($sql);
//         $requete->execute($values);
//         $resultat = $requete->fetch(PDO::FETCH_ASSOC);

//         if ($type == 'obj') {

//             $class = ucfirst($table);
//             $objet = new $class($resultat);
//             return $objet;
//         } else {

//             return $resultat;
//         }
//     }


//     function searchTable($table, $columnLikes, $mot)
//     {
//         $connexion = $this->connexion();
//         $condition = "";
//         $values = [];
//         foreach ($columnLikes as $value) {
//             $condition .= ($condition == "") ?   "$value like ? "  :  " or $value like ? ";
//             $values[] = "%$mot%";
//         }
//         $sql = "select * from $table where $condition";
//         //---------test------------
//         // echo $sql;
//         // MyFct::sprintr($values);die;
//         //--------------
//         $requete = $connexion->prepare($sql);
//         $requete->execute($values);
//         $resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
//         return $resultat;
//     }

//     function updateTable($table, $data, $id)
//     {
//         $connexion = $this->connexion();
//         $setColumn = "";
//         $values[] = $id;
//         $values[] = $data['path'];
//         foreach ($data as $key => $value) {
//             if ($key != 'id') {
//                 $setColumn .= ($setColumn == "") ?  "$key=?"  :  ",$key=?";  // if ternaire 
//                 /*--
//                     if($setColumn==""){
//                         $setColumn.="$key=?";
//                     }else{
//                         $setColumn.=",$key=?";
//                     }
//                 */
//                 $values[] = $value;
//             }
//         }

//         if ($data['path']) {
//             extract($data);
//             $sql = "
//             SET @id_photo:=(
//                 select id_photo from people where id=?);
//                 update photo set path=? where id=@id_photo;
//                 update people set $setColumn where id_people=?;";
//                 // $values[] = $id;
//                 // echo $sql;
//                 $values[] = $id;

//         } else {
//             $sql = "update $table set $setColumn where id=?;";
//             // $values[]=$id;
//             $values[] = $id;
//         }
//         //----test----
//         // echo "<h1>$sql </h1>";
//         // MyFct::sprintr($values);
//         // die;
//         //------
//         $requete = $connexion->prepare($sql);
//         $requete->execute($values);
//     }

//     function insertTable($table, $data)
//     {
//         //---initialisation des variables
//         $connexion = $this->connexion();
//         $column = "";
//         $pi = ""; //   les points d'interrogation
//         $values = [];  // tableau pour la method execute
//         //-----generation de la requete sql
//         foreach ($data as $key => $value) {
//             if ($key != 'id') {
//                 if ($column == "") {
//                     $column .= $key;
//                     $pi .= "?";
//                 } else {
//                     $column .= ",$key";
//                     $pi .= ",?";
//                 }
//                 $values[] = $value;
//             }
//         }
//         $sql = "insert into $table ($column) values ($pi) ";
//         //---test----
//         // echo $sql;
//         // MyFct::sprintr($values);die;
//         //----
//         $requete = $connexion->prepare($sql);
//         $requete->execute($values);
//     }


//     function findByIdTable($nomTable, $id)
//     {
//         $connexion = $this->connexion();
//         // valeur retouner par la fontion $this->connexion() du fichier myFct.
//         $sql = "select * from $nomTable where id=?";
//         // Ecrire la requete sql correspondante
//         $requete = $connexion->prepare($sql);
//         //  Dire à php de oreparer la requete sql
//         $requete->execute([$id]);
//         // Executer la requete avec id = $id
//         // Mettre dans $article l'article trouvé
//         $resultat = $requete->fetch();
//         return $resultat;
//     }

//     function deleteByIdTable($nomTable, $id)
//     {
//         $connexion = $this->connexion();
//         $sql = "delete from $nomTable where id=?";
//         $requete = $connexion->prepare($sql);
//         $requete->execute([$id]);
//         return true;
//     }

//     function listTable($nomTable)
//     {
//         $sql = "select * from $nomTable";
//         $connexion = $this->connexion();
//         $requete = $connexion->prepare($sql);
//         $requete->execute();
//         $tables = $requete->fetchAll(PDO::FETCH_ASSOC);
//         return $tables;
//     }
// }
