<?php

namespace Model;


class CoursMapping extends \ArrayObject implements MappingInterface
{
    protected static $aMappingChamps;
    private $aMapping = [];

   public function __construct()
    {
        $this->aMapping = [
            'nIdCours' => new ChampInteger('nIdCours', 'id_cours'),
            'nIdDiscipline'  => new ChampInteger('nIdDiscipline', 'id_discipline'),
            'nIdEnseignant'  => new ChampInteger('nIdEnseignant', 'id_enseignant'),
            'nIdIntervenant' => new ChampInteger('nIdIntervenant', 'id_intervenant'),
            'sEtat'          => new ChampString('sEtat', 'etat'),
            'sCodeAnnee'     => new ChampString('sCodeAnnee', 'code_annee'),
            'fMontant'       => new ChampFloat('fMontant', 'montant'),
            'sLibelle'       => new ChampString('sLibelle', 'libelle'),
            'sNom'           => new ChampString('sNom', 'nom'),
            'dCoursDate'     => new ChampDate('dCoursDate', 'cours_date'),
            'dSemestreFin'   => new ChampDate('dSemestreFin', 'semestre_fin')
            ];
        parent::__construct($this->aMapping);
    }

    public function getMapping()
    {
        return $this->aMapping;
    }


}