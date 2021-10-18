<?php

namespace Model;

class ChampFloat extends Champ
{
    public function sAjouterValeur($sValeur) : string
    {
        return str_replace(',', '.', addslashes($sValeur));
    }
}