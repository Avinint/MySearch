<?php

namespace Model;

class CritereGroupe extends Critere implements RechercheCritereInterface
{
    public $oSousRecherche;
    protected $sOperateurLogique = 'AND';

    public function __construct($sOperateurLogique, RechercheInterface $oRecherche)
    {
        $this->oSousRecherche = $oRecherche;
        $this->sOperateurLogique = $sOperateurLogique;
    }

    public function aGetCriteres()
    {
        return $this->oSousRecherche->aGetCriteres();
    }

    public static function xValidation($sValeur) : void
    {
        if (!is_array($sValeur) || empty($sValeur)) {
            throw new \LogicException("Valeur de Critère composé invalide, doit être un tableau d'au moins 1 élément");
        }
    }



    public function __toString()
    {
        return "$this->sOperateurLogique ($this->oSousRecherche \n)";
    }

}