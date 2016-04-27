<?php

namespace App\Model;

use Nextras\Orm\Relationships\OneHasOne;


/**
 * @property-read int $zamestnanecID {primary}
 * @property string $email
 * @property string $jmeno
 * @property string $prijmeni
 * @property int $rodneCislo
 * @property int $telefon
 *
 * @property Pobocka $pobocka {m:1 Pobocka::$zamestnanci}
 * @property NULL|OneHasOne|UzivatelskyUcet $uzivatelskyUcet {1:1 UzivatelskyUcet::$zamestnanec}
 */
class Zamestnanec extends Entity
{

}
