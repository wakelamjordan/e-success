<?php
    require_once("../Service/extra.php");
    spl_autoload_register('charger');
    // require '../View/base.html.php';
    $path='acceuil';  
    extract($_GET);  

    // print_r($_GET);
    // echo $path;
    $nameController=ucfirst($path)."Controller"; 
    $fileController="../Controller/$nameController.php";
                                           
    if(file_exists($fileController)){ 
        $x=new $nameController(); 
    }else{
        // si aucun controller est trouvé on est redirigé directement vers acceuilController
        header('location:acceuil');
        // echo "<h1>Le fichier $fileController n'existe pas!!!!!</h1>";  
        // die;
    }