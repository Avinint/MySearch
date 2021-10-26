<?php

namespace Model;

class ChampFlottant extends Champ
{
    public function sAjouterValeur($sValeur) : string
    {
        return str_replace(',', '.', addslashes($sValeur));
    }
}