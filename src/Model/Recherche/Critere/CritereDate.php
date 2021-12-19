<?php

namespace Model\Recherche\Critere;

use DateTime;

class CritereDate extends CritereTexte
{
    use TraitDateDefaut;
//    public function __toString()
//    {
//        return parent::__toString() . "$this->sCle $this->sOperateur '$this->sValeur'";
//    }

    public function __toString()
    {

        return $this->sAndOuOr()  . "$this->sCle $this->sOperateur '". addslashes($this->sGetDateFormatee($this->sValeur)). "'";
    }


}

//$dateTime = '2021-09-10 04:03:40';
//if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) {
//
//    echo checkdate($matches[2], $matches[3], $matches[1]) ?: "false";
//}
