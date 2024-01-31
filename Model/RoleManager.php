<?php 

class RoleManager extends Manager{

    public function findAll(){
        return $this->listTable('role_type');
       }
       
       public function deleteById($id){
           $this->deleteById('role',$id);
       }
       
       public function findById($id,$type="obj"){
           $resultat=$this->findByIdTable('role',$id);
        if($type=="obj"){
           $objet=new Role($resultat);
           return $objet;
        }
        else{
           return $resultat;
        }   
       }
}