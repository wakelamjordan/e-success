<?php
 
class MyFct{

    // function jordanIsGranted($role_granted=[]){
    //     $role_user=$_SESSION['roles'];
    //     $role_user=json_decode($role_user);
    //     var_dump($role_user);
    //     exit;
    // }

    function notGranted($role_libelle){

        $granted=self::isGranted($role_libelle); //comme isGranted est static alors on utilise self:: au lieu de $this->$_COOKIE
        if($granted){
            return false;
        }else{
            return true;
        }
    }

    function throwMessage($message){
        $variables=['message'=>$message];
        $file="../View/erreur/erreur.html.php";
        $this->generatePage($file,$variables);
        die;
    }

    function crypter($password,$iteration=127){// on a mis par default $iteration 127
        for($i=0;$i<=$iteration;$i++){// boucle qui commence par $i=0 et se termine à $i=$iteration avec une incrementation de 1 ($i++)
            $password=sha1($password); // on applique le sha1 sur $password à chaque iteration 
        }
        return $password;
    }

    static function isGranted($role_libelle){
        $user_roles=$_SESSION['roles']; //   en format json
        $user_roles=json_decode($user_roles);  // transformation en tableau php
        if(in_array($role_libelle,$user_roles)){  // tester si $role_libelle fait parti des roles de l'utilisateur en cours
            return true;
        }else{
            return false;
        }
    }
    
    function generatePage($file,$variables=[],$base="../View/base.html.php"){  
        if(file_exists($file)){   
          
            extract($variables);
            ob_start();   
            require($file);
            $content=ob_get_clean();
          
    
            ob_start();
            require($base);
            $page=ob_get_clean();
            echo $page;
    
        }else{
    
           
            echo "<h1>Desolé! Le fichier $file n'existe pas!</h1>"; 
            die;
        }
    
    }
    
    function printr($tableau){
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    
    }
    static function sprintr($tableau){
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    
    }





}

