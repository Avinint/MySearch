<?php

namespace Model\Recherche\Critere;

use Model\Recherche\Recherche;

class CritereFactory
{
    public $oRecherche;

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
        if ($this->oRecherche->bCritereConditionnelExiste($sCle)) {
            return $this->oGenererCritereConditionnel($sCle, $sValeur, $sOperateur, $sOperateurLogique);
        }
        elseif ($this->oRecherche->bCritereEnregistreExiste($sCle)) {
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


    /** Génère un critère à partir des données de la liste des critères enregistrés
     * @param $sCle
     * @param $sOperateurLogique
     * @param $sValeur
     * @param $sOperateur
     * @return mixed
     */
    public function oGetCritereEnregistre($sCle, $mValeur, $sOperateur, $sOperateurLogique = 'AND' )
    {
        if (isset($this->oRecherche->aGetListeCritereEnregistre($sCle) ['aCritereGroupe'])) {

            $aCritereGroupe = $this->oRecherche->aGetListeCritereEnregistre($sCle);

            $bParentheses = $aCritereGroupe['aCritereGroupe']['bParentheses'] ?? true;

            return $this->oGenererCritereGroupe($aCritereGroupe, $mValeur, $bParentheses);
        }

        [$sCle, $cCritere, $sOperateurLogique] = $this->oRecherche->aGetListeCritereEnregistre($sCle) + [2 => $sOperateurLogique];

//        if (is_a($cCritere, CriterePersonnalise::class, true)) {
//
//        }

        return $this->oGetCritere($sCle, $mValeur, $sOperateurLogique, $cCritere);
    }

    public function oGenererCriterePersonnalise($sCle)
    {
        [$sCle, $cCritere] = $this->oRecherche->aGetListeCriterePersonnalise($sCle);

        $oCritere = new $cCritere($sCle, $this->oRecherche->aGetRechercheBrut());

        return $oCritere;
    }

    /**
     * @param $sCle
     * @param $sValeur
     * @return CritereGroupe
     */
    public function oGenererCritereGroupe($sCle, $mValeurDepart, $bSeul = false): CritereGroupe
    {
        $cClasse = get_class($this->oRecherche);

        $oRecherche = new $cClasse();

        $oRecherche->nNesting = $this->oRecherche->nNesting + 1;
        $aCriteres = $sCle['aCritereGroupe'];

        $sOperateurLogique = $aCriteres[0] ?? 'AND';
        $aCriteres = $aCriteres['aCriteres'];

        foreach ($aCriteres as $nIndex => $aUnCritere) {
            $mValeur = is_array($mValeurDepart) ? ($mValeurDepart[$nIndex] ?? $mValeurDepart[0]) : $mValeurDepart;
            if ( isset($aUnCritere['oCritere'])) {
                $oCritere = $this->oGenererCritere($aUnCritere['oCritere'], $mValeur);
            } else {
                [$sCleCritere, $cClasseCritere] = $aUnCritere;
                $sColonne = $this->oRecherche->sGetColonneAliasee($sCleCritere);
                $oCritere = new $cClasseCritere($sColonne, $mValeur, $aUnCritere[2] ?? 'AND');
            }

            $oRecherche->vAjouterCritere($oCritere);
        }

       // $oCritere = $this->aGetSousGroupeRecursif($aCriteres, $mValeur, $oRecherche->nNesting);

       // $oRecherche->vAjouterCritere($oCritere);

        return new CritereGroupe($sOperateurLogique, $oRecherche);
    }

    public function aGetSousGroupeRecursif($aGroupe, $mValeurBase, $nNesting = 0)
    {
        $cClasse = get_class($this->oRecherche);
        $oRetourGroupe = new $cClasse($nNesting);
        unset($aGroupe['bParentheses']);

        foreach ($aGroupe as $aGroupeCritere) {

            if (in_array($aGroupeCritere[0], ['AND', 'OR'])) {

                // je gere un CritereLogique
                // 0 operateeur logique AND OR
                // 1  sous  sous groupe avec Opérandes (  )

                $sOperateurLogiqueGroupe = $aGroupeCritere[0];

                $oRecherche = new $cClasse($nNesting);
                if (isset($aGroupeCritere['aCriteres'])) {

                    foreach ($aGroupeCritere['aCriteres'] as $nPosition => $aUnCritere) {

                        $mValeur = $aUnCritere['sValeur'] ?? $this->sGetValeurCritere($mValeurBase);

                        if (isset($aUnCritere['oCritere'])) {
                            $oRecherche->vAjouterCritere($this->oGenererCritere($aUnCritere['oCritere'], $mValeur));
                        } elseif (!in_array($aUnCritere[0], ['AND', 'OR'])) {


                            [$sCleCritere, $cClasseCritere] = $aUnCritere;


                            $sColonne = $this->oRecherche->sGetColonneAliasee($sCleCritere);

                            $oRecherche->vAjouterCritere(new $cClasseCritere($sColonne, $this->oRecherche->aGetRechercheBrut() [$sCleCritere] ??$mValeur, $aUnCritere[2] ?? 'AND'));
                        }
//                        else {
//                            $oCritereLogique = $this->aGetSousGroupeRecursif($aUnCritere[1], $this->sGetValeurCritere($mValeurBase), $nNesting);
//                            $oRecherche->vAjouterCritere($oCritereLogique);
//                        }

                    }

                    return  new CritereLogique($oRecherche, $sOperateurLogiqueGroupe, $nNesting, count($aGroupe) === 1, $nPosition === 0);

//                    $oRetourGroupe->vAjouterCritere($oCritereLogique);

                } else {

                    $oCritereLogique = $this->aGetSousGroupeRecursif($aGroupeCritere[1], $this->sGetValeurCritere($mValeurBase), $nNesting);
                    $oRetourGroupe->vAjouterCritere($oCritereLogique);
                }
            }
        }

        return new CritereLogique($oRetourGroupe, '', 0, ++$nNesting, true, true);
    }


    private function oGenererCritereConditionnel($sCle, $mValeur, $sOperateurLogique, $sOperateur)
    {
        $aCritereConditionnel = $this->oRecherche->aGetListeCritereConditionnel($sCle);
        $aListeCritere = [];

        foreach ($aCritereConditionnel as $aUnCritere) {
            if (isset($aUnCritere['aCritereGroupe'])) {
                $bParentheses = $aUnCritere['aCritereGroupe']['bParentheses'] ?? true;
                $aListeCritere[$aUnCritere['sCondition']] = $this->oGenererCritereGroupe($aUnCritere, $mValeur, $bParentheses);
            } else {
                [$cCritere, $sOperateurLogique] = $aUnCritere;


//                if (!$cCritere) {
//                    $oChamp = $this->oGetChamp($sCle);
//                    $cCritere = $oChamp->sGetTypeCritere();
//                }
//
//                $sColonne = $this->oRecherche->sGetColonneAliasee($sCle);
//                $aListeCritere[$aUnCritere['sCondition']] = $cCritere($sColonne, $mValeur, $sOperateurLogique);
                $aListeCritere[$aUnCritere['sCondition']] = $this->oGetCritere($sCle, $mValeur, $sOperateurLogique, $cCritere);
            }



//            $critere = $this->oGenererCritere($sCle, $mValeur, $sOperateurLogique, $sOperateur);

        }

        return new CritereConditionnel($sCle, $aListeCritere);
    }

    private function oGetCritere($sCle, $mValeur, $sOperateurLogique = 'AND', $cCritere = null)
    {
        if (!$cCritere) {
            $oChamp = $this->oGetChamp($sCle);
            $cCritere = $oChamp->sGetTypeCritere();
        }

        $sColonne = $this->oRecherche->sGetColonneAliasee($sCle);

        return new $cCritere($sColonne, $mValeur, $sOperateurLogique);
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
    public function sGenerateurCritere(mixed &$mValeur): mixed
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

    public function sGetValeurCritere(&$mValeur)
    {
        return $this->sGenerateurCritere($mValeur)->current();
    }




}