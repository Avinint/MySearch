<?php

namespace Model\Recherche\Critere;

abstract class Critere implements CritereInterface
{
    protected $sCle;
    protected $sValeur;
    protected $sOperateur;
    protected $sOperateurLogique = 'AND';

    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur = '=')
    {
        $this->sCle = $sCle;
        $this->sValeur = $sValeur;
        $this->sOperateur = $sOperateur;
        $this->sOperateurLogique = $sOperateurLogique;

//        var_dump($this->sGetOperateurLogique());
//        var_dump($sCle);
    }

    /**
     * @return string
     */
    public function sGetOperateurLogique()
    {
        return $this->sOperateurLogique;
    }

    /**
     * @param string $sOperateur
     */
    public function vSetOperateurLogique(string $sOperateur)
    {
        $this->sOperateurLogique = $sOperateur;
    }

    public function __toString()
    {
        return $this->sOperateurLogique ? $this->sOperateurLogique . ' ' : '';
    }

    public function sAndOuOr()
    {
        return $this->sOperateurLogique ? $this->sOperateurLogique . ' ' : '';
    }

    protected function sEntreGuillemets($sValeur)
    {
        return "'".addslashes($sValeur). "'";
    }
}