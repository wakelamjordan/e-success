<?php 

    session_start();

    if(!$_SESSION){
        $_SESSION['username']='user';
        $_SESSION['roles']=json_encode('ROLE_USER')
    }
