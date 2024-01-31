<?php 

class Role{

    private $id;
    private $rang;
    private $role;


    public function __construct($data = [] ){
        if($data){
            foreach($data as $key=>$valeur){
                $set='set'.ucfirst($key);
                if(method_exists($this,$set)){
                    $this->$set($valeur);
                }
            }
        }
    }
    

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of rang
     */ 
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set the value of rang
     *
     * @return  self
     */ 
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}