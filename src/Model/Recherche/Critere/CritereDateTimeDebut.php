<?php

namespace Model\Recherche\Critere;

class CritereDateTimeDebut extends CritereDateTime
{

    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND')
    {
        parent::__construct($sCle, "$sValeur", $sOperateurLogique, '>=');
    }

}