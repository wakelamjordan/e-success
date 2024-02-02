<?php

class AcceuilManager
{
    function insertPeopleUser()
    {
        $inscription = new Acceuil($_POST);

        // $inscription->getName();
        // $inscription->getSurname();
        // $inscription->getDate_birth();
        // $inscription->getPlace_birth();
        // $inscription->getId_nationality();
        // $inscription->getId_civility();


        // $inscription->getLogin();
        // $inscription->getMail();
        // $inscription->getPassword();


        //controle du mail dans la bdd
        $variables = [
            $inscription->getMail(),
        ];
        $sql = "SELECT * FROM user WHERE mail = ?";
        $checkMail = $this->request($sql, $variables);

        //controle du login dans la bdd
        $variables = [
            $inscription->getLogin(),
        ];
        $sql = "SELECT * FROM user where login = ?";
        $checkLogin = $this->request($sql, $variables);

        // var_dump($checkMail);
        // var_dump($checkLogin);
        // die;

        // $error = [];
        if ($checkMail !==false || $checkLogin !== false) {
            $retour='';
            if($checkMail!==false){
                $retour.="mail déjà connu";
            }elseif($checkLogin!==false){
                $retour.="login déjà connu";
            }
        } else {
            //path dans table photo en récupérant son id
            $sql = '
            INSERT INTO photo (path) VALUES(?);

            INSERT INTO people (name, surname, date_birth, place_birth, id_nationality, id_civility, id_photo) VALUES(?,?,?,?,?,?,LAST_INSERT_ID());

            INSERT INTO user (login, mail, password,id_people) VALUES(?,?,?,LAST_INSERT_ID());
            ';

            $variables = [
                $inscription->getPath(),

                $inscription->getName(),
                $inscription->getSurname(),
                $inscription->getDate_birth(),
                $inscription->getPlace_birth(),
                $inscription->getId_nationality(),
                $inscription->getId_civility(),

                $inscription->getLogin(),
                $inscription->getMail(),
                $inscription->getPassword()
            ];

            $this->request($sql, $variables);

            //dans people on met name surname date_birth place_birth id_nationality id_civility

            //mail login password

            $retour ="Merci pour votre inscription vous pouvez vous connecter.";
        }
        $response =json_encode(array("message"=>$retour));

        return $response;
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

        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



}
