<?php

namespace Model;

class CritereTextePartielGauche extends CritereTextePartiel
{
    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        parent::__construct($sCle, "$sValeur%", $sOperateur, $sOperateurLogique);
    }

}