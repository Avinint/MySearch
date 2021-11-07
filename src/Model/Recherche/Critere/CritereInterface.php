<?php

namespace Model\Recherche\Critere;

interface CritereInterface
{
    public function __toString();

    public function sGetOperateurLogique();

    public function vSetOperateurLogique(string $sOperateur);
}