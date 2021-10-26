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
        return $this->sNom;
    }

    public function sGetColonne()
    {
        return $this->sColonne;
    }

//    public function sAjouterCritere($sNomCritere, $sValeur, $sOperateur = ' = ')
//    {
//        return $sOperateur . $this->sAjouterValeur($sValeur);
//    }

    public function sGetTypeCritere()
    {
        return str_replace("Champ", 'Critere', get_class($this));
    }

}