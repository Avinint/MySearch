<?php

namespace Model;

class CritereTexte implements CritereInterface
{
    protected $sCle;
    protected $sValeur;
    protected $sOperateur;
    protected $sOperateurLogique = 'AND';

    public function __construct($sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        $this->sCle = $sCle;
        $this->sValeur = $sValeur;
        $this->sOperateur = $sOperateur;
        $this->sOperateurLogique = $sOperateurLogique;
    }



    public function __toString()
    {
        return "$this->sOperateurLogique $this->sValeur $this->sOperateur '$this->sValeur'";
    }
}