<?php

namespace Model;

abstract class Mapping extends \ArrayObject implements MappingInterface
{
    public function sGetColonneAliasee($sCle)
    {
        return ($this[$sCle]->sGetAlias() ?? $this->sGetAlias()) . '.' . ($this[$sCle]->sGetColonne() ?? $sCle);
    }

    public function vFusionnerTableau(array $aChamps, $sAlias, $sSuffixe) {
        foreach ($aChamps as $sCle => $aUnChamp) {
            if (empty($aUnChamp->sGetAlias())) {
                $aUnChamp->vSetAlias($sAlias);
            }

            if (empty($this[$sCle])) {
                $this[$sCle] = $aUnChamp;
            } elseif (strpos($sCle, 'nId') === false) {
                $sCle = $sCle . $sSuffixe;
                $aUnChamp->vSetNom($sCle);
                $this[$sCle] = $aUnChamp;
            }
        }

    }

    public function vFusionner(Mapping $oAutreMapping)
    {
        $this->vFusionnerTableau(
            $oAutreMapping->getArrayCopy(),
            $oAutreMapping->sGetAlias(),
            $oAutreMapping->sGetSuffixe()
        );
    }
}