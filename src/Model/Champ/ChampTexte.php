<?php

namespace Model\Champ;

class ChampTexte extends Champ
{
    public function sAjouterValeur($sValeur) : string
    {
        return '\''. addslashes($sValeur) . '\'';
    }

    public function sAjouterValeurPartiel($sValeur, $sType = '') : string
    {
        $sGauche = $sType !== 'droit' ? '%' : '';
        $sDroit = $sType !== 'gauche' ? '%' : '';
        return '\''. $sGauche . addslashes($sValeur) . $sDroit . '\'';
    }

    public function sAjouterCritere($sNomCritere, $sValeur, $sTypeOperateur = '')
    {
        $sOperateur = ' LIKE ';
        switch ($sTypeOperateur)
        {
            case 'Partiel':
                $sRequete = $this->sAjouterValeurPartiel($sValeur);
                break;
            case 'PartielGauche':
                $sRequete = $this->sAjouterValeurPartiel($sValeur, 'gauche');
                break;
            case 'PartielDroit':
                $sRequete = $this->sAjouterValeurPartiel($sValeur, 'droit');
                break;
            default:
                $sOperateur = ' = ';
                $sRequete = $this->sAjouterValeur($sValeur);
                break;
        }

        return $sOperateur . $sRequete;
    }
}