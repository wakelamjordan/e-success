<?php
class AcceuilController extends MyFct
{
    private $obj = 'Acceuil';
    function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
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
    function valider()
    {


        // foreach (array_keys($_POST) as $key) {
        //     $get = 'get' . ucfirst($key);
        //     if (method_exists($this->obj,$get)) {

        //     }
        // };
        $am = new AcceuilManager;
        $am->insertPeopleUser();
    }
    function inscription()
    {
        $am = new AcceuilManager;
        $nationality = $am->selectNationality();
        $civility = $am->selectCivility();
        // $page = new MyFct;
        $file = '../View/acceuil/formInscription.html.php';
        $variables = [
            'title' => 'inscription',
            'nationality' => $nationality,
            'civility' => $civility
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
