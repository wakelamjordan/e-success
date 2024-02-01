<?php 

class Role_typeManager extends Manager{

    public function findAll(){
        return $this->listTable('role_type');
       }
       
       public function deleteById($id){
           $this->deleteById('role_type',$id);
       }
       
       public function findById($id,$type="obj"){
           $resultat=$this->findByIdTable('role_type',$id);
        if($type=="obj"){
           $objet=new Role($resultat);
           return $objet;
        }
        else{
           return $resultat;
        }   
       }
}