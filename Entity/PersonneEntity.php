<?php

namespace Entity;

use Entity\AdresseEntity;

class PersonneEntity {

    private $nom;
    private $prenom;
    private $password;
    private $active;
    private $nbEnfant;
    private $dateNaissanse;
    private $adresse;

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getActive() {
        return $this->active;
    }

    public function getNbEnfant() {
        return $this->nbEnfant;
    }

    public function getDateNaissanse() {
        return $this->dateNaissanse;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setNbEnfant($nbEnfant) {
        $this->nbEnfant = $nbEnfant;
    }

    public function setDateNaissanse($dateNaissanse) {
        $this->dateNaissanse = $dateNaissanse;
    }

    public function setAdresse(AdresseEntity $adresse) {
        $this->adresse = $adresse;
    }

}
