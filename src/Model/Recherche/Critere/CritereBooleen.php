<?php

namespace Model\Recherche\Critere;

class CritereBooleen extends Critere
{
public function __construct($sCle, bool $sValeur)
{
    parent::__construct($sCle, $sValeur);
}
}