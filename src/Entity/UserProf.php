<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserProfRepository")
 */
class UserProf
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $nomProf;

    /**
     * @ORM\Column(type="text")
     */
    private $prenomProf;

    /**
     * @ORM\Column(type="text")
     */
    private $login;

    /**
     * @ORM\Column(type="text")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $role;

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    private $present;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomProf()
    {
        return $this->nomProf;
    }

    /**
     * @param mixed $nomProf
     */
    public function setNomProf($nomProf): void
    {
        $this->nomProf = $nomProf;
    }

    /**
     * @return mixed
     */
    public function getPrenomProf()
    {
        return $this->prenomProf;
    }

    /**
     * @param mixed $prenomProf
     */
    public function setPrenomProf($prenomProf): void
    {
        $this->prenomProf = $prenomProf;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPresent()
    {
        return $this->present;
    }

    /**
     * @param mixed $present
     */
    public function setPresent($present): void
    {
        $this->present = $present;
    }



}
