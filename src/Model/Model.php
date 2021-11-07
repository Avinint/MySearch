<?php

namespace Model;

use Model\Recherche\Recherche;

abstract class Model
{
    protected Recherche $oRecherche;
    protected Mapping $aMappingChamps;

    public function __construct()
    {
        $this->aMappingChamps = $this->oGetMapping();
        $this->oRecherche = $this->oGetRecherche();
    }

    public function debug()
    {
        var_dump(get_class($this));
        var_dump(get_called_class());
    }

    /**
     * @return Mapping
     */
    abstract public function oGetMapping(): Mapping;

    public function vSetRecherche(Recherche $oRecherche)
    {
        $this->oRecherche = $oRecherche;
    }

    /**
     * @throws \Exception
     */
    public function szGetCriteresRecherche($aRecherche = [], $sContexte = [])
    {
        $this->oRecherche->vAjouterCriteresRecherche($aRecherche, $sContexte);

        return $this->oRecherche->sGetTexte();
    }


//    protected function oGetRecherche()
//    {
//        $cClasse = get_called_class() . 'Recherche';
//        return new $cClasse();
//    }

}