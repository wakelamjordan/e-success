<?php


error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", 1);
//à mettre n'importe ou dans mon code pour afficher les érreurs
// require_once '../Service/MyFct.php';

// $crypter=new MyFct;
// $crypter=$crypter->crypter('1234');
// echo $crypter;
// die;

session_start();
if (!$_SESSION) {
    $_SESSION['login'] = 'visiteur';
    $_SESSION['roles'] = json_encode(['ROLE_VISITEUR']);
}

require_once("../Service/extra.php");
spl_autoload_register('charger');
// require '../View/base.html.php';
$path = 'acceuil';
extract($_GET);

// print_r($_GET);
// echo $path;
$nameController = ucfirst($path) . "Controller";
$fileController = "../Controller/$nameController.php";

if (file_exists($fileController)) {
    $x = new $nameController();
} else {
    // si aucun controller est trouvé on est redirigé directement vers acceuilController
    header('location:acceuil');
    // echo "<h1>Le fichier $fileController n'existe pas!!!!!</h1>";  
    // die;
}
