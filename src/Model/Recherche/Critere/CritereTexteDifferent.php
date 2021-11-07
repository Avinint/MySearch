<?php

namespace Model\Recherche\Critere;

class CritereTexteDifferent extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND')
    {
        parent::__construct($sCle, "%$sValeur%", $sOperateurLogique, '!=');
    }
}