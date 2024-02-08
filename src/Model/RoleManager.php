<?php

namespace App\Model;

use App\Model\Role;
use App\Model\User;
use App\Model\Manager;
use App\Service\MyFct;

class RoleManager extends Manager
{
    private $table = 'role';

    // select *
    public function findAll()
    {

        $sql = "
            SELECT 
                *               
            FROM 
                $this->table;
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
    public function updateById()
    {
        // echo 'eeeee';
        // print_r($data);
        // $last_id = Manager::getConnexion();
        // $last_id = $last_id->lastInsertId();

        // $password = new MyFct;
        // $password = $password->crypter($_POST['password']);

        // print_r($_POST);

        // die;

        $variables = [
            'rang' => $_POST['mail'],
            'libelle' => $_POST['mail'],
        ];

        $m = new Manager;

        $result = $m->updateTable($this->table, $variables, $_GET['id']);



        // $variables = [
        //     'mail' => $_POST['mail'],
        //     'password' => $password,
        //     'id_people' => $last_id,
        // ];

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
    //recherche par id
    public function findById($id)
    {
        // ------------------------------------voir pour objet
        $variables = [
            'id' => $id,
        ];
        $m = new Manager;
        $result = $m->select($this->table, $variables);

        $r = new Role($result);

        return $r;
        // ------------------------------------voir pour objet

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
    

    // public function update($data,$id){
    //     $this->updateTable('role',$data,$id);
    // }
    // // -------------------------
    // public function insert($data){
    //     $this->insertTable('role',$data);
    // }
    // // ---------------------------

    // public function findAll(){
    //     return $this->listTable('role');
    //    }

    //    public function deleteById($id){
    //        $this->deleteByIdTable('role',$id);
    //    }

    //    public function findById($id,$type="obj"){
    //        $resultat=$this->findByIdTable('role',$id);
    //     if($type=="obj"){
    //        $objet=new Role($resultat);
    //        return $objet;
    //     }
    //     else{
    //        return $resultat;
    //     }   
    //    }
