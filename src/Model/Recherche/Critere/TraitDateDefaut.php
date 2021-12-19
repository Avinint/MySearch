<?php

namespace Model\Recherche\Critere;

trait TraitDateDefaut
{
    protected function sGetDateFormatee(string $sValeur, string $sFormatRetour = 'Y-m-d')
    {
        return addslashes(\DateTime::createFromFormat('Y-m-d', $sValeur)->format($sFormatRetour));
    }
}