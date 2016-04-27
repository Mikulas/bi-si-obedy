<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property-read int $restauraceID {primary}
 * @property string $adresa
 * @property NULL|string $email
 * @property int $ICO
 * @-property int $ID
 * @property string $kuchyne
 * @property string $nazev
 * @property int $telefon
 *
 * @property OneHasMany|JidelniListek[] $jidelniListky {1:m JidelniListek:$restaurace}
 */
class Restaurace extends Entity
{

}
