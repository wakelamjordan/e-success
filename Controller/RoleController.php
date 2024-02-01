<?php
class RoleController extends MyFct{
    function __construct()
    {
      
        $action = 'list';
     
        extract($_GET);
       
        switch ($action) {
            case'list':
                $this->listerRole();
            break;
            case 'show':
                //if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!"); 
                $this->afficherRole($id);
            break;
        }
    }
//---------------------Mes methods-------------------------------------------------------------
function afficherRole($id){
    $rm=new RoleManager();  //  Instancier la clasee RoleManager
    $role=$rm->findById($id);  // Recuperer role corespondant à l'id $id. D'après RoleManager on a ici un objet
    $disabled="disabled";
    //----Role----------------
    $this->generateFormRole($role,$disabled);
}

function generateFormRole($role,$disabled){
    $rm=new RoleManager();
    //---------prearation variables---
    $variables=[
        'id'=>$role->getId(),
        'rang'=>$role->getRang(),
        'libelle'=>$role->getLibelle(),
        'disabled'=>$disabled,
    ];
    //printr($variables);die;
    //----Ouverture de la page
    $file="../View/role/formRole.html.php";
    $this->generatePage($file,$variables);

}                
function listerRole(){
 
    $rm=new RoleManager();
    $roles=$rm->findAll(" order by rang asc ");
    $lignes=[];
    foreach($roles as $value){
        $lignes[]=[
            'id'=>$value['id'],
            'rang'=>$value['rang'],
            'libelle'=>$value['libelle'],
        ];
    }
    $variables=[
        'lignes'=>$lignes,
        'nbre'=>count($lignes),
    ];
    //------------Evoi page-------------*/
    $file="../View/role/file.html.php";
    $this->generatePage($file,$variables);

}        
}