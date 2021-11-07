<?php

namespace Model\Recherche\Critere;

/**
 * Pour récupérer un type de critère de recherche en fonction de son nom
 * si jamais il n'existe pas dans la liste des critères de recherche spécifiques au modèle
 */
class CritereAnalyseur
{
    public static function oInfererCritere($oMapping, $sCle, $sValeur, $sOperateur = '=', $sOperateurLogique = 'AND') : CritereInterface
    {
        return self::cGetCritereInfere($sCle, $sValeur, $sOperateur, $sOperateurLogique, $oMapping);
    }

    /**
     * @param $sCle
     * @param $sValeur
     * @param $sOperateur
     * @param $sOperateurLogique
     * @param $oMapping
     * @return CritereInterface
     */
    public static function cGetCritereInfere($sCle, $sValeur, $sOperateur, $sOperateurLogique, $oMapping) : CritereInterface
    {
        $oCritere = null;
        [$aPosition, $sCle, $oCritere] = self::aInfereCritereTexte(
            $sCle,
            $oMapping,
            $sValeur,
            $sOperateur,
            $sOperateurLogique,
            $oCritere
        );

        if (!isset($oCritere)) {
            return self::aInfereCritereDate($sCle, $sValeur, $sOperateurLogique, $aPosition, $oMapping);
        }

        return $oCritere;
    }

    /**
     * @param $sCle
     * @param array $aPosition
     * @return CritereInterface
     */
    public static function aInfereCritereDate($sCle, $sValeur, $sOperateurLogique, array $aPosition, $oMapping) : CritereInterface
    {
        $aPosition = [];
        $aPosition['Debut'] = strrpos($sCle, 'Debut');
        $aPosition['Fin'] = strrpos($sCle, 'Fin');

        $nLimite = max($aPosition);
        $sOperateur = substr($sCle, $nLimite);
        $sCle = substr($sCle, 0, $nLimite);
        $oChamp = $oMapping[$sCle] ?? null;

        $sTypeCritere = $oChamp->sGetTypeCritere() . $sOperateur;

        if (isset($oChamp) && strpos($sCle, $oChamp->sGetNom()) === 0) {
            if ($sTypeCritere) {
                $sColonne = $oMapping->sGetColonneAliasee($sCle);
                $oCritere = new $sTypeCritere($sColonne, $sValeur, $sOperateurLogique, $sOperateur);
            } else {
                throw new \BadFunctionCallException();
            }
        }

        return $oCritere;
    }

    /**
     * @param $sCle
     * @param $oMapping
     * @param $sValeur
     * @param $sOperateur
     * @param $sOperateurLogique
     * @param $oCritere
     * @return array
     */
    public static function aInfereCritereTexte(
        $sCle,
        $oMapping,
        $sValeur,
        $sOperateur,
        $sOperateurLogique,
        $oCritere
    ): array {
        $aPosition = [];
        $aPosition['NOT'] = strpos($sCle, 'NOT') ?: strpos($sCle, 'Different');
        $aPosition['LIKE'] = strpos($sCle, 'Partiel') ?: strpos($sCle, 'LIKE');
        $aPosition = array_filter($aPosition, function ($pos) {
            return $pos !== false;
        });

        $nLimite = empty($aPosition) ? false : min($aPosition);

        // Si on a trouvé un suffixe
        if ($nLimite !== false) {
            // le type de critère  = le suffixe
            $sTypeCritere = substr($sCle, $nLimite);
            // la clé du critere est la clé sans le suffixe
            $sCle = substr($sCle, 0, $nLimite);
            $sColonne = $oMapping->sGetColonne($sCle);

            if ($sTypeCritere) {
                $sTypeCritere = __NAMESPACE__ . '\\' . 'CritereTexte' . $sTypeCritere;
                $oCritere = new $sTypeCritere($sColonne, $sValeur, $sOperateurLogique, $sOperateur);
            } else {
                $oCritere = new CritereInexistant();
            }
        }

        return array($aPosition, $sCle, $oCritere);
    }
}