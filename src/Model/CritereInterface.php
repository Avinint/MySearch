<?php

namespace Model;

interface CritereInterface
{
    public function __toString();

    public function sGetOperateurLogique();

    public function vSetOperateurLogique(string $sOperateur);
}