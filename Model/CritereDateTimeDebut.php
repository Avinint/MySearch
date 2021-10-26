<?php

namespace Model;

class CritereDateTimeDebut extends CritereDateTime
{
    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        parent::__construct($sCle, "$sValeur", '>=', $sOperateurLogique);
    }

}