<?php
class VuserManager extends Manager{

    
public function findAllByCondition($dataCondition=[],$order='',$type='obj'){

    return $this->findAllByConditionTable('v_user',$dataCondition=[],$order='',$type='obj');
}

public function findOneByCondition($dataCondition,$type="obj"){
    return $this->findOneByConditionTable('user',$dataCondition,$type);
}
public function search($columnLikes,$mot){
    return $this->searchTable('v_user',$columnLikes,$mot);
}
public function update($data,$id){
    $this->updateTable('user',$data,$id);
}
public function insert($data){
    $this->insertTable('user',$data);
}
public function getDescribe(){
    $resultat=$this->getDescribeTable('v_user');
    return $resultat;
}

public function findAll(){
 return $this->listTable('V_people_all');
}

public function deleteById($id){
    $this->deleteById('v_user',$id);
}

public function findById($id,$type="obj"){
    $resultat=$this->findByIdTable('V_people_all',$id);
    // print_r($resultat);
    // die;
 if($type=="obj"){
    $objet=new Vuser($resultat);
    return $objet;
 }
 else{
    return $resultat;
 }   
}

}