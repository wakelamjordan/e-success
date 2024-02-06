<?php

class PeopleManager extends Manager
{
    private $table = 'people';
    public function findById($id)
    {

        // echo $id;
        // $sql = "
        // SELECT 
        //     
        // FROM
        //     people
        // WHERE
        //     id=?;";

        $variables=[
            'id'=>$id,
        ];

        $result = $this->select($this->table,$variables);

        // print_r($result);
        // exit;

        return $result;
    }
    // public function insertNew($data)
    // {

    //     $sql = "
    //     INSERT INTO 
    //         people(
    //             name,
    //             surname,
    //             date_birth
    //             ) 
    //         VALUES(

    //         )";

    //     $result = $this->request($sql, $data);

    //     // $last_id=Manager::getConnexion();
    //     // $last_id=$last_id->lastInsertId();

    //     // var_dump($last_id);
    //     // // $sql = "
    //     // // SELECT 
    //     // //     LAST_INSERT_ID();
    //     // //     ";
    //     // //     $result = $this->request($sql);
    //     // // var_dump($result);
    //     // exit;

    //     return $result;
    // }

    // insertion nouvelle user
    public function insertPeople()
    {
        // print_r($data);
        // exit;
        // $last_id=Manager::getConnexion();
        // $last_id=$last_id->lastInsertId();

        // $data['id_people']=$last_id;

        $variables = [
            'name'=>$_POST['name'],
            'surname'=>$_POST['surname'],
            'date_birth'=>$_POST['date_birth'],
        ];



        $this->insert($this->table, $variables);

        // var_dump($last_id);
        // $sql = "
        // INSERT INTO user (mail,password,id_people) VALUES (?,?,$last_id);
        // ";

        // // var_dump($data);
        // // exit;
        // $this->request($sql,$data);
    }
}
