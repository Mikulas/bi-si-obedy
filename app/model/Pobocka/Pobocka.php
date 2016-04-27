<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;

/**
 * @property-read int $id {primary}
 * @property string $cisloPopisne
 * @property string $mesto
 * @property string $PSC
 * @property string $ulice
 *
 * @property OneHasMany|Zamestnanec[] $zamestnanci {1:m Zamestnanec::$pobocka}
 */
class Pobocka extends Entity
{

}
