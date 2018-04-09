<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserEleve")
     * @ORM\JoinColumn(name="idUserEleve", referencedColumnName="id")
     */
    private $userEleve;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserProf")
     * @ORM\JoinColumn(name="idUserProf", referencedColumnName="id")
     */
    private $userProf;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tuteur")
     * @ORM\JoinColumn(name="idTuteur", referencedColumnName="id")
     */

    private $tuteur;

    /**
     * @ORM\Column(type="string")
     */
    private $dateStage;

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
    public function getUserEleve()
    {
        return $this->userEleve;
    }

    /**
     * @param mixed $userEleve
     */
    public function setUserEleve($userEleve): void
    {
        $this->userEleve = $userEleve;
    }

    /**
     * @return mixed
     */
    public function getUserProf()
    {
        return $this->userProf;
    }

    /**
     * @param mixed $userProf
     */
    public function setUserProf($userProf): void
    {
        $this->userProf = $userProf;
    }

    /**
     * @return mixed
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * @param mixed $tuteur
     */
    public function setTuteur($tuteur): void
    {
        $this->tuteur = $tuteur;
    }

    /**
     * @return mixed
     */
    public function getDateStage()
    {
        return $this->dateStage;
    }

    /**
     * @param mixed $dateStage
     */
    public function setDateStage($dateStage): void
    {
        $this->dateStage = $dateStage;
    }

}