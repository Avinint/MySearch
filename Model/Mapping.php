<?php

namespace Model;

abstract class Mapping extends \ArrayObject
{
    public function sGetColonneAliasee($sCle)
    {
        return $this->sGetAlias() . '.' . ($this[$sCle]->sGetColonne() ?? $sCle);
    }
}