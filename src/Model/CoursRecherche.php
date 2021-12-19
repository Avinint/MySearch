<?php /** @noinspection ALL */

namespace Model;

use Model\Recherche\Critere\CritereDate;
use Model\Recherche\Critere\CritereDateDebut;
use Model\Recherche\Critere\CritereDateDebutFR;
use Model\Recherche\Critere\CritereDateFin;
use Model\Recherche\Critere\CritereDateFinFR;
use Model\Recherche\Critere\CritereFactory;
use Model\Recherche\Critere\CritereFlottant;
use Model\Recherche\Critere\CritereNombre;
use Model\Recherche\Critere\CritereTexte;
use Model\Recherche\Critere\CritereListe;
use Model\Recherche\Critere\CritereTextePartielDroit;
use Model\Recherche\Critere\CritereTextePartielGauche;
use Model\Recherche\Recherche;

class CoursRecherche extends Recherche
{
    public function sGetAlias()
    {
        return 'COU';
    }

    public function __construct($nNesting = 0)
    {
        $this->oMapping = new CoursMapping();

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

//        $this->vEnregistrerCriteresDeclencheurs([
//            'RechercheCursus' => [
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


        $this->vEnregistrerCriteres([
            'nIdCours'       => ['nIdCours', CritereNombre::class],
            'nIdDisciplineIN'  => ['nIdDiscipline', CritereListe::class],
            'nIdEnseignant'  => ['nIdEnseignant', CritereNombre::class],
            'nIdIntervenant' => ['nIdIntervenant', CritereNombre::class],
            'sEtat'          => ['sEtat', CritereTexte::class],
//            'sCodeAnnee'     => ['sCodeAnnee', CritereTexte::class],
            'fMontant'       => ['fMontant', CritereFlottant::class],
            'sLibelle'       => ['sLibelle', CritereTexte::class],
            'sNom'           => ['sNom', CritereTexte::class],
            'dCoursDate'     => ['dCoursDate', CritereDate::class],
            'dSemestreFin'   => ['dSemestreFin', CritereDate::class],

            'aCritereComposite' => [
                'aCritereGroupe'  => [ // requete
                    'AND',
                    'aCriteres' => [ // criteres
                        ['nIdCours', CritereNombre::class],
                        ['nIdEnseignant', CritereNombre::class],
                        ['nIdDiscipline', 'oCritere' => 'nIdDisciplineOR', 'AND'],
                    ]
                ]
            ],

            'ORnIdEnseignantORnIdIntervenant' => [
                'aCritereGroupe' => [
                    'OR',
                    'aCriteres' =>
                    [
                        ['nIdEnseignant',  CritereNombre::class],
                        ['nIdIntervenant', CritereNombre::class, 'OR']
                    ]
                ]
            ],

            'sNomPartielGauche'   => ['sNom', CritereTextePartielDroit::class],
            'sNomPartielGaucheOR' => ['sNom', CritereTextePartielGauche::class, 'OR'],
            'dCoursDateDebut'     => ['dCoursDate', CritereDateDebutFR::class],
            'dCoursDateFin'       => ['dCoursDate', CritereDateFinFR::class],
            'dSemestreFinDebut'   => ['dSemestreFin', CritereDateDebutFR::class],
            'nIdDisciplineOR'     => ['nIdDiscipline', CritereNombre::class, 'OR'],
            'dSemestreFinFin'     => ['dSemestreFin', CritereDateFinFR::class],
        ]);
    }

}