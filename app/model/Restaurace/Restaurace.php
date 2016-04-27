<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property-read int $id {primary}
 * @property string $adresa
 * @property NULL|string $email
 * @property string $ICO
 * @property string $kuchyne
 * @property string $nazev
 * @property string $telefon
 *
 * @property OneHasMany|JidelniListek[] $jidelniListky {1:m JidelniListek::$restaurace}
 */
class Restaurace extends Entity
{

}
