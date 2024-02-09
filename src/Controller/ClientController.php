<?php

namespace App\Controller;

use App\Model\Manager;
use App\Service\MyFct;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\AcceuilManager;

class ClientController extends MyFct
{
    function __construct()
    {
        if ($this->notGranted('ROLE_SAV') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
        $action = '';
        extract($_GET);
        switch ($action) {
            default:
                $this->client();
        }
    } 
    public function client()
    {

        $file = "../View/client/file.html.php";
        $variables = [
            "title" => "Client",
            "p" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file, $variables);
    }
}
