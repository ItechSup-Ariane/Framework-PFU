<?php

namespace Entity;

class PersonneEntity
{
    private $nom;
    private $prenom;
    private $status;
    private $password;
    private $active;
    private $nbEnfant;
    private $dateNaissanse;
    private $adresse;
    private $poste;

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getNbEnfant()
    {
        return $this->nbEnfant;
    }

    public function getDateNaissanse()
    {
        return $this->dateNaissanse;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getPoste()
    {
        return $this->poste;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setNbEnfant($nbEnfant)
    {
        $this->nbEnfant = $nbEnfant;
    }

    public function setDateNaissanse($dateNaissanse)
    {
        $this->dateNaissanse = $dateNaissanse;
    }

    public function setAdresse(AdresseEntity $adresse)
    {
        $this->adresse = $adresse;
    }

    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
