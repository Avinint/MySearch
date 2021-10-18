<?php
namespace Model;

class Champ
{
    private $sNom;
    private $sColonne;


    public function __construct($sNom, $sColonne)
    {
        $this->sColonne = $sColonne;
        $this->sNom = $sNom;
    }

    public function sGetNom()
    {
        return $this->nom;
    }

    public function sGetColonne()
    {
        return $this->sColonne;
    }

    public function sAjouterCritere($sNomCritere, $sValeur, $sOperateur = ' = ')
    {
        return $sOperateur . $this->sAjouterValeur($sValeur);
    }

}