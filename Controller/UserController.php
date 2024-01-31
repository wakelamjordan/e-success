<?php
class UserController extends MyFct{
    function __construct()
    {
        // par defaut on met action sur liste
        $action = 'liste';
        // on extract get pour avoir l'action si jamais elle est renseigné dans l'url
        extract($_GET);
        // et on switch sur cette action
        switch ($action) {
            // à défaut quelque soit ce qui sera rentré comme action la méthode liste sera appliqué
           case'liste':
            $this->liste();
            break;
            case'show':
                $this->afficher($id);
                break;
            case'modify':
                $this->modifier($id);
                break;
            case'insert':
                break;
                
        }
    }
///-----------------------------------------------------------------
    function inserer(){
          $user=new User(); 
          $user->setRoles(['ROLE_USER']);     
          $disabled="";
          $this->generateFormUser($user,$disabled);
    }
    function modifier($id){

        $um = new UserManager();

        $user=$um->findById($id);

        $user_roles=$user->getRoles();
        $user_roles=json_decode($user_roles, true);//? pourquoi true?

        $user->setRoles($user_roles);

        $disabled='';

        $this->generateFrom($user,$disabled);
    }

    function afficher($id){

        $um = new UserManager();

        $user=$um->findById($id);

        $user_roles=$user->getRoles();
        $user_roles=json_decode($user_roles, true);//? pourquoi true?

        $user->setRoles($user_roles);

        $disabled='disabled';

        $this->generateFrom($user,$disabled);
    }

    function generateFrom($user,$disabled){

        $photo=$user->getPhoto();

        $user_roles=$user->getRoles();

        if(!$photo){
            $photo="fakePhoto.jpg";
        }

        $rm = new RoleManager();

        $myRoles = $rm->findAll();

        $roles=[];

        foreach($myRoles as $value){

            $libelle=$value['libelle'];

            if(in_array($libelle,$user_roles)){
                $checked="checked";
            }
            else{

                $checked="";
            }

            $role[]=['libelle'=>$libelle,'checked'=>$checked];
        }

        $variables=[
            'photo'=>$photo,
            'roles'=>$roles,
            'id'=>$user->getId(),
            'login'=>$user->getLogin(),
            'mail'=>$user->getMail(),
            'disabled'=>$disabled,
            'password'=>'',

        ];

        $file="../View/user/formFile.html.php";

        $this->generatePage($file,$variables);
    }

    function liste(){

        $um = new UserManager();

        $users=$um->findAll();
       
        // dans file on va préparer notre tableau pour acceuillir la liste
        $file = '../View/user/file.html.php';
        // dans variable il faudra les différentes variables nécéssaire à file pour créer le tableau
        // pour obtenir ces variables on a besoin de requêter la bdd
        // il nous faudra l'id de user, username, datecréation, ses roles et sa photo
        //test requêtage
        $variables = [
            'lignes' => $users,
            'nbr' => count($users),
        ];
        $this->generatePage($file, $variables);
    }
}
