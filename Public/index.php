<?php

use App\Service\router\Router;
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
// $path = 'acceuil';

// die(print_r());

//prévoir le cas ou get ne contien pas de url

$url=isset($_GET['url'])?$_GET['url']:'/';

$router=new Router($url);

$router->get('/',function(){
    echo "homepage";
});
$router->get('posts/:id',function($id){
    echo "voila l'article $id";
});
$router->run();