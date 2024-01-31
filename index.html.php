<?php
    require_once("Service/extra.php");
    spl_autoload_register('charger');
    $path='accueil';  
    extract($_GET);  
    $nameController=ucfirst($path)."Controller"; 
                                                 
    $fileController="Controller/$nameController.php"; 
                                           
    if(file_exists($fileController)){ 
        $x=new $nameController(); 
    }else{
        echo "<h1>Le fichier $fileController n'existe pas!!!!!</h1>";  
        die;
    }
