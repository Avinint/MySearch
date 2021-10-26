<?php

namespace Model;

class CritereTexteDifference extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique)
    {
        parent::__construct($sCle, "%$sValeur%", 'NOT LIKE', $sOperateurLogique);
    }
}