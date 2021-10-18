<?php

namespace Model;

class Model
{
    protected Recherche $oFormulaireRecherche;
    protected MappingInterface $aMappingChamps;

    public function __construct()
    {
        $this->aMappingChamps = $this->aGetMapping();


    }

    public function debug()
    {
        var_dump(get_class($this));
        var_dump(get_called_class());
    }

    public function aGetMapping() : MappingInterface
    {
        throw new \Exception("Not implemented");


    }

    /**
     * @throws \Exception
     */
    public function aGetCriteres($aRecherche)
    {
        $oRecherche = new RechercheCours();

        $sRequete = '';

        if ($aRecherche['sNom'] ?? 0 > 0) {
            $sRequete .= $oRecherche->vAjouterCritere(new CritereTexte('sNom', $aRecherche['sNom']));
            unset($aRecherche['sNom']);
        }




        foreach ($aRecherche as $sCle => $sValeur) {

            $oCritere = Critere::oCreerTypeInfere($this->aGetMapping(), $sCle, $sValeur);
            $oRecherche->vAjouterCritere(Critere::oCreerTypeInfere($this, $sCle, $sValeur));
//                $sRequete .= $this->sAjouterCritere($sCle, $sValeur);
//
//                $sRequete .= $this->sAjouterCritereSpecifique( $sCle, $sValeur);

        }

        return $sRequete;
    }

    protected function sAjouterCritere($sCle, &$sValeur, $sOperateur = '=')
    {
        $oCritere = CritereRecherche::oAjouter($this, '$sCle', $sValeur);

        return $oCritere->sGetRequete();


        if (isset($this->aMappingChamps[$sCle])) {
            $oChamp = $this->aMappingChamps[$sCle];
            $sRequete = $oChamp->sAjouterCritere($sValeur, $sOperateur);
        } elseif (strpos($sCle, 'PartielGauche') !== false) {
            $oChamp = $this->aMappingChamps[str_replace('PartielGauche', '', $sCle)];
            $sRequete = $oChamp->sAjouterCritere($sValeur, 'PartielGauche');
        } elseif (strpos($sCle, 'PartielDroit') !== false) {
            $oChamp = $this->aMappingChamps[str_replace('PartielDroit', '', $sCle)];
            $sRequete = $oChamp->sAjouterCritere($sValeur, 'PartielDroit');
        } elseif (strpos($sCle, 'Partiel') !== false) {


            $oChamp = $this->aMappingChamps[str_replace('Partiel', '', $sCle)];

            $sRequete = $oChamp->sAjouterCritere($sValeur, 'Partiel');
        } elseif (substr($sCle, -5) === 'Debut') {

            $oChamp = $this->aMappingChamps[substr_replace($sCle, '', -5)];
            $sRequete = $oChamp->sAjouterCritere($sValeur, 'Debut');
        } elseif (substr($sCle, -3) === 'Fin') {
            $oChamp = $this->aMappingChamps[substr_replace($sCle, '', -3)];
            $sRequete = $oChamp->sAjouterCritere($sValeur, 'Fin');
        }

        $sRequete =  $sValeur ?  'AND COU.' . $oChamp->sGetColonne() . $sRequete . PHP_EOL : '';
        unset($sValeur);

        return $sRequete;
    }

    public function RechercheFactory() : RechercheInterface
    {
        return new Recherche();
    }
}