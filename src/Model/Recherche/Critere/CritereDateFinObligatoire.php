<?php

namespace Model\Recherche\Critere;

class CritereDateFinObligatoire extends CritereDateFin
{
    public function __toString()
    {
        return $this->sAndOuOr() . "$this->sCle IS NOT NULL AND $this->sCle $this->sOperateur '". addslashes($this->sGetDateFormatUniversel($this->sValeur."")). "'";
    }

    private function sGetDateFormatUniversel(string $sValeur, string $sFormatRetour = 'Y-m-d')
    {
        return (\DateTime::createFromFormat('d/m/Y', $sValeur))->format($sFormatRetour);
    }
}