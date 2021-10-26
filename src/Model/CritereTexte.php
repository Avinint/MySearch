<?php

namespace Model;

class CritereTexte extends Critere
{
    public function __toString()
    {
        return parent::__toString()  . "$this->sCle $this->sOperateur '$this->sValeur'";
    }
}