<?php

namespace Model\Recherche\Critere;

trait TraitDateTimeDefaut
{
    protected function sGetDateFormatee(string $sValeur, string $sFormatRetour = 'Y-m-d H:i:s')
    {
        return addslashes(\DateTime::createFromFormat('Y-m-d hH:i:s', $sValeur)->format($sFormatRetour));
    }
}