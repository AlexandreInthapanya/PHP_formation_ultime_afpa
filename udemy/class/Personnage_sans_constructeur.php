<?php

use Personnage as GlobalPersonnage;

class Personnage {

    // ATTRIBUTS
    private $_force = 40;
    private $_classe = "Plombier";
    private $_couleurCasquette = "Rouge";

    // CONSTRUCTEUR
    public function __construct() {
        
    }

    // METHODES
    // PROCESSUS D'ENCAPSULATION
    public function getForce() {
        return $this->_force;
    }

    public function setForce($force) {
        $this->_force = $force;
    }

    public function getCouleurClasse() {
        return $this->_couleurCasquette;
    }

    public function setCouleurClasse($couleur) {
        $this->_couleurCasquette = $couleur;
    }

    public function getClasse() {
        return $this->_classe;
    }

    public function getInfo() {
        return "Ce personnage a une force de ".$this->_force." est de classe ".$this->_classe." et a une casquette de couleur ".$this->_couleurCasquette.".";
    }

}

$mario = new Personnage;

// $mario->setForce(10);

// echo $mario->getClasse();
echo $mario->getInfo();