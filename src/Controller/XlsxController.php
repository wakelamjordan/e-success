<?php

namespace App\Controller;

use App\Service\MyFct;
use App\Model\AcceuilManager;
use App\Model\Manager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XlsxController extends MyFct
{
    public function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
            case 'extract':
                $this->extract($table);
                break;
            default:
                $this->choice();
        }
    }
    private function extract($table){


        echo($table);
        die;
        $request=new Manager;
        $result=$request->request($table);

        var_dump($result);



        $spreadsheet=new Spreadsheet();
        $sheet=$spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1','Hello PhpSpreadsheet!');

        $writer=new Xlsx($spreadsheet);
        $writer->save('hello_world.xlsx');
    }
    private function choice()
    {
        // $page = new MyFct;
        $file = '../View/xlsx/file.html.php';
        $variables = [
            'title' => 'Xlsx',
            'p' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, aperiam.'
        ];
        $this->generatePage($file, $variables);
    }
    // private $obj = 'Acceuil';
    // function __construct()
    // {
    //     $action = '';
    //     extract($_GET);
    //     switch ($action) {
    //         case 'client':
    //             // echo "produit";
    //             if ($this->notGranted('ROLE_SAV') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
    //             $this->client();
    //             break;
    //         case 'produit':
    //             if ($this->notGranted('ROLE_CAISSE') && $this->notGranted('ROLE_ADMIN')) $this->throwMessage('Vous n\'avez pas accés à cette page');
    //             // echo "produit";
    //             $this->produit();
    //             break;
    //         default:
    //             $this->default_acceuil();
    //     }
    // }
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
