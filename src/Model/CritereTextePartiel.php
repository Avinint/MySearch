<?php

namespace Model;

class CritereTextePartiel extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique)
    {
        parent::__construct($sCle, "%$sValeur%", 'LIKE', $sOperateurLogique);
    }
}