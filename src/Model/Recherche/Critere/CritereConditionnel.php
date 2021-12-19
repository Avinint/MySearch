<?php

namespace Model\Recherche\Critere;

/**
 *  1) instanciation de recherche avec enregistrement des criteres
 *  2) Lecture des parametres de recherche
 *  3) traitement des parametres s'ils sont enregistrés etc.
 *  3a) la lecture du champ permet de déclencher une condition ou déclencher un autre critère
 *  3b) on transforme la recherche brut en critères objets
 *  4) Affichage des critère sous forme de chaines de caractères clause where
 *
 *
 *
 */


class CritereConditionnel extends Critere
{
    private $sDeclencheur;

    public function __construct(string $sCle, array $aConditions)
    {

         // clé = déclencheur valeur = critere
        $this->aConditions = $aConditions;
        $this->sCle = $sCle;

    }

    public function __toString()
    {

        if (isset($this->sDeclencheur)) {
            return $this->aConditions[$this->sDeclencheur] ?? '';
        } else
        {
            return $this->aConditions['sDefaut'] ?? '';
        }
    }

    /**
     * Permet de déclencher une condition
     *
     * @param $sDeclencheur
     */
    public function vSetDeclencheur($sDeclencheur)
    {

        if (null === $this->sDeclencheur) {
            $this->sDeclencheur = $sDeclencheur;
//            foreach ($aDeclencheur as $sDeclencheur) {
//
//                break;
//            }

        }
    }
}