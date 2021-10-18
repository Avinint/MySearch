<?php

namespace Model;

class CritereComposite extends Critere implements RechercheInterface
{
    private $oSousRecherche;
    protected $sOperateurLogique = 'AND';

    public function __construct(RechercheInterface $oRecherche, $sOperateurLogique = '')
    {
        $this->oSousRecherche = $oRecherche;

        $this->sOperateurLogique = $sOperateurLogique;
    }

    public function __toString()
    {
        return "$this->sOperateurLogique ( $this->oSousRecherche)";
    }

    public function aGetCriteres()
    {
         return $this->oSousRecherche->aGetCriteres();
    }
}