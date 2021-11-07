<?php

namespace Model\Champ;

class ChampFlottant extends Champ
{
    public function sAjouterValeur($sValeur) : string
    {
        return str_replace(',', '.', addslashes($sValeur));
    }
}