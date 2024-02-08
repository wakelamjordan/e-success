<?php

namespace App\Model;

class Acceuil
{
    private $name; //
    private $surname; //
    private $date_birth; //
    private $place_birth; //
    private $id_nationality; //
    private $id_civility; //
    private $path; //
    private $mail;
    private $login;
    private $password;
    function __construct($data)
    {
        foreach (array_keys($data) as $key) {
            $set = 'set' . ucfirst($key);
            if (method_exists($this, $set)) {
                $this->$set($data[$key]);
            }
        }
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
     * Get the value of surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of date_birth
     */
    public function getDate_birth()
    {
        return $this->date_birth;
    }

    /**
     * Set the value of date_birth
     *
     * @return  self
     */
    public function setDate_birth($date_birth)
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    /**
     * Get the value of place_birth
     */
    public function getPlace_birth()
    {
        return $this->place_birth;
    }

    /**
     * Set the value of place_birth
     *
     * @return  self
     */
    public function setPlace_birth($place_birth)
    {
        $this->place_birth = $place_birth;

        return $this;
    }

    /**
     * Get the value of id_nationality
     */
    public function getId_nationality()
    {
        return $this->id_nationality;
    }

    /**
     * Set the value of id_nationality
     *
     * @return  self
     */
    public function setId_nationality($id_nationality)
    {
        $this->id_nationality = $id_nationality;

        return $this;
    }

    /**
     * Get the value of id_civility
     */
    public function getId_civility()
    {
        return $this->id_civility;
    }

    /**
     * Set the value of id_civility
     *
     * @return  self
     */
    public function setId_civility($id_civility)
    {
        $this->id_civility = $id_civility;

        return $this;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */
    public function setPath($path)
    {
        $this->path = $path;

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
}
