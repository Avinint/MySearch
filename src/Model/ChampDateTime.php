<?php

namespace Model;

class ChampDateTime extends ChampDate
{
    public function sAjouterValeur($sValeur) : string
    {
        return addslashes($sValeur);
    }
}