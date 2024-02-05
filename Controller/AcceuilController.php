<?php

class AcceuilController extends MyFct
{
    function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
            case 'client':
                // echo "produit";
                $this->client();
                break;
            case 'produit':
                // echo "produit";
                $this->produit();
                break;
            case 'create':
                if ($_POST) {
                    $this->valider();
                }
                $this->inscription();
                break;
            default:
                $this->default_acceuil();
        }
    }
    public function client(){

        $file="../View/produit/file.html.php";
        $variables=[
            "title"=>"Client",
            "p"=>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file,$variables);
    }
    public function produit(){

        $file="../View/produit/file.html.php";
        $variables=[
            "title"=>"Produit",
            "p"=>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum!"
        ];

        $this->generatePage($file,$variables);
    }
    function valider()
    {
        $am = new AcceuilManager;
        $am->insertPeopleUser();
    }
    function inscription()
    {
        // $page = new MyFct;
        $file = '../View/acceuil/formInscription.html.php';
        $variables = [
            'title' => 'inscription'
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
