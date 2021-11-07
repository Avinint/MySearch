<?php

namespace Model\Recherche\Critere;

class CritereListeTexte extends CritereListe
{
    protected function sGetValeurUnique() : string
    {
        return $this->sEntreGuillemets($this->sValeur);
    }


    public function sEntreGuillemets($sValeur)
    {
        return "'". addslashes($sValeur) ."'";
    }


    protected function sGetValeurMultiple()
    {
        return implode(', ', array_map(function($mValeur) { return $this->sEntreGuillemets($mValeur);}, $this->sValeur));
    }
}