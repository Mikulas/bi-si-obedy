<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property-read int $jidelniListekID {primary}
 * @property DateTime $den
 * @property DateTime $platnostDo
 * @property DateTime $platnostOd
 *
 * @property Restaurace $restaurace {m:1 Restaurace:$jidelniListky}
 * @property OneHasMany|Jidlo[] $jidla {1:m Jidlo:$jidelniListky}
 */
class JidelniListek extends Entity
{

}
