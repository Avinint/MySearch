<?php

namespace Model;

class RechercheCours extends Recherche
{
    const ALIAS_TABLE = Cours::ALIAS_TABLE;



    public function oGetMapping($sCle = null)
    {
        $this->vSetMapping();
        return parent::oGetMapping($sCle);
    }

    public function vSetMapping()
    {
        $this->oMapping ??= new CoursMapping();
    }

    public function __construct($oModel = null)
    {
        $this->aListeCritereSpecifique = [
            'sNomPartielGauche'   => ['sNom', CritereTextePartielGauche::class],
            'sNomPartielGaucheOR' => ['sNom', CritereTextePartielGauche::class], 'OR',
            'dCoursDateDebut'     => ['dCoursDate', CritereDateDebut::class],
            'dCoursDateFin'       => ['dCoursDate', CritereDateFin::class],
            'dSemestreFinDebut'   => ['dSemestreFin', CritereDateDebut::class],
            'nIdDisciplineOR'     => ['nIdDiscipline', CritereNombre::class, 'OR'],
//            'dSemestreFinFin'   => ['dSemestreFin', CritereDateFin::class],
        ];

        parent::__construct($oModel);
    }
}