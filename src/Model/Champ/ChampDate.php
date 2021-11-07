<?php

namespace Model\Champ;

class ChampDate extends ChampTexte
{
    public function sAjouterValeur($sValeur) : string
    {
        return addslashes($sValeur);
    }

    public function sAjouterCritere($sNomCritere, $sValeur, $sOperateur = ' = ')
    {
        if ($sOperateur === 'Debut') {
            $sOperateur = ' >= ';
        } elseif ($sOperateur === 'Fin') {
            $sOperateur = ' <= ';
        }
        return $sOperateur . $this->sAjouterValeur($sValeur);
    }

    public function sGetType()
    {
        return "Date";
    }
}