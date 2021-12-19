<?php

namespace Model\Recherche\Critere;

class CritereBooleen extends CritereNombre
{
public function __construct($sCle, bool $sValeur)
{
    parent::__construct($sCle, $sValeur);
}
}