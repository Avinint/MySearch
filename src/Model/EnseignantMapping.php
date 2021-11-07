<?php

namespace Model;

use Model\Champ\ChampDate;
use Model\Champ\ChampNombre;
use Model\Champ\ChampTexte;

class EnseignantMapping extends Mapping
{
    public function sGetAlias()
    {
        return 'ENS';
    }

    public function sGetSuffixe()
    {
        return 'Enseignant';
    }

    public function __construct()
    {
        $aMapping = [
            'nIdCours'       => new ChampNombre('nIdCours', 'id_cours'),
            'nIdEnseignant'  => new ChampNombre('nIdEnseignant', 'id_enseignant'),
            'nIdUtilisateur' => new ChampNombre('nIdUtilisateur', 'id_utilisateur'),
            'sCodeAnnee'     => new ChampTexte('sCodeAnnee', 'code_annee'),

            'sNom'           => new ChampTexte('sNom', 'nom'),
            'sPrenom'        => new ChampTexte('sPrenom', 'prenom'),
            'dDateNaissance' => new ChampDate('dDateNaissance', 'date_naissance'),
            'dDateEmbauche'  => new ChampDate('dDateEmbauche', 'date_embauche')
        ];
        parent::__construct($aMapping);
    }
}