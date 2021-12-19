<?php

namespace Model\Recherche\Critere;

class CritereDateTime extends CritereDate
{
    use TraitDateTimeDefaut;

    public function __toString()
    {
        return  $this->sAndOuOr() . "$this->sCle $this->sOperateur '". addslashes($this->sGetDateFormatee($this->sValeur)). "'";
    }
}