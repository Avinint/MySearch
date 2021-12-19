<?php

namespace Model\Recherche\Critere;

trait TraitDateTimeFR
{
    protected function sGetDateFormatee(string $sValeur, string $sFormatRetour = 'Y-m-d H:i:s')
    {
        return addslashes(\DateTime::createFromFormat('d/m/Y H:i:s', $sValeur)->format($sFormatRetour));
    }
}