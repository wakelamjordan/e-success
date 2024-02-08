<?php

namespace App\Model;

class User
{

    private $id;
    private $login;
    private $mail;
    private $password;
    private $id_people;
    private $Photo;
    private $roles;


    public function __construct($data = [])
    {
        if ($data) {
            foreach ($data as $key => $valeur) {
                $set = 'set' . ucfirst($key);
                if (method_exists($this, $set)) {
                    $this->$set($valeur);
                }
            }
        }
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

    /**
     * Get the value of login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of id_people
     */
    public function getId_people()
    {
        return $this->id_people;
    }

    /**
     * Set the value of id_people
     *
     * @return  self
     */
    public function setId_people($id_people)
    {
        $this->id_people = $id_people;

        return $this;
    }

    /**
     * Get the value of Photo
     */
    public function getPhoto()
    {
        return $this->Photo;
    }

    /**
     * Set the value of Photo
     *
     * @return  self
     */
    public function setPhoto($Photo)
    {
        $this->Photo = $Photo;

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
