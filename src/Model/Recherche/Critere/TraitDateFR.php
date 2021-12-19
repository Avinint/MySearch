<?php

namespace Model\Recherche\Critere;

trait TraitDateFR
{
    protected function sGetDateFormatee(string $sValeur, string $sFormatRetour = 'Y-m-d')
    {
        return addslashes(\DateTime::createFromFormat('d/m/Y', $sValeur)->format($sFormatRetour));
    }
}