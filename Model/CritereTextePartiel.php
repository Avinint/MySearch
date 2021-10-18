<?php

namespace Model;

class CritereTextePartiel extends CritereTexte
{
    protected $sOperateurLogique = 'LIKE';

    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        parent::__construct($sCle, "%$sValeur%", $sOperateur, $sOperateurLogique);
    }
}