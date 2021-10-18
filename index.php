<?php

spl_autoload_register(function ($sNomClasse) {
    require $sNomClasse . ".php";
});
$oCours = new Model\Cours();
$oCours->debug();

var_dump(PHP_EXT);
$aRecherche = [
    'nIdCours'       => 34,
    'nIdEnseignant'  => 164,
    'sCodeAnnee'     => '2021-2022',
    'nIdDiscipline'  => 289,
    'sEtat'          => 'planifie',
    'nIdIntervenant' => 85,
    'sNomPartielGauche' => 'Guitare',
    'dCoursDateDebut' => '2020/01/04',
    'dCoursDateFin' => '2020/03/04',
    'dSemestreFinFin' => '2020/12/31',
    'dSemestreFinDebut' => '2019/12/31',
];


var_dump($oCours->aGetCriteres($aRecherche));

