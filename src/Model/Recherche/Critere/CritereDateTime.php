<?php

namespace Model\Recherche\Critere;

class CritereDateTime extends CritereDate
{
    public function __toString()
    {
        return  $this->sAndOuOr() . "$this->sCle $this->sOperateur '$this->sValeur'";
    }
}