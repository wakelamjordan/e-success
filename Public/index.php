<?php
session_start();
//toujours en tout premier session start
// require "./img/application.png";

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", 1);
//à mettre n'importe ou dans mon code pour afficher les érreurs
// require_once '../Service/MyFct.php';

// $crypter=new MyFct;
// $crypter=$crypter->crypter('1234');
// // echo $crypter;
// session_destroy();

// print_r($_SESSION);
// die;

if (!$_SESSION) {
    $_SESSION['login'] = 'visiteur';
    $_SESSION['roles'] = json_encode(['ROLE_VISITEUR']);
}

// exit;

// print_r($_SESSION['roles']);
// exit;
// die;
// require_once("../Service/extra.php");
// spl_autoload_register('charger');
require "../vendor/autoload.php";
// require '../View/base.html.php';
$path = 'acceuil';
extract($_GET);

// print_r($_GET);
// echo $path;
$nameController = ucfirst($path) . "Controller";
$fileController = "../src/Controller/$nameController.php";

$fileController = str_replace('\\', '/', $fileController);

// var_dump($fileController);

$nameController = "\\App\\Controller\\" . $nameController;
// var_dump($nameController);
// die;

if (file_exists($fileController)) {
    $x = new $nameController();
} else {
    // si aucun controller est trouvé on est redirigé directement vers acceuilController
    header('location:acceuil');
    // echo "<h1>Le fichier $fileController n'existe pas!!!!!</h1>";  
    // die;
}
