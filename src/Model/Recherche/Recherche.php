<?php

namespace Model\Recherche;

use Model\Mapping;
use Model\Model;
use Model\Recherche\Critere\CritereConditionnel;
use Model\Recherche\Critere\CritereFactory;
use Model\Recherche\Critere\CritereGroupe;
use Model\Recherche\Critere\CritereInterface;
use Model\Recherche\Critere\CritereLogique;
use Model\Recherche\Critere\CriterePersonnalise;

/**
 *  Génère une recherche SQL (clause WHERE)
 *  à partir de critères de recherche brut (type clé valeur)
 */
class Recherche implements RechercheInterface
{
    public $nNesting = 0;
    /* Permet de connaitre la totalité des critères de la recherche avant la fin du traitement */
    private $aRechercheBrut = [];
    private $aCriteres = [];
    private $sTexte  = '';
    protected $oMapping = null;
    public $oCritereFactory;
    private $aListeCritereStandard = [];
    protected $aListeCritereConditionnel = [];
    protected $aListeCritereSpecifique = [];

    private $aListeDeclencheursCondition = [];
    public $aListeDeclencheursCritere = [];

    public static $sCache = [];

    /**
     * @var array
     * a liste des critères spécifiques aux recherches sur le modèle en cours
     * (Recherches avec champs avec names permettant de savoir qu'on va utiliser des opérateurs
     * comme LIKE, NOT, >, <, etc.
     */

    /** Génération et mise en cache de la recherche si absente du cache
     * @param $aRecherche
     */
    public function vAjouterCriteresRecherche($aRecherche, $sContexte = [])
    {
//        $this->sContexte = $sContexte; // TODO EN FAIRE QUELQUE CHOSE
        if (!$this->bRecupererCache($aRecherche)) {
            $this->vGenererRecherche($aRecherche);
            $this->bGenererCache($aRecherche);
        }
    }

    /**
     * Génération de la recherche
     * @param $aRecherche
     */
    public function vGenererRecherche($aRecherche)
    {
        $this->aRechercheBrut = $aRecherche;

        $aRechercheCriterePersonnalise = array_intersect_key($aRecherche, $this->aListeCritereSpecifique);

        foreach ($aRechercheCriterePersonnalise as $sCle => $sValeur) {
            $oCritere = $this->oCritereFactory->oGenererCriterePersonnalise($sCle);
            unset ($aRecherche[$sCle]);
            foreach ($oCritere->aGetCritereRedondant() as $sDeclencheur) {
                unset($aRecherche[$sDeclencheur]);
            }

            $this->vAjouterCritere($oCritere);
        }


        foreach ($aRecherche as $sCle => $sValeur) {
            $oCritere = $this->oCritereFactory->oGenererCritere($sCle, $sValeur);
            $this->vAjouterCritere($oCritere);
        }
    }

    /**
     * Factory qui génère un critère de recherche à partir des données
     * @param $sCle
     * @param $sValeur
     * @param string $sOperateurLogique
     * @param string $sOperateur
     * @return CritereInterface
     */
    public function oGenererCritere($sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur = '=')
    {
        return $this->oCritereFactory->oGenererCritere($sCle, $sValeur, $sOperateurLogique, $sOperateur);
    }

    /**
     * @param CritereInterface $oCritere
     */
    public function vAjouterCritere(CritereInterface $oCritere)
    {

        if ($oCritere instanceof CritereConditionnel) {

            $sCleCondition = array_key_first(array_filter($this->aListeDeclencheursCondition,
                function ($sCondition) use ($oCritere) {return $sCondition === $oCritere->sCle();}));

            $oCritere->vSetDeclencheur($sCleCondition);

        }

        if (empty($this->aCriteres)) {
            $oCritere->vSetOperateurLogique('');
        }

       $this->vAjouterTexteCritere($oCritere);

        $this->aCriteres[] = $oCritere;
    }

    public function vAjouterTexteCritere(CritereInterface $oCritere)
    {
        $sIndentation = PHP_EOL . str_repeat(" ", $this->nNesting * 4) ;
        $sEOL = $oCritere instanceof CriterePersonnalise || (string) $oCritere === '' ? '' :  $sIndentation;
        $this->sTexte .= $sEOL . $oCritere;
    }

    /**
     * @return RechercheInterface[]
     */
    public function aGetCriteres(): array
    {
        return $this->aCriteres;
    }

    public function __construct($nNesting = 0)
    {
        $this->nNesting = $nNesting ?? null;

        $this->oCritereFactory = new CritereFactory($this);

    }

//    protected function vEnregistrerCriteresPrioritaires(array $aCriteres = [])
//    {
//        $this->aListeCriterePrioritaire[] = $aCriteres;
//    }


    protected function vEnregistrerCriteresConditionnels(array $aCriteres)
    {
        $this->aListeCritereConditionnel = $aCriteres;
    }

    /**
     * Permet de spécifier manuellement quels critères sont disponibles sur une recherche
     *
     * @param array $aCritere
     */
    public function vEnregistrerCriteres(array $aCriteres)
    {
        $this->aListeCritereStandard = $this->aListeCritereStandard + $aCriteres;
    }

    public function vAjouterCriteresPersonnalises(array $aCriteres)
    {
        $this->aListeCritereSpecifique = $this->aListeCritereSpecifique + $aCriteres;
    }

    public function bCritereEnregistreExiste($sCle)
    {
        return isset($this->aListeCritereStandard[$sCle]);
    }

    public function bCritereConditionnelExiste($sCle)
    {
        return isset($this->aListeCritereConditionnel[$sCle]);
    }

    public function bCriterePersonnaliseExiste($sCle)
    {
        return isset($this->aListeCritereSpecifique[$sCle]);
    }

    public function aGetListeCritereConditionnel($sCle = null)
    {
        return empty($sCle) ?
            $this->aListeCritereConditionnel :
            ($this->aListeCritereConditionnel[$sCle] ?? null);
    }

    public function aGetListeCritereEnregistre($sCle = null)
    {
        return empty($sCle) ?
            $this->aListeCritereStandard :
            ($this->aListeCritereStandard[$sCle] ?? null);
    }

    public function aGetListeCriterePersonnalise($sCle = null)
    {
        return empty($sCle) ?
            $this->aListeCritereSpecifique :
            ($this->aListeCritereSpecifique[$sCle] ?? null);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->sTexte;
    }


    /**
     * @return Mapping
     */
    public function oGetMapping()
    {
        return $this->oMapping;
    }



    public function vSetMapping(Mapping $oMapping)
    {
        $this->oMapping = $oMapping;
    }

    /**
     * @return string
     */
    public function sGetTexte(): string
    {
        return $this->sTexte;
    }

    /**
     * @param string $sTexte
     * @return bool
     */
    public function bSetTexte(string $sTexte) : bool
    {
        $this->sTexte = $sTexte;

        return true;
    }

    /**
     * On récupère le texte de la recherche s'il est dans le cache
     * @param $aRecherche
     * @return bool
     */
    public function bRecupererCache($aRecherche)
    {
        $sTexteEnCache = Recherche::$sCache[serialize($aRecherche)] ?? '';

        return !empty($sTexteEnCache) && $this->bSetTexte($sTexteEnCache);
    }

    /**
     * Mise en cache du texte généré
     * @param $aRecherche
     */
    public function bGenererCache($aRecherche)
    {
        self::$sCache[serialize($aRecherche)] = $this->sGetTexte();
    }

    public function sGetColonneAliasee($sCle)
    {
        return $this->oMapping->sGetColonneAliasee($sCle);
    }

    public function oGetChamp($sCle)
    {
        return $this->oGetMapping()[$sCle] ?? null;
    }

    protected function vEnregistrerDeclencheursCritere(string $sCle, array $aListeCriteres)
    {
        $this->aListeDeclencheursCritere[$sCle] = $aListeCriteres;
    }

    protected function vEnregistrerDeclencheursCondition(string $sCondition, array $aDeclencheurs)
    {
        foreach ($aDeclencheurs as $aUnDeclencheur) {
            $this->aListeDeclencheursCondition[$aUnDeclencheur] = $sCondition;
        }
    }

    /**
     * @return array
     */
    public function aGetRechercheBrut(): array
    {
        return $this->aRechercheBrut;
    }

    public function bDansRechercheBrut($sCle)
    {
        return isset($this->aRechercheBrut[$sCle]);
    }
}