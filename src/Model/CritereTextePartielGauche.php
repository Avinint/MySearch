<?php

namespace Model;

class CritereTextePartielGauche extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        parent::__construct($sCle, "$sValeur%", 'LIKE', $sOperateurLogique);
    }
}