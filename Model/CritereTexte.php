<?php

namespace Model;

class CritereTexte extends Critere
{



    public function __toString()
    {
        return "$this->sOperateurLogique $this->sValeur $this->sOperateur '$this->sValeur'";
    }
}