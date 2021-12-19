<?php

namespace Model\Recherche\Critere;

use Model\Recherche\RechercheCritereInterface;
use Model\Recherche\RechercheInterface;

class CritereGroupe extends Critere implements RechercheCritereInterface
{
    public $oSousRecherche;
    protected $sOperateurLogique = 'AND';

    public function __construct($sOperateurLogique, RechercheInterface $oRecherche, $bParentheses = true)
    {
        $this->oSousRecherche = $oRecherche;
        $this->bParentheses = $bParentheses;
        $this->sOperateurLogique = $sOperateurLogique;
    }

    public function aGetCriteres()
    {
        return $this->oSousRecherche->aGetCriteres();
    }

    public static function xValidation($sValeur) : void
    {
        if (!is_array($sValeur) || empty($sValeur)) {
            throw new \LogicException("Valeur de Critère groupé invalide, doit être un tableau d'au moins 1 élément");
        }
    }

    public function __toString()
    {
        $sTexte = $this->bParentheses ? "($this->oSousRecherche".PHP_EOL.")" : "$this->oSousRecherche".PHP_EOL;

        return $this->sAndOuOr() . $sTexte;
    }
}