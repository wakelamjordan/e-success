<?php

class AcceuilController{
    function __construct()
    {
        $page=new MyFct;
        $file='../View/acceuil/file.html.php';
        $variables=[
            'title'=>'Acceuil',
            'p'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, aperiam.'
        ];
        $page->generatePage($file,$variables);
    }
}