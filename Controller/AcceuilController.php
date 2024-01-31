<?php

class AcceuilController{
    function __construct()
    {
        $page=new MyFct;
        $file='../View/acceuil/file.html.php';
        $variables=[];
        $page->generatePage($file,$variables);
    }
}