<?php

namespace Model\Recherche\Critere;

use DateTime;

class CritereDate extends CritereTexte
{
//    public function __toString()
//    {
//        return parent::__toString() . "$this->sCle $this->sOperateur '$this->sValeur'";
//    }

    public function __toString()
    {
        return $this->sAndOuOr()  . "$this->sCle $this->sOperateur '". addslashes($this->sGetDateFormatUniversel($this->sValeur."")). "'";
    }

    private function sGetDateFormatUniversel(string $sValeur, string $sFormatRetour = 'Y-m-d')
    {
        return (DateTime::createFromFormat('d/m/Y', $sValeur))->format($sFormatRetour);
    }
}