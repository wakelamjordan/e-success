<?php
namespace App\Service\exception;

use Exception;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Extract;

class RouterException extends Exception{
    //redéfinition du constructeur pour pouvoir personnaliser les méssage d'exeption
    public function __construct($message,$code=0,Exception $previous=null)
    {
        // appel du constructeur parent avec le nouveau message, le code si renseigné idem pour l'erreur précédente
        parent::__construct($message,$code,$previous);
    }
}