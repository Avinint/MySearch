<?php
require 'vendor/autoload.php';

use Model\Cours;

error_reporting(E_ALL);
ini_set("display_errors", 1);

//spl_autoload_register(function ($sNomClasse) {
//
//
//        require 'src\\'. $sNomClasse . ".php";
//
//
//
//});

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
    'sNomPartielGaucheOR' => 'Guitare',
    'dCoursDateDebut' => '2020/01/04',
    'dCoursDateFin' => '2020/03/04',
    'dSemestreFinFin' => '2020/12/31',
    'dSemestreFinDebut' => '2019/12/31',
];

var_dump($oCours->aGetCriteres($aRecherche));

doStuff( prenom: "Bruno", nom: "Avinint");

function doStuff($nom, $age = 0, $prenom = "")
{
        echo match ($prenom) {
            'Avinint' => "Il est le bosse",
            'Yoda' => "Maitre jedi",
            default => "Cheh !"
        };
}