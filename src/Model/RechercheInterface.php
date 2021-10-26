<?php

namespace Model;

interface RechercheInterface extends RechercheCritereInterface
{
    /**
     * @return Mapping|Champ
     */
    function oGetMapping();
}