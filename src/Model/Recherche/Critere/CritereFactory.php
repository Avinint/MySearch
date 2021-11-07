<?php

namespace Model\Recherche\Critere;

use Model\Recherche\Recherche;

class CritereFactory
{
    public $oRecherche;
    public $aListeCritereSpecifique;

    public function __construct(Recherche $oRecherche)
    {
        $this->oRecherche = $oRecherche;
    }

    /**
     * Factory qui génère un critère de recherche à partir des données
     * @param $sCle
     * @param $sValeur
     * @param string $sOperateurLogique
     * @param string $sOperateur
     * @return mixed|CritereGroupe|CritereInterface
     */
    public function oGenererCritere($sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur = '=')
    {
        if ($this->oRecherche->bCritereEnregistreExiste($sCle)) {
            return $this->oGetCritereEnregistre($sCle, $sValeur, $sOperateur, $sOperateurLogique);
        }
        elseif ($oChamp = $this->oGetChamp($sCle) ?? null) {
            return $this->oGetCritereBasique($oChamp, $sCle, $sValeur, $sOperateur, $sOperateurLogique);
        }
        else {
            return CritereAnalyseur::oInfererCritere(
                $this->oRecherche->oGetMapping(),
                $sCle,
                $sValeur,
                $sOperateur,
                $sOperateurLogique
            );
        }

    }

    /**
     * @param $sCle
     * @param $sValeur
     * @return CritereGroupe
     */
    public function oGenererCritereGroupe($sCle, $mValeur): CritereGroupe
    {
        $cClasse = get_class($this->oRecherche);

        $oRecherche = new $cClasse();

        $oRecherche->nNesting = $this->oRecherche->nNesting + 1;
        $aCriteres = $sCle['aCritereGroupe'];

        $sOperateurLogique = $aCriteres[0][0] ?? 'AND';
        $oCritere = $this->aGetSousGroupeRecursif($aCriteres, $mValeur);

        $oRecherche->vAjouterCritere($oCritere);

//        var_dump(new CritereGroupe($sOperateurLogique, $oRecherche)); die();

        return new CritereGroupe($sOperateurLogique, $oRecherche);
    }

    private function oGenererCritereConditionnel(array $aCritereConditionnel, $sValeur)
    {
        $cClasse = get_class($this->oRecherche);
        $oRecherche = new $cClasse();

        foreach ($aCritereConditionnel as $aCritere) {
            if ()
        }
    }

    public function aGetSousGroupeRecursif($aGroupe, $mValeur, $nNesting = 0)
    {
        $aRetourGroupe = [];

        foreach ($aGroupe as $aGroupeCritere) {
            if (in_array($aGroupeCritere[0], ['AND', 'OR'])) {

                // je gere un CritereLogique
                // 0 operateeur logique AND OR
                // 1  sous  sous groupe avec Opérandes (  )

                $sOperateurLogiqueGroupe = $aGroupeCritere[0];

                if (isset($aGroupeCritere['aCriteres'])) {
                    $aCriteres = [];
                    foreach ($aGroupeCritere['aCriteres'] as $nPosition => $aUnCritere) {

                        if (isset($aUnCritere['oCritere'])) {
                           $aCriteres[]  = $this->oGenererCritere($aUnCritere['oCritere'], $this->sGetValeurCritere($mValeur)->current());
                        } else {
                            [$sCleCritere, $cClasseCritere] = $aUnCritere;
                            $sColonne = $this->oRecherche->sGetColonneAliasee($sCleCritere);

                            $aCriteres[] = new $cClasseCritere($sColonne, $this->sGetValeurCritere($mValeur)->current(), $aUnCritere[2] ?? 'AND');
                        }
                    }

                    $oCritereLogique = new CritereLogique($aCriteres, $sOperateurLogiqueGroupe, $nNesting, count($aGroupe) === 1, $nPosition === 0);

                    $aRetourGroupe[] = $oCritereLogique;

                } elseif (isset($aGroupeCritere[1])) {

                    $aRetourGroupe [] = $this->aGetSousGroupeRecursif($aGroupeCritere[1], $this->sGetValeurCritere($mValeur)->current(), $nNesting);
                }
            }
        }


        return new CritereLogique($aRetourGroupe, '', 0, ++$nNesting, true, true);
    }

    /**
     * @param $oChamp
     * @param $sCle
     * @param $sValeur
     * @param $sOperateur
     * @param $sOperateurLogique
     * @return mixed
     */
    public function oGetCritereBasique($oChamp, $sCle, $sValeur, $sOperateur, $sOperateurLogique)
    {
        $cCritere = $oChamp->sGetTypeCritere();

        $sColonne = $this->oRecherche->oGetMapping()->sGetColonneAliasee($sCle);

        return new $cCritere($sColonne, $sValeur, $sOperateurLogique, $sOperateur);
    }

    /** Génère un critère à partir des données de la liste des critères enregistrés
     * @param $sCle
     * @param $sOperateurLogique
     * @param $sValeur
     * @param $sOperateur
     * @return mixed
     */
    public function oGetCritereEnregistre($sCle, $sValeur, $sOperateur, $sOperateurLogique = 'AND' )
    {

        if (isset($this->oRecherche->aGetListeCritereEnregistre($sCle) ['aCritereGroupe'])) {

            $aCritereGroupe = $this->oRecherche->aGetListeCritereEnregistre($sCle);
            return $this-> oGenererCritereGroupe($aCritereGroupe, $sValeur);
        } elseif (isset($this->oRecherche->aGetListeCritereEnregistre($sCle) ['oCritereConditionnel'])) {
            $aCritere = $this->oRecherche->aGetListeCritereEnregistre($sCle) ['aCritereConditionnel'];
            return $this-> oGenererCritereConditionnel($aCritere, $sValeur);
        }

        [$sCle, $cCritere, $sOperateurLogique] = $this->oRecherche->aGetListeCritereEnregistre($sCle) + [2 => $sOperateurLogique];

        if (!$cCritere) {
            $oChamp = $this->oGetChamp($sCle);
            $cCritere = $oChamp->sGetTypeCritere();
        }

        $sColonne = $this->oRecherche->sGetColonneAliasee($sCle);

        return new $cCritere($sColonne, $sValeur, $sOperateurLogique, $sOperateur);
    }

    /**
     * @param $sCle
     * @return false|mixed|null
     */
    public function oGetChamp($sCle)
    {
        return $this->oRecherche->oGetChamp($sCle);
    }

    /**
     * @param mixed $mValeur
     * @param int|string $nIndex
     * @return mixed
     * @throws \Exception
     */
    public function sGetValeurCritere(mixed &$mValeur, int|string $nIndex = 0): mixed
    {
        if (!is_array($mValeur)) {
            $mValeur = [$mValeur];
        }
        //$sValeur = is_array($mValeur) ? ($mValeur[$nIndex] ?? reset($mValeur)) : $mValeur;

        if (key($mValeur) !== null) {
            $mResultat = current($mValeur);
            next($mValeur);
        } else {
            $mResultat = end($mValeur);
        }

        yield $mResultat;

    }



}