<?php
class RoleController extends MyFct{
    function __construct()
    {
      
        $action = 'list';
     
      
        $action = 'list';
     
        extract($_GET);
       
       
        switch ($action) {
            case'list':
                $this->listerRole();
            break;
            case 'show':
                //if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");die;
                $this->afficherRole($id);
            break;

            case 'update':
                //if($this->notGranted('ROLE_ADMIN')) $this->trowMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");die;
                $this->modifierRole($id);
                break;
            case 'insert':
                $this->insererRole();
                break;
            case 'save' :          
                 $this->sauvegarderRole($_POST);
                 break;
            case 'delete':
               //if($this->notGranted('ROLE_ADMIN')) $this->trowMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");die;
                $this->supprimerRole($id);
                break;
        }
    }
//---------------------Mes methods-------------------------------------------------------------

function supprimerRole($id){
    $rm=new RoleManager();
    $rm->deleteById($id);
    header("location:role");
    exit();
}


function sauvegarderRole($data){
    $rm=new RoleManager();
    
   // $this->printr($data);die;
    extract($data);
    $id=(int) $id;  // transformation de $id en entier
    if($id!=0){  // cas d'une modification
       
        $rm->update($data,$id);
    }else{  //  cas d'une insertion 
       
        $rm->insert($data);
        }
    header("location:role");
    exit;
}


function insererRole(){
    //-----Role---
    $role=new Role();  // Créer un role à vide
    $disabled="";
    /*------Creation de la page FormRole-----*/
    $this->generateFormRole($role,$disabled);
} 

function afficherRole($id){
    $rm=new RoleManager();  //  Instancier la clasee RoleManager
    $role=$rm->findById($id);  // Recuperer role corespondant à l'id $id. D'après RoleManager on a ici un objet
    $disabled="disabled";
    //----Role----------------
    $this->generateFormRole($role,$disabled);
}

function modifierRole($id){
    //-----Role---
    $rm=new RoleManager();  
    $role=$rm->findById($id);  
   
    $disabled="";
    $this->generateFormRole($role,$disabled);
} 

function generateFormRole($role,$disabled){
    //$role_roles=$role->getLibelle();
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