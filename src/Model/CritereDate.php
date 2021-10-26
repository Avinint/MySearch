<?php

namespace Model;

class CritereDate extends CritereTexte
{
    public function __toString()
    {
        return "$this->sOperateurLogique $this->sCle $this->sOperateur '$this->sValeur'";
    }
}