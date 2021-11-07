<?php

namespace Model\Recherche;

use Model\Mapping;
use Model\Recherche\Critere\CritereFactory;
use Model\Recherche\Critere\CritereInterface;

class Recherche implements RechercheInterface
{
    public $nNesting = 0;
    private $aCriteres = [];
    private $sTexte ='';
    protected $oMapping = null;
    public $oCritereFactory;
    public $aListeDeclencheursCritere = [];

    public static $sCache = [];

    /**
     * @var array
     * a liste des critères spécifiques aux recherches sur le modèle en cours
     * (Recherches avec champs avec names permettant de savoir qu'on va utiliser des opérateurs
     * comme LIKE, NOT, >, <, etc.
     */
    protected $aListeCritereSpecifique = [];

    /** Ajoute tous les critères de recherche
     * @param $aRecherche
     */
    public function vAjouterCriteresRecherche($aRecherche, $sContexte = [])
    {
        $this->sContexte = $sContexte; // TODO EN FAIRE QUELQUE CHOSE
        if (!$this->bEnCache($aRecherche)) {
            foreach ($aRecherche as $sCle => $sValeur) {
                $oCritere = $this->oCritereFactory->oGenererCritere($sCle, $sValeur);
                $this->vAjouterCritere($oCritere);
            }

            $this->bMettreEnCache($aRecherche);
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

    public function __construct(array $aCriteres = [])
    {
        $this->oCritereFactory = new CritereFactory($this);
        $this->vEnregistrerCriteresPrioritaires($aCriteres);
        $this->vEnregistrerCriteres($aCriteres);
    }

    protected function vEnregistrerCriteresPrioritaires(array $aCriteres = [])
    {
        $this->aListeCriterePrioritaire[] = $aCriteres;
    }

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
        $this->aListeCritereSpecifique = $aCriteres;
    }

    public function bCritereEnregistreExiste($sCle)
    {
        return isset($this->aListeCritereSpecifique[$sCle]);
    }

    public function aGetListeCritereEnregistre($sCle = null)
    {
        if (empty($sCle)) {

            return $this->aListeCritereSpecifique;
        }

        return $this->aListeCritereSpecifique[$sCle] ?? null;
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

    public function bEnCache($aRecherche)
    {
        $sTexteEnCache = Recherche::$sCache[serialize($aRecherche)] ?? '';

        return !empty($sTexteEnCache) && $this->bSetTexte($sTexteEnCache);
    }

    public function bMettreEnCache($aRecherche)
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

    public function vAjouterDeclencheursCritere(string $sCle, RechercheInterface $oRecherche, array $aListeCriteres)
    {
        $this->aListeDeclencheursCritere[$sCle] = ['oRecherche' => $oRecherche, $aListeCriteres];

    }
}