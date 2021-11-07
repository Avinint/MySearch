<?php

namespace Model\Recherche\Critere;

class CritereTexteDifference extends CritereTexte
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = "AND")
    {
        parent::__construct($sCle, "%$sValeur%", $sOperateurLogique, 'NOT LIKE');
    }
}