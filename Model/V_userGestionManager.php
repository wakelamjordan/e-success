<?php

class V_userGestionManager extends Manager
{
    protected $table='V_userGestion';
    //recherche par id
    public function findById($id)
    {
        $variables = [
            'id' => $id,
        ];
        $m = new Manager;
        $result = $m->select($this->table, $variables);

        return $result;
    }
}
