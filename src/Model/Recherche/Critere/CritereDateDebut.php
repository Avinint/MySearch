<?php

namespace Model\Recherche\Critere;

class CritereDateDebut extends CritereDate
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND')
    {
        parent::__construct($sCle, "$sValeur", $sOperateurLogique, '>=');
    }
}