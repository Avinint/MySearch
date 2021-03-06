<?php

namespace Model;


use Model\Champ\ChampDate;
use Model\Champ\ChampFlottant;
use Model\Champ\ChampNombre;
use Model\Champ\ChampTexte;

class CoursMapping extends Mapping
{
//    public function __set($name, $val) {
//        $this[$name] = $val;
//    }

    public function sGetAlias()
    {
        return 'COU';
    }

    public function sGetSuffixe()
    {
        return 'Cours';
    }

   public function __construct()
    {
        $aMapping = [
            'nIdCours'       => new ChampNombre('nIdCours', 'id_cours'),
            'nIdDiscipline'  => new ChampNombre('nIdDiscipline', 'id_discipline' ),
            'nIdEnseignant'  => new ChampNombre('nIdEnseignant', 'id_enseignant'),
            'nIdIntervenant' => new ChampNombre('nIdIntervenant', 'id_intervenant'),
            'sEtat'          => new ChampTexte('sEtat', 'etat'),
            'sCodeAnnee'     => new ChampTexte('sCodeAnnee', 'code_annee'),
            'fMontant'       => new ChampFlottant('fMontant', 'montant'),
            'sLibelle'       => new ChampTexte('sLibelle', 'libelle'),
            'sNom'           => new ChampTexte('sNom', 'nom'),
            'dCoursDate'     => new ChampDate('dCoursDate', 'cours_date'),
            'dSemestreFin'   => new ChampDate('dSemestreFin', 'semestre_fin')
        ];
        parent::__construct($aMapping);
    }


}