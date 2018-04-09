<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TuteurRepository")
 */
class Tuteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column (type="text", length=100)
     */

    private $nomTuteur;

    /**
     * @ORM\Column (type="text", length=100)
     */

    private $prenomTuteur;

    /**
     * @ORM\Column (type="text", length=100)
     */

    private $mailTuteur;

    /**
     * @ORM\Column (type="string", length=20)
     */

    private $telTuteur;

    /**
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumn(name="idEntreprise", referencedColumnName="id")
     */
    private $Entreprise;

    /**
     * @return mixed
     */
    public function getNomTuteur()
    {
        return $this->nomTuteur;
    }

    /**
     * @param mixed $nomTuteur
     */
    public function setNomTuteur($nomTuteur): void
    {
        $this->nomTuteur = $nomTuteur;
    }

    /**
     * @return mixed
     */
    public function getPrenomTuteur()
    {
        return $this->prenomTuteur;
    }

    /**
     * @param mixed $prenomTuteur
     */
    public function setPrenomTuteur($prenomTuteur): void
    {
        $this->prenomTuteur = $prenomTuteur;
    }


    /**
     * @return mixed
     */
    public function getMailTuteur()
    {
        return $this->mailTuteur;
    }

    /**
     * @param mixed $mailTuteur
     */
    public function setMailTuteur($mailTuteur): void
    {
        $this->mailTuteur = $mailTuteur;
    }

    /**
     * @return mixed
     */
    public function getTelTuteur()
    {
        return $this->telTuteur;
    }

    /**
     * @param mixed $telTuteur
     */
    public function setTelTuteur($telTuteur): void
    {
        $this->telTuteur = $telTuteur;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->Entreprise;
    }

    /**
     * @param mixed $Entreprise
     */
    public function setEntreprise($Entreprise): void
    {
        $this->Entreprise = $Entreprise;
    }



}

