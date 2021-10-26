<?php

namespace Model;

abstract class Model
{
    protected Recherche $oFormulaireRecherche;
    protected Mapping $aMappingChamps;

    public function __construct()
    {
        $this->aMappingChamps = $this->aGetMapping();
    }

    public function debug()
    {
        var_dump(get_class($this));
        var_dump(get_called_class());
    }

    /**
     * @return Mapping
     */
    abstract public function aGetMapping() : Mapping;

    /**
     * @throws \Exception
     */
    public function aGetCriteres($aRecherche)
    {
        $oRecherche = new RechercheCours();
        $sRequete = '';

//        if ($aRecherche['sNom'] ?? 0 > 0) {
//            $sRequete .= $oRecherche->vAjouterCritere(new CritereTexte('sNom', $aRecherche['sNom']));
//            unset($aRecherche['sNom']);
//        }

        $sChecksum = "XXX";

        if (isset($oRecherche->sCache["XXX"])) {
            $sRequete = $oRecherche->sCache['XXX'];
        } else {
            foreach ($aRecherche as $sCle => $sValeur) {
                $oCritere = $oRecherche->oGetCritere($sCle, $sValeur);
                $oRecherche->vAjouterCritere($oCritere);
                $sRequete .= $oRecherche;
            }
        }

        return $sRequete;
    }


}