<?php

namespace Model;

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