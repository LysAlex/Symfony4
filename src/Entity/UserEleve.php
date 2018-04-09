<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserEleveRepository")
 */
class UserEleve
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

    private $nomEleve;

    /**
     * @ORM\Column(type="text")
     */

    private $prenomEleve;

    /**
     * @ORM\Column(type="integer", length=2)
     */

    private $classeEleve;

    /**
     * @ORM\Column(type="text")
     */

    private $anneeScolaire;

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
    public function getNomEleve()
    {
        return $this->nomEleve;
    }

    /**
     * @param mixed $nomEleve
     */
    public function setNomEleve($nomEleve): void
    {
        $this->nomEleve = $nomEleve;
    }

    /**
     * @return mixed
     */
    public function getPrenomEleve()
    {
        return $this->prenomEleve;
    }

    /**
     * @param mixed $prenomEleve
     */
    public function setPrenomEleve($prenomEleve): void
    {
        $this->prenomEleve = $prenomEleve;
    }

    /**
     * @return mixed
     */
    public function getClasseEleve()
    {
        return $this->classeEleve;
    }

    /**
     * @param mixed $classeEleve
     */
    public function setClasseEleve($classeEleve): void
    {
        $this->classeEleve = $classeEleve;
    }

    /**
     * @return mixed
     */
    public function getAnneeScolaire()
    {
        return $this->anneeScolaire;
    }

    /**
     * @param mixed $anneeScolaire
     */
    public function setAnneeScolaire($anneeScolaire): void
    {
        $this->anneeScolaire = $anneeScolaire;
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
