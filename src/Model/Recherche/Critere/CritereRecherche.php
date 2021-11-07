<?php

namespace Model\Recherche\Critere;

abstract class CritereRecherche
{
    public static function oAjouter(Champ $oChamp, $sValeur, $sOperateur)
    {
        $sRequete = $oChamp->sAjouterCritere($sValeur, $sOperateur);

        switch ($oChamp->sGetType())
        {
            case 'Entier':
                break;
        }

    }
}