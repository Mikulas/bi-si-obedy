<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;

/**
 * @property-read int $pobockaID {primary}
 * @property int $cisloPopisne
 * @property string $mesto
 * @property int $PSC
 * @property string $ulice
 *
 * @property OneHasMany|Zamestnanec[] $zamestnanci {1:m Zamestnanec::$pobocka}
 */
class Pobocka extends Entity
{

}
