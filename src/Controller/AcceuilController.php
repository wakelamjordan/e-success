<?php

namespace App\Controller;

use App\Model\Manager;
use App\Service\MyFct;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\AcceuilManager;

class AcceuilController extends MyFct
{
    private $obj = 'Acceuil';
    function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
            // case 'client':
            //     // echo "produit";
            //     // if ($this->notGranted('ROLE_SAV') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
            //     $this->client();
            //     break;
            // case 'produit':
            //     // if ($this->notGranted('ROLE_CAISSE') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
            //     // echo "produit";
            //     $this->produit();
            //     break;
                //partie connexion

                // $this->seDeconnecter();
                // break;

            default:
                $this->default_acceuil();
        }
    }
    public function client()
    {

        $file = "../View/produit/file.html.php";
        $variables = [
            "title" => "Client",
            "p" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file, $variables);
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
    function default_acceuil()
    {
        // $page = new MyFct;
        $file = '../View/acceuil/file.html.php';
        $variables = [
            'title' => 'Acceuil',
            'p' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, aperiam.'
        ];
        $this->generatePage($file, $variables);
    }
}
