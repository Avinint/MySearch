<?php

namespace Model;

class CritereDateFin extends CritereDate
{
    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        parent::__construct($sCle, "$sValeur", '<=', $sOperateurLogique);
    }
}