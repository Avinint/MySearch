<?php
require 'vendor/autoload.php';

use Model\Cours;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$oCours = new Cours();
//$oCours->debug();

$aRecherche = [

    'sCodeAnnee'     => '2021-2022',
    'AND' => [
        'nIdCours'      => 34,
            'nIdEnseignant' => 164,
            'nIdDisciplineOR'  => 289,
    ],

    'sEtat'          => 'planifie',
    'nIdIntervenant' => 85,
    'sNomPartielGauche' => 'Guitare',
    'dCoursDateDebut' => '2020/01/04',
    'dCoursDateFin' => '2020/03/04',
    'dSemestreFinFin' => '2020/12/31',
    'dSemestreFinDebut' => '2019/12/31',
];

//$oCours->aGetCriteres($aRecherche);


$oCoursMapping = new \Model\CoursMapping();
$oEnseignantMapping = new \Model\EnseignantMapping();
$oCoursMapping->vFusionner($oEnseignantMapping);


/**
 * ASPECTS MANQUANTS
 * --------------------
 *
 *  1) Champs prioritaires dont la présence change la recherche
 *
 */

