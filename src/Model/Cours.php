<?php

namespace Model;


class Cours extends Model
{
    const ALIAS_TABLE = 'COU';

    public function sAjouterCritereSpecifique($sCle, $sValeur)
    {
        return $this->sAjouterCritere($sCle, $sValeur);
    }

    /**
     * @return Mapping
     */
    public function aGetMapping() : Mapping
    {
        return new CoursMapping();
    }
}