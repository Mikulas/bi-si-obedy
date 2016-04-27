<?php

namespace App\Model;

use Nextras\Orm\Relationships\ManyHasMany;


/**
 * @property-read int $jidloID {primary}
 * @property string $nazev
 * @property float $cena
 * @property string $popis
 *
 * @property ManyHasMany|Objednavka[] $objednavky {m:m Objednavka::$jidla}
 * @property ManyHasMany|JidelniListek[] $jidelniListky {m:m JidelniListek::$jidla}
 * @property ManyHasMany|Alergen[] $alergeny {m:m Alergen::$jidla}
 */
class Jidlo extends Entity
{

}
