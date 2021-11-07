<?php

namespace Model\Recherche\Critere;

class CritereListe extends Critere
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND')
    {
        parent::__construct($sCle, $sValeur, $sOperateurLogique, 'IN');
    }

    public function __toString()
    {
        $sValeur = $this->sGetValeur();

        return $this->sAndOuOr() . "$this->sCle $this->sOperateur ($sValeur)";
    }

    protected function sGetValeur() : string
    {
        if (is_array($this->sValeur)) {
            return  $this->sGetValeurMultiple();
        }
        return $this->sGetValeurUnique();
    }

    protected function sGetValeurUnique()
    {
        return addslashes($this->sValeur);
    }

    protected function sGetValeurMultiple()
    {
        return implode(', ', array_map(function($mValeur) { return addslashes($mValeur);}, $this->sValeur));
    }
}