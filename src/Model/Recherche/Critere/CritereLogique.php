<?php

namespace Model\Recherche\Critere;


class CritereLogique extends Critere
{
    public function __construct($oRecherche, $sOperateur = 'AND', $nNiveau = 1, $bSeul = false, $bPremier= false)
    {
        $this->oRecherche = $oRecherche;
        $this->sOperateurLogique = $sOperateur;
        $this->nNiveau = $nNiveau;
        $this->bAfficherParentheses = $this->nNiveau > 0 || $bSeul;
        $this->bPremier = $bPremier;
    }

    public function __toString()
    {
//        $sTexteCriteres = $this->sGetCriteres();
//        if ($this->nNiveau) {
//            return $sTexteCriteres;
//        }
//
//        return $this->sAndOuOr() . "($sTexteCriteres)";

        return ($this->bPremier ? '' : $this->sAndOuOr())  .($this->bAfficherParentheses ? $this->oRecherche : "($this->oRecherche)");
    }

//    private function sGetCriteres()
//    {
//        if (!empty($this->aCriteres)) {
//            $this->aCriteres[0] = str_replace(["AND ", "OR "], "", $this->aCriteres[0]);
//
//        }
//
//        return implode(PHP_EOL . str_repeat("\x20", 4), $this->aCriteres);
//
//    }
}