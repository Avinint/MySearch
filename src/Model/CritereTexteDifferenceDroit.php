<?php

namespace Model;

class CritereTexteDifferenceDroit extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND')
    {
        parent::__construct($sCle, "%$sValeur", 'NOT LIKE', $sOperateurLogique);
    }

}