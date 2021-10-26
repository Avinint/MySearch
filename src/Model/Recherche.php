<?php

namespace Model;

abstract class Recherche implements RechercheInterface
{
    public $nNesting = 0;
    private $aCriteres = [];
    private $sTexte ='';
    protected $oMapping = null;

    public $sCache = [];
    /**
     * @var array
     * a liste des critères spécifiques aux recherches sur le modèle en cours
     * (Recherches avec champs avec names permettant de savoir qu'on va utiliser des opérateurs
     * comme LIKE, NOT, >, <, etc.
     */
    protected $aListeCritereSpecifique = [];

    public function oGetCritere($sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur = '=')
    {
        if (in_array($sCle, ['AND', 'OR'])) {
            return $this->oGetCritereGroupe($sCle, $sValeur);
        } else {
            $oChamp = $this->oGetChamp($sCle);
            if (isset($oChamp)) {
                return $this->oGetCritereBasique($oChamp, $sCle, $sValeur, $sOperateur, $sOperateurLogique);
            } elseif (isset($this->aListeCritereSpecifique[$sCle])) {
                return $this->oGetCritereSpecifique($sCle, $sValeur, $sOperateur, $sOperateurLogique);
            } else {
                return CritereAnalyseur::oInfererCritere(
                    $this->oGetMapping(),
                    $sCle,
                    $sValeur,
                    $sOperateur,
                    $sOperateurLogique
                );
            }
        }
    }

    /**
     * @param $sCle
     * @param $sValeur
     * @return CritereGroupe
     */
    public function oGetCritereGroupe($sCle, $sValeur): CritereGroupe
    {
        CritereGroupe::xValidation($sValeur);
        $oRecherche = new static();
        $oRecherche->nNesting = $this->nNesting + 1;

        foreach ($sValeur as $sCleCritere => $mValeurCritere) {
            $oRecherche->vAjouterCritere($oRecherche->oGetCritere($sCleCritere, $mValeurCritere));
        }

        return new CritereGroupe($sCle, $oRecherche);
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
        $sColonne = $this->oGetMapping()->sGetColonneAliasee($sCle);

        return new $cCritere($sColonne, $sValeur, $sOperateur, $sOperateurLogique);
    }

    /**
     * @param $sCle
     * @param $sOperateurLogique
     * @param $sValeur
     * @param $sOperateur
     * @return mixed
     */
    public function oGetCritereSpecifique($sCle, $sValeur, $sOperateur, $sOperateurLogique = 'AND' )
    {
        [$sCle, $cCritere, $sOperateurLogique] = $this->aListeCritereSpecifique[$sCle] + [2 => $sOperateurLogique];

        if (!$cCritere) {
            $oChamp = $this->oGetChamp($sCle);
            $cCritere = $oChamp->sGetTypeCritere();
        }

        $sCle = $this->oGetMapping()->sGetColonneAliasee($sCle);

        return new $cCritere($sCle, $sValeur, $sOperateur, $sOperateurLogique);
    }

    /**
     * @param CritereInterface $oCritere
     */
    public function vAjouterCritere(CritereInterface $oCritere)
    {
        if (empty($this->aCriteres)) {
            $oCritere->vSetOperateurLogique('');
        }

        $this->sTexte .= PHP_EOL . str_repeat(" ", $this->nNesting * 4) . $oCritere;
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->sTexte;
    }


    /**
     * @return Champ|Mapping|null
     */
    public function oGetMapping()
    {
        return $this->oMapping;
    }

    /**
     * @param $sCle
     * @return false|mixed|null
     */
    public function oGetChamp($sCle)
    {
        return ($this->oGetMapping())[$sCle] ?? null;
    }

}