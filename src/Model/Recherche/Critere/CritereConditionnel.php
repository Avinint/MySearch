<?php

namespace Model\Recherche\Critere;


class CritereConditionnel extends Critere
{
    public function __construct($aConditions = [])
    {
        $this->aConditions = $aConditions;


    }
}