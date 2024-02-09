<?php

namespace App\Controller;

use App\Model\Manager;
use App\Service\MyFct;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\AcceuilManager;

class MagasinController extends MyFct
{
    function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
            default:
                $this->magasin();
        }
    }
    public function magasin()
    {

        $file = "../View/magasin/file.html.php";
        $variables = [
            "title" => "Magasin",
            "p" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file, $variables);
    }
}
