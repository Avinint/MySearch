<?php

namespace Model\Recherche;

interface RechercheInterface extends RechercheCritereInterface
{
    /**
     * @return Mapping|Champ
     */
    function oGetMapping();
}