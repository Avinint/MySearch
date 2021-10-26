<?php

namespace Model;

class CritereTexteDifferent extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique)
    {
        parent::__construct($sCle, "%$sValeur%", '!=', $sOperateurLogique);
    }
}