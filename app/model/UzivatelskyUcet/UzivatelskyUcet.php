<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;
use Nextras\Orm\Relationships\OneHasOne;


/**
 * @property-read int $id {primary}
 * @property string $username
 * @property string $heslo
 * @property int $kredit
 *
 * @property OneHasOne|Zamestnanec $zamestnanec {1:1 Zamestnanec::$uzivatelskyUcet}
 * @property OneHasMany|Objednavka[] $objednavky {1:m Objednavka::$uzivatelskyUcet}
 */
class UzivatelskyUcet extends Entity
{

}
