<?php

namespace Model;

class Etudiant extends Model
{

    public function oGetMapping(): Mapping
    {
        return new EtudiantMapping();
    }

    protected function oGetRecherche()
    {
        return new EtudiantRecherche();
    }
}