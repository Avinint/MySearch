<?php

namespace Model;

class CritereDateTime extends CritereDate
{
    public function __toString()
    {
        return "$this->sOperateurLogique $this->sCle $this->sOperateur '$this->sValeur'";
    }
}