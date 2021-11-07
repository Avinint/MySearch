<?php

namespace Model;

class CritereIdEnseignantSession extends CriterePersonnalise
{
    public function __toString(): string
    {
       return "AND ECGD.`validation` = 'gestionnaire'";
    }
}