<?php

namespace App\Model;

use Nextras\Orm\Relationships\ManyHasMany;


/**
 * @property-read int $id {primary}
 * @property string $nazev
 * @property int $cena
 * @property string $popis
 *
 * @property ManyHasMany|Objednavka[] $objednavky {m:m Objednavka::$jidla}
 * @property JidelniListek $jidelniListek {m:1 JidelniListek::$jidla}
 * @property ManyHasMany|Alergen[] $alergeny {m:m Alergen::$jidla, isMain=true}
 */
class Jidlo extends Entity
{

}
