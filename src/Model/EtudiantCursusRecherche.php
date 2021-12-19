<?php

namespace Model;

use Model\Recherche\Critere\CritereConditionnel;
use Model\Recherche\Critere\CritereDateDebut;
use Model\Recherche\Critere\CritereFactory;
use Model\Recherche\Critere\CritereNombre;
use Model\Recherche\Critere\CritereSelection;
use Model\Recherche\Critere\CritereTexte;
use Model\Recherche\Critere\CritereTextePartiel;
use Model\Recherche\Recherche;
use Model\Recherche\RechercheInterface;

class EtudiantCursusRecherche extends Recherche
{
    public function __construct()
    {
        $this->oMapping = new EtudiantCursusMapping();
        $this->oCritereFactory = new CritereFactory($this);

        $this->vEnregistrerCriteresConditionnels([

            'nIdEnseignant' => [ 'nIdEnseignant',
                [
                    //  AND (
                    //      AND
                    //          (x AND y)
                    //      OR
                    //          (n AND m)
                    //)

                    // AND ((x AND y) OR (x AND y))
                    'oCritere' => 'nIdDisciplinePrincipale',
                    'aCritereGroupe' => [
                        [
                            'AND',
                            [
                                [
                                    'OR',
                                    'aCriteres' =>
                                        [
                                            ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'CE'],
                                            ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'CE', 'sValeur' => date('Y-m-d')],
                                        ],
                                ],
                                [
                                    'OR',
                                    'aCriteres' =>
                                        [
                                            ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'DC'],
                                            ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'DC', 'sValeur' => date('Y-m-d')],
                                        ]
                                ]

                            ],

                        ]
                    ]
                ],

                [
                    'oCritere' => 'nIdCreneau',
                    'aCritereGroupe'  => [
                        [
                            'AND',
                            [
                                'AND',
                                [
                                    [
                                        ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'PED'],
                                        ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'PED', 'sValeur' => date('Y-m-d')],
                                    ]
                                ]
                            ],
                            [
                                'OR',
                                [
                                    ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'DC'],
                                    ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'DC', 'sValeur' => date('Y-m-d')],
                                ],
                            ],
                            [
                                'OR',
                                [
                                    ['nIdEnseignant', CritereNombre::class, 'sAlias'],
                                    ['dDateFin',  CritereDateDebut::class, 'sValeur' => date('Y-m-d')]
                                ]
                            ]


                        ]
                    ]
                ],
//                            'AND (
//                                     ( CE.id_enseignant=".$aRecherche['nIdEnseignant']." AND CE.fin>='".date('Y-m-d')."')"
//						." OR (
//						DC.id_enseignant=".$aRecherche['nIdEnseignant']." AND DC.fin>='".date('Y-m-d')."'))";'
//                    ],
//                    ['oCritere' => 'nIdCreneau'],

            ],
        ]);

        $this->vEnregistrerCriteres([
            'nIdEtudiant' => ['nIdEtudiant', CritereSelection::class, 'aCriteresSelection' => []],
            'sTag' => ['sTag',CritereTexte::class],
            'sTagPartiel' => ['sTag', CritereTextePartiel::class],
            'nIdDisciplinePrincipale' => ['nIdDisciplinePrincipale', CritereNombre::class ],
            'sCodeAnneeEnCours' => ['sCodeAnneeEnCours', CritereTexte::class],
            'nIdCreneau' => ['nIdCreneau', CritereNombre::class ],
            'nIdDisciplineComplementaire' => ['nIdDisciplineComplementaire', CritereNombre::class],
            'nIdEnseignantSession' => ['nIdEnseignant', CritereIdEnseignantSession::class],


            'nIdEtudiantIN' => [
                'aCriteres'  => [
                    ['nIdEnseignant', CritereNombre::class],
                    ['dDateFin',  'sValeur' => date('Y-m-d')],
                    ['dDateFin',  CritereDateDebut::class],
                    ['nIdDiscipline', 'oCritere' => 'nIdDisciplineOR', 'AND'],
                ]
            ]

         //   $sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur =
        ]);
    }


}