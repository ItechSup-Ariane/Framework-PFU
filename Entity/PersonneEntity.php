<?php

namespace Entity;

class PersonneEntity {

    private $nom;
    private $prenom;
    private $active;
    private $nbEnfant;
    private $dateNaissanse;
    private $password;

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
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

    public function getPassword() {
        return $this->password;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
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

    public function setPassword($password) {
        $this->password = $password;
    }

}
