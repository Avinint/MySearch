<?php

namespace Model;

class FormulaireRecherche
{
    /**
     * @var CritereRecherche[]
     */
    private $aCriteres = [];
    protected $oMapping;


    public function __construct(MappingInterface $oMapping)
    {
        $this->oMapping = $oMapping;
    }


    public function vAjouterCritere($sCle, $sValeur, $sOperateur = '=')
    {
        if (isset($this->oMapping[$sCle])) {
            $aChamp = $this->oMapping[$sCle];
            $this->aCriteres[] = CritereRecherche::oAjouter($aChamp, $sValeur, $sOperateur);
        } else {
            [$sCle, $sSuffixe] = $this->aParserCritere($sCle);
            if (isset($this->oMapping[$sCle])) {
                $aChamp = $this->oMapping[$sCle];

                $this->aCriteres[] = CritereRecherche::oAjouter($aChamp, $sValeur, $sSuffixe);
            }
        }

    }

    public function aParserCritere($sCle)
    {
        $sType = '';

        if (strpos($sCle, 'Partiel')) {
            $sOperateur = 'LIKE';

            if (strpos($sCle, 'PartielGauche')) {
                $sCle = str_replace('PartielGauche', '', $sCle);
                $sType = 'gauche';
            } elseif (strpos($sCle, 'PartielDroit')) {
                $sCle = str_replace('PartielDroit', '', $sCle);
                $sType = 'droit';
            } else {
                $sCle = str_replace('Partiel', '', $sCle);
            }
        } else {
            [$sCle, $sOperateur] = $this->aParserCritereDate($sCle);
        }


        return [$sCle, $sOperateur, $sType];
    }

    public function aParserCritereDate($sCle)
    {
        $sOperateur = '=';
        if (strpos($sCle, 'Debut')) {
            $sCle = str_replace('Debut', '', $sCle);
            $sOperateur = '>=';
        } elseif (strpos($sCle, 'Fin')) {
            $sCle = str_replace('Fin', '', $sCle);
            $sOperateur = '<=';
        }

        return [$sCle, $sOperateur];
    }
}