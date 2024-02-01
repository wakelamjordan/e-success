<?php 

class RoleManager extends Manager{

    public function update($data,$id){
        $this->updateTable('role',$data,$id);
    }
    public function insert($data){
        $this->insertTable('role',$data);
    }

    public function findAll(){
        return $this->listTable('role');
       }
       
       public function deleteById($id){
           $this->deleteByIdTable('role',$id);
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