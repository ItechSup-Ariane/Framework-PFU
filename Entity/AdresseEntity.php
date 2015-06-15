<?php

namespace Entity;

class AdresseEntity
{
    private $adresse;
    private $codePostal;
    private $ville;

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCodePostal()
    {
        return $this->codePostal;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }
}
