<?php

class User extends UserManager
{

    private $id;
    private $login;
    private $mail;
    private $password;
    private $last_connexion;
    private $date_create;
    private $photo;
    private $user_all;



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
     * Get the value of last_connexion
     */
    public function getLast_connexion()
    {
        return $this->last_connexion;
    }

    /**
     * Set the value of last_connexion
     *
     * @return  self
     */
    public function setLast_connexion($last_connexion)
    {
        $this->last_connexion = $last_connexion;

        return $this;
    }

    /**
     * Get the value of date_create
     */
    public function getDate_create()
    {
        return $this->date_create;
    }

    /**
     * Set the value of date_create
     *
     * @return  self
     */
    public function setDate_create($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of user_all
     */
    public function getUser_all()
    {
        $this->user_all = $this->listTable('V_people_all');
        return $this->user_all;
    }

    /**
     * Set the value of user_all
     *
     * @return  self
     */
    public function setUser_all($user_all)
    {
        $this->user_all = $user_all;

        return $this;
    }
}
