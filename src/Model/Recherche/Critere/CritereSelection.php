<?php

namespace Model\Recherche\Critere;

// Introduit un select imbriqué avec une sous recherche  //  clause IN (SELECT..FROM)
class CritereSelection extends Critere
{
    public function __construct($sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur = '=')
    {
        parent::__construct($sCle, $sValeur, $sOperateurLogique, $sOperateur);
    }
}
/**
champs trigger :
-
-
-

 changent la requete :
 - 1 seul champ : déclenche la sous requete

 - Chaque  champ ajoute un critere sous la requete
 - supprimer le champ de la liste des recherches

 IN ()

 */