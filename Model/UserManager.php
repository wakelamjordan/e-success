<?php
class UserManager extends Manager
{
    private $table = 'user';

    // select *
    public function findAll()
    {

        $sql = "
        SELECT 
            p.id,
            ph.path,
            mail,
            phone
        FROM 
            people p
        JOIN
            user u ON p.id = u.id_people 
        JOIN
            photo ph ON p.id_photo = ph.id;
        ";

        $result = $this->request($sql);

        return $result;
    }
    // select where mail=? AND password=? OR phone=? AND password=?
    public function findByMailPhone()
    {
        $variables = [
            'mail' => $_POST['mail'],
            'phone' => $_POST['mail'],
        ];

        $m = new Manager;

        $result = $m->select($this->table, $variables);

        // print_r($result);

        // exit;
        return $result;
    }
    public function findByMailPhonePassword()
    {
        // $variables=[
        //     'mail'=>$_POST['mail'],
        //     'password'=>$_POST['password'],
        // ];

        $sql = "
        SELECT
            mail,
            roles,
            id_people
        FROM
            $this->table
        WHERE
            mail=?
        AND
            password=?
        OR
            phone=?
        AND
            password=?";


        $password = new MyFct;
        $password = $password->crypter($_POST['password']);

        $variables = [
            $_POST['mail'],
            $password,
            $_POST['mail'],
            $password,
        ];

        $m = new Manager;

        $result = $m->request($sql, $variables);

        // print_r($result);

        // exit;
        return $result;
    }
    // insertion nouvelle user
    public function insertByLast_id()
    {
        // echo 'eeeee';
        // print_r($data);
        $last_id = Manager::getConnexion();
        $last_id = $last_id->lastInsertId();

        $password = new MyFct;
        $password = $password->crypter($_POST['password']);

        $variables = [
            'mail' => $_POST['mail'],
            'password' => $password,
            'id_people' => $last_id,
        ];

        // $data['id_people']=$last_id;

        // var_dump($data);

        // exit;


        $this->insert($this->table, $variables);

        // var_dump($last_id);
        // $sql = "
        // INSERT INTO user (mail,password,id_people) VALUES (?,?,$last_id);
        // ";

        // // var_dump($data);
        // // exit;
        // $this->request($sql,$data);
    }
    // insertion nouvelle user
    public function updateLast_connexion($id)
    {
        // echo 'eeeee';
        // print_r($data);
        // $last_id = Manager::getConnexion();
        // $last_id = $last_id->inser();

        $variables_set = [
            'last_connexion' => date("Y-m-d H:i:s"),
        ];

        $variables_conditions = [
            'id' => $id,
        ];

        // $data['id_people']=$last_id;

        // var_dump($data);

        // exit;


        $this->update($this->table, $variables_set,$variables_conditions);

        // var_dump($last_id);
        // $sql = "
        // INSERT INTO user (mail,password,id_people) VALUES (?,?,$last_id);
        // ";

        // // var_dump($data);
        // // exit;
        // $this->request($sql,$data);
    }
    //recherche par id
    public function findById($id){
        $variables=[
            'id'=>$id,
        ];
        $m=new Manager;
        $result=$m->select($this->table,$variables);

        return $result;
    }

    // ------------------------------------------------------------------------------------


    public function findAllByCondition($dataCondition = [], $order = '', $type = 'obj')
    {

        return $this->findAllByConditionTable('user', $dataCondition = [], $order = '', $type = 'obj');
    }

    public function findOneByCondition($dataCondition, $type = "obj")
    {
        return $this->findOneByConditionTable('user', $dataCondition, $type);
    }
    public function search($columnLikes, $mot)
    {
        return $this->searchTable('user', $columnLikes, $mot);
    }
    // public function update($data, $id)
    // {
    //     $this->updateTable('user', $data, $id);
    // }


    //à voir
    public function getDescribe()
    {
        $resultat = $this->getDescribeTable('user');
        return $resultat;
    }



    public function deleteById($id)
    {
        $this->deleteById('user', $id);
    }

    // public function findById($id, $type = "obj")
    // {
    //     $resultat = $this->findByIdTable('user', $id);
    //     if ($type == "obj") {
    //         $objet = new User($resultat);
    //         return $objet;
    //     } else {
    //         return $resultat;
    //     }
    // }
}
