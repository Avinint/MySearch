<?php

namespace Model\Champ;

class ChampDateTime extends ChampDate
{
    public function sAjouterValeur($sValeur) : string
    {
        return addslashes($sValeur);
    }
}