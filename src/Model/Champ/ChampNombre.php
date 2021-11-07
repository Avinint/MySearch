<?php

namespace Model\Champ;

class ChampNombre extends Champ
{

    public function sAjouterValeur($sValeur) : string
    {
        return addslashes($sValeur);
    }

}