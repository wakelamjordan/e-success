<?php 
function charger($class){ 

        $fileModel="Model/$class.php";
        $fileController="Controller/$class.php";
        $fileView="View/$class.php";
        $fileService="Service/$class.php";

        $files=[$fileModel,$fileController,$fileView,$fileService];
        foreach($files as $file){
            if(file_exists($file)){
                require_once($file);
            }
        }
    }

