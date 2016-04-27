<?php

namespace App\Model;

use Nextras\Orm\Relationships\ManyHasMany;


/**
 * @property-read int $alergenyID {primary}
 * @property string $nazev
 *
 * @property ManyHasMany|Jidlo[] $jidla {m:m Jidlo::$alergeny}
 */
class Alergen extends Entity
{

}
