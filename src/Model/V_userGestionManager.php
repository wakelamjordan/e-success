<?php

namespace App\Model;

use App\Model\Manager;

class V_userGestionManager extends Manager
{
    protected $table = 'V_userGestion';
    //recherche par id
    public function findById($id)
    {
        $variables = [
            'id' => $id,
        ];
        $m = new Manager;
        $result = $m->select($this->table, $variables);
        // var_dump($result['last_connexion']);
        // exit;
        // $result['last_connexion']=;

        return $result;
    }
}
