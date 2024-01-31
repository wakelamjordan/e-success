<?php

class UserController extends MyFct{
    public function __construct(){
      

    }
 


//----------------------------------Mes Methods-----------------------------

    function listerAllUser(){

        

        $file="View/user/list.html.php";
      
       $this->generatePage($file);
    }

}