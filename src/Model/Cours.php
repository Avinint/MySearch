<?php

namespace Model;


class Cours extends Model
{
    const ALIAS_TABLE = 'COU';

    /**
     * @return Mapping
     */
    public function oGetMapping() : Mapping
    {
        return new CoursMapping();
    }

    protected function oGetRecherche()
    {
        return new CoursRecherche();
    }
}