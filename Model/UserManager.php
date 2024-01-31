<?php
class UserManager extends Manager
{

    public function findAll()
    {
        // $user_all = $this->listTable('V_people_all');
        $user_all = new User();
        return $user_all->getUser_all();
    }


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
    public function update($data, $id)
    {
        $this->updateTable('user', $data, $id);
    }
    public function insert($data)
    {
        $this->insertTable('user', $data);
    }
    public function getDescribe()
    {
        $resultat = $this->getDescribeTable('user');
        return $resultat;
    }



    public function deleteById($id)
    {
        $this->deleteById('user', $id);
    }

    public function findById($id, $type = "obj")
    {
        $resultat = $this->findByIdTable('user', $id);
        if ($type == "obj") {
            $objet = new User($resultat);
            return $objet;
        } else {
            return $resultat;
        }
    }
}
