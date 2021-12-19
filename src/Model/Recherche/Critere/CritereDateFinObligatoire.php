<?php

namespace Model\Recherche\Critere;

class CritereDateFinObligatoire extends CritereDateFin
{

    public function __toString()
    {
        return $this->sAndOuOr() . "$this->sCle IS NOT NULL AND $this->sCle $this->sOperateur '". addslashes($this->sGetDateFormatee($this->sValeur."")). "'";
    }


}