<?php

namespace Model;

class CoursFormulaireRecherche extends FormulaireRecherche
{
    public function __construct()
    {
        $oMapping = new CoursMapping();
        parent::__construct($oMapping);
    }
}