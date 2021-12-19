<?php

namespace Model;

use Model\Recherche\Critere\CritereConditionnel;
use Model\Recherche\Critere\CritereDateDebut;
use Model\Recherche\Critere\CritereFactory;
use Model\Recherche\Critere\CritereNombre;
use Model\Recherche\Critere\CritereSelection;
use Model\Recherche\Critere\CritereTexte;
use Model\Recherche\Critere\CritereTextePartiel;
use Model\Recherche\Critere\CritereTextePartielGauche;
use Model\Recherche\Recherche;

class EtudiantRecherche extends Recherche
{
    public function __construct($nNesting = null)
    {
        $this->oMapping = new EtudiantMapping();
        parent::__construct($nNesting);

        $this->vEnregistrerDeclencheursCritere('nIdEtudiant',
            [
                'sTag',
                'sTagPartiel',
                'nIdDepartement',
                'nIdDisciplinePrincipale',
                'nIdEnseignant',
                'sCodeAnneeEnCours',
                'nIdCreneau',
                'nIdDisciplineComplementaire',

            ]
        );

        $this->vEnregistrerDeclencheursCondition('nIdEnseignant',
            [
                'nIdDisciplinePrincipale',
                'nIdCreneau',
            ]
        );

        //  AND (
        //      AND
        //          (x AND y)
        //      OR
        //          (n AND m)
        //)
        // AND ((x AND y) OR (x AND y))

//        $this->vEnregistrerCriteresConditionnels([
//            'nIdEnseignant' => [
//
//                    [
//
////                        'nIdEnseignant',
////                        CritereNombre::class,
//                        'sCondition' => 'nIdDisciplinePrincipale',
//                        'aCritereGroupe' => [
//                            [
//                                'AND',
//                                [
//                                    [
//                                        'OR',
//                                        'aCriteres' =>
//                                            [
//                                                ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'CE'],
//                                                ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'CE', 'sValeur' => date('Y-m-d')],
//                                            ],
//                                    ],
//                                    [
//                                        'OR',
//                                        'aCriteres' =>
//                                            [
//                                                ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'DC'],
//                                                ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'DC', 'sValeur' => date('Y-m-d')],
//                                            ]
//                                    ]
//
//                                ],
//
//                            ]
//                        ]
//                    ],
//
//                    [
//                        'sCondition' => 'nIdCreneau',
//                        'aCritereGroupe'  => [
//                            [
//                                'AND',
//                                [
//                                    'AND',
//                                    'aCriteres' =>
//                                    [
//                                        ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'PED'],
//                                        ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'PED', 'sValeur' => date('Y-m-d')],
//                                    ]
//
//                                ],
//                                [
//                                    'OR',
//                                    'aCriteres' =>
//                                    [
//                                        ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'DC'],
//                                        ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'DC', 'sValeur' => date('Y-m-d')],
//                                    ],
//                                    'aConditions' => [
//                                        ['nIdDisciplineComplementaire', 'oui']
//                                    ]
//                                ],
//                                [
//                                    'OR',
//                                    'aCriteres' =>
//                                    [
//                                        ['nIdEnseignant', CritereNombre::class],
//                                        ['dDateFin',  CritereDateDebut::class, 'sValeur' => date('Y-m-d')]
//                                    ]
//                                ]
//                            ]
//                        ]
//                    ],[
//                        'sCondition' => 'sDefaut',
//                        'aCritereGroupe'  => [
//                            'bParentheses' => false,
//                            [
//                                'AND',
//                                'aCriteres' =>
//                                [
//                                    ['sValidation', CritereNombre::class, 'sAlias' => 'ECGD'],
//                                    ['sCodeAnneeEnCours', CritereTexte::class, 'sAlias' => 'ECG'],
//                                    ['nIdDisciplineComplementaire', CritereTexte::class, 'sAlias' => 'PED'],
//                                    [
//                                        'AND',
//                                        [
//
//                                            'OR',
//                                            'aCriteres' => [
//                                                ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'PED'],
//                                                ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'PED', 'sValeur' => date('Y-m-d')],
//                                            ]
//
//
//                                        ],
//                                        [
//                                            'OR',
//                                            [
//                                                'aCriteres' => [
//                                                    ['nIdEnseignant', CritereNombre::class, 'sAlias' => 'DC'],
//                                                    ['dDateFin',  CritereDateDebut::class, 'sAlias' => 'DC', 'sValeur' => date('Y-m-d')],
//                                                ]
//                                            ]
//
//                                        ],
//                                        [
//                                            'OR',
//                                            [
//                                                'aCriteres' => [
//                                                    ['nIdEnseignant', CritereNombre::class],
//                                                    ['dDateFin',  CritereDateDebut::class, 'sValeur' => date('Y-m-d')],
//                                                ]
//                                            ]
//
//                                        ]]
//
//                                ]
//                            ]
//                        ]
//                    //                            'AND (
//                    //                                     ( CE.id_enseignant=".$aRecherche['nIdEnseignant']." AND CE.fin>='".date('Y-m-d')."')"
//                    //						." OR (
//                    //						DC.id_enseignant=".$aRecherche['nIdEnseignant']." AND DC.fin>='".date('Y-m-d')."'))";'
//                    //                    ],
//                    //                    ['oCritere' => 'nIdCreneau'],
//                    ]
//
//            ]
//
//        ]);

//        $this->vEnregistrerCriteresDeclencheurs([
//
//            'nIdEtudiant' => [
//                ['nIdEtudiant', new CritereSelection::class],
//                'aDeclencheurs' => [
//                    'sCodeAnnee'    => ['sCodeAnnee', CritereTexte::class],
//                    'nIdCours'      => ['nIdCours', CritereNombre::class],
//                ],
//                'sSelect' => 'SELECT CUR.etudiant_id FROM etudiant_cursus CUR'
//            ],
//
//            'nIdCours'       => ['nIdCours', CritereNombre::class],
//            'nIdDiscipline'  => ['nIdDiscipline', CritereNombre::class],
//        ]);


//        $this->vEnregistrerCriteres([
//            'sNom'    => ['sNom',    CritereTexte::class],
//            'sPrenom' => ['sPrenom', CritereTexte::class],
//
//            'sPrenomEtudiantListe' => [
//                'aCritereGroupe'  => [
//                    [
//                        'AND',
//                        'aCriteres'  => [
//                            ['sPrenom',  CritereTextePartielGauche::class],
//                            ['sPrenomUsage', CritereTextePartielGauche::class, 'OR']
//                        ]
//                    ]
//                ]
//            ]
//        ]);


        $this->vEnregistrerCriteres([
            'sNom'    => ['sNom',    CritereTexte::class],
            'sPrenom' => ['sPrenom', CritereTexte::class],

            'sPrenomEtudiantListe' => [
                'aCritereGroupe'  => [

                    'AND',
                    'aCriteres'  => [
                        ['sPrenom',  CritereTextePartielGauche::class],
                        ['sPrenomUsage', CritereTextePartielGauche::class, 'OR']
                    ]

                ]
            ],

            'nIdEtudiant' => ['nIdEtudiant', CritereSelection::class, 'aCriteresSelection' => []],
            'sTag' => ['sTag',CritereTexte::class],
            'sTagPartiel' => ['sTag', CritereTextePartiel::class],
           // 'nIdDisciplinePrincipale' => ['nIdDisciplinePrincipale', CritereNombre::class ],
//            'sCodeAnneeEnCours' => ['sCodeAnneeEnCours', CritereTexte::class],
            'nIdCreneau' => ['nIdCreneau', CritereNombre::class ],
            'nIdDisciplineComplementaire' => ['nIdDisciplineComplementaire', CritereNombre::class],

            'nIdEtudiantIN' => [
                'aCriteres' => [
                    ['nIdEnseignant', CritereNombre::class],
                    ['dDateFin',  CritereDateDebut::class,  'sValeur' => date('Y-m-d')],
                    ['nIdDiscipline', 'oCritere' => 'nIdDisciplineOR', 'AND'],
                ]
            ],


            //   $sCle, $sValeur, $sOperateurLogique = 'AND', $sOperateur =
        ]);

        $this->vAjouterCriteresPersonnalises([
            'nIdEnseignant' => ['nIdEnseignant', \CritereEnseignant::class],
        ]);

    }

}