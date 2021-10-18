<?php

namespace Model;

abstract class Critere implements CritereInterface
{
    protected $sCle;
    protected $sValeur;
    protected $sOperateur;
    protected $sOperateurLogique;

    public function __construct($sCle, $sValeur, $sOperateur = '=', $sOperateurLogique = 'AND')
    {
        $this->sCle = $sCle;
        $this->sValeur = $sValeur;
        $this->sOperateur = $sOperateur;
        $this->sOperateurLogique = $sOperateurLogique;
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

    public static function oCreerTypeInfere(MappingInterface $oMapping, $sValeur, $sOperateur = '=', $sOperateurLogique = 'AND') : CritereInterface
    {


        return new Critere(sCle, $sValeur, $sOperateur = '=', $sOperateurLogique);
    }


}