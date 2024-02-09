<?php

namespace App\Controller;

use App\Model\Manager;
use App\Service\MyFct;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\AcceuilManager;

class ProduitController extends MyFct
{
    private $obj = 'Acceuil';
    function __construct()
    {
        if ($this->notGranted('ROLE_CAISSE') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
        $action = '';
        extract($_GET);
        switch ($action) {
            default:
                $this->produit();
        }
    }
    public function produit()
    {

        $file = "../View/produit/file.html.php";
        $variables = [
            "title" => "Produit",
            "p" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file, $variables);
    }
}
