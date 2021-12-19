<?php

namespace Model\Recherche\Critere;

class CritereNombre extends Critere
{

    public function __toString()
    {
        return empty($this->sValeur) ? '' : $this->sAndOuOr() . "$this->sCle $this->sOperateur ".addslashes($this->sValeur);
    }
}