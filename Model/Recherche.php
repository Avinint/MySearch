<?php

namespace Model;

class Recherche implements RechercheInterface
{
    /**
     * @var RechercheInterface[]
     */
    private $aCriteres = [];

    public function __toString()
    {
        return "";
    }

    public function vAjouterCritere(RechercheInterface $oCritere)
    {
        if (empty($this->aCriteres) && $oCritere->sGetOperateurLogique !== 'AND') {
            $oCritere->vSetOperateurLogique('AND');
        }
        $this->aCriteres[] = $oCritere;
    }

    /**
     * @return RechercheInterface[]
     */
    public function aGetCriteres(): array
    {
        return $this->aCriteres;
    }

    public function __construct($oModel = null)
    {
        if (isset($oModel)) {
            $this->oModel = $oModel;
        }
    }
}