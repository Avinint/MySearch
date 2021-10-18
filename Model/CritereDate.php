<?php

namespace Model;

class CritereDate extends CritereTexte
{
    public function __toString()
    {
        return "$this->sOperateurLogique $this->sValeur $this->sOperateur '$this->sValeur'";
    }
}