<?php
class VuserManager extends Manager{

    
public function findAllByCondition($dataCondition=[],$order='',$type='obj'){

    return $this->findAllByConditionTable('v_user',$dataCondition=[],$order='',$type='obj');
}

public function findOneByCondition($dataCondition,$type="obj"){
    return $this->findOneByConditionTable('v_user',$dataCondition,$type);
}
public function search($columnLikes,$mot){
    return $this->searchTable('v_user',$columnLikes,$mot);
}
public function update($data,$id){
    $this->updateTable('v_user',$data,$id);
}
public function insert($data){
    $this->insertTable('v_user',$data);
}
public function getDescribe(){
    $resultat=$this->getDescribeTable('v_user');
    return $resultat;
}

public function findAll(){
 return $this->listTable('v_user');
}

public function deleteById($id){
    $this->deleteById('v_user',$id);
}

public function findById($id,$type="obj"){
    $resultat=$this->findByIdTable('v_user',$id);
 if($type=="obj"){
    $objet=new Vuser($resultat);
    return $objet;
 }
 else{
    return $resultat;
 }   
}

}