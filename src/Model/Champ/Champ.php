<?php
namespace Model\Champ;

class Champ
{
    private $sNom;
    private $sColonne;
    private $sAlias;

    public function __construct($sNom, $sColonne, $sAlias = null)
    {
        $this->sColonne = $sColonne;
        $this->sNom     = $sNom;
        $this->sAlias   = $sAlias;
    }

    public function sGetNom()
    {
        return $this->sNom;
    }

    public function sGetColonne()
    {
        return $this->sColonne;
    }

    public function sGetAlias()
    {
        return $this->sAlias;
    }

//    public function sAjouterCritere($sNomCritere, $sValeur, $sOperateur = ' = ')
//    {
//        return $sOperateur . $this->sAjouterValeur($sValeur);
//    }

    public function sGetTypeCritere()
    {
        return str_replace('Model\Champ\Champ', 'Model\Recherche\Critere\Critere', get_called_class());
    }

    /**
     * @param string $sAlias
     * @return void
     */
    public function vSetAlias(string $sAlias): void
    {
        $this->sAlias = $sAlias;
    }

    /**
     * @param string $sNom
     */
    public function vSetNom(string $sNom): void
    {
        $this->sNom = $sNom;
    }


}