<?php

namespace Model;

class ChampInteger extends Champ
{

    public function sAjouterValeur($sValeur) : string
    {
        return addslashes($sValeur);
    }

}