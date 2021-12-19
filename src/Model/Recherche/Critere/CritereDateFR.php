<?php

namespace Model\Recherche\Critere;

use DateTime;

class CritereDateFR extends CritereDate
{
    use TraitDateFR;

}

//$dateTime = '2021-09-10 04:03:40';
//if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) {
//
//    echo checkdate($matches[2], $matches[3], $matches[1]) ?: "false";
//}
