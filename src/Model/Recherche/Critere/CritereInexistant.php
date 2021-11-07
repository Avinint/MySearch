<?php

namespace Model\Recherche\Critere;

class CritereInexistant extends Critere
{
    public function __construct()
    {
        error_log("Le critère de recherche n'existe pas");
    }

    public function __toString()
    {
        return '';
    }
}