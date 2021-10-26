<?php

namespace Model;

class CritereNombre extends Critere
{

    public function __toString()
    {
        return parent::__toString() . "$this->sCle $this->sOperateur $this->sValeur";
    }
}