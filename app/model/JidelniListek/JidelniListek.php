<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property-read int $id {primary}
 * @property DateTime $den
 * @property DateTime $platnostOd
 * @property DateTime $platnostDo
 *
 * @property Restaurace $restaurace {m:1 Restaurace::$jidelniListky}
 * @property OneHasMany|Jidlo[] $jidla {1:m Jidlo::$jidelniListek}
 */
class JidelniListek extends Entity
{

}
