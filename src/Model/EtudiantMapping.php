<?php

namespace Model;

use Model\Champ\ChampDate;
use Model\Champ\ChampNombre;
use Model\Champ\ChampTexte;

class EtudiantMapping extends Mapping
{

    public function __construct()
    {
        $aMapping = [
            'nIdEtudiant'           => new ChampNombre('nIdEtudiant', 'id_etudiant'),
            'sNumeroEtudiant'       => new ChampTexte('sNumeroEtudiant', 'numero_etudiant' ),
            'sNom'                  => new ChampTexte('sNom', 'nom'),
            'sPrenom'               => new ChampTexte('sPrenom', 'prenom'),
            'sPrenomUsage'          => new ChampTexte('sPrenomUsage', 'prenom_usage'),
            'sIne'                  => new ChampTexte('sIne', 'ine'),
            'sEmailCnsmd'           => new ChampTexte('sEmailCnsmd', 'email_cnsmd'),
            'dNaissanceDate'        => new ChampDate('dNaissanceDate', 'naissance_date'),
            'dNaissanceDateFormate' => new ChampDate('dNaissanceDateFormate', 'naissance_date_formate'),
            'sNaissanceCodePostal'  => new ChampTexte('sNaissanceCodePostal', 'naissance_code_postal'),
            'sNaissanceVille'       => new ChampTexte('sNaissanceVille', 'naissance_ville'),
            'sCivilite'             => new ChampTexte('sCivilite', 'civilite_etudiant'),
            'sIdentifiant'          => new ChampTexte('sIdentifiant', 'identifiant'),
            'nArchive'              => new ChampNombre('nArchive', 'archive'),
            'sTag'                  => new ChampTexte('sTag', 'tag'),



            'sValidation' => new ChampTexte('sValidation', 'validation', 'ECGD'),

            'sCodeAnneeEnCours'       => new ChampTexte('sCodeAnneeEnCours', 'code_annee', 'ECG'),
            'nIdDisciplinePrincipale' => new ChampNombre('nIdDiscipline', 'id_discipline', 'ECGD'),
            'nIdEnseignant' => new ChampNombre('nIdEnseignant', 'id_enseignant', 'CE'),
            'dDateFin' => new ChampDate('dDateFin', 'fin', 'CE'),
            'nIdCreneau' => new ChampNombre('nIdCreneau', '.id_planning_enseignant_discipline_creneau', 'ECGD'),
            'nIdDisciplineComplementaire' => new ChampNombre('nIdDiscipline', 'id_discipline', 'PED'),


        ];
        parent::__construct($aMapping);
    }

    public function sGetAlias()
    {
        return 'ETU';
    }

    public function sGetSuffixe()
    {
        return 'Etudiant';
    }
}