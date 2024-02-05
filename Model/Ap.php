<?php
class Ap
{
    // private $attributes=[];
    private $mail;
    private $phone;
    private $name;
    private $roles;

    public function __construct($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $set = "set" . ucfirst($key);

                if (method_exists($this, $set)) {
                    $this->$set($value);
                }
            }
        }
    }

    // public function __set($name,$value){
    //     $this->attributes[$name]=$value;
    // }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
