<?php

namespace Model;


class Cours extends Model
{
    const ALIAS_TABLE = 'COU';




    public function sAjouterCritereSpecifique($sCle, $sValeur)
    {
        return $this->sAjouterCritere($sCle, $sValeur);
    }

    public function aGetMapping()
    {
        return new CoursMapping;
    }
}